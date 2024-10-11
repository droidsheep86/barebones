<?php

use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\RunReportRequest;

/**
 * Popular Posts Class to fetch and store popular posts and artists from Google Analytics.
 */
class Popular_Posts_Manager
{
	private $property_id       = '345923490';
	private $cache_key_posts   = 'cached_popular_posts';
	private $cache_key_artists = 'cached_popular_artists';
	private $credentials_path;

	public function __construct ()
	{
		$this->credentials_path = get_template_directory() . '/credentials.json';

		// Only add the action to cache popular posts.
		add_action( 'popular_posts_cron', [ $this, 'cache_popular_data' ] );

		// Check if options are empty, fetch data if needed.
		if ( empty( get_option( $this->cache_key_posts ) ) || empty( get_option( $this->cache_key_artists ) ) )
		{
			$this->cache_popular_data();
		}
	}

	/**
	 * Fetches popular posts and artists from Google Analytics API.
	 */
	private function get_popular_data_from_google_analytics ()
	{
		$client = new BetaAnalyticsDataClient( [ 
			'credentials' => $this->credentials_path,
		] );

		$request = ( new RunReportRequest() )
			->setProperty( 'properties/' . $this->property_id )
			->setDateRanges( [ 
				new DateRange( [ 
					'start_date' => '365daysAgo',
					'end_date'   => 'today',
				] ),
			] )
			->setDimensions( [ 
				new Dimension( [ 
					'name' => 'pagePath',
				] ),
			] )
			->setMetrics( [ 
				new Metric( [ 
					'name' => 'screenPageViews',
				] ),
			] )
			->setLimit( 200 );

		try
		{
			$response        = $client->runReport( $request );
			$popular_posts   = [];
			$popular_artists = [];

			foreach ( $response->getRows() as $row )
			{
				$page_path = $row->getDimensionValues()[0]->getValue();
				$pageviews = $row->getMetricValues()[0]->getValue();
				$post_id   = url_to_postid( $page_path );

				if ( $post_id )
				{
					// Handle standard posts.
					$post_type = get_post_type( $post_id );
					if ( $post_type === 'post' )
					{
						$popular_posts[] = [ 
							'post_id'   => $post_id,
							'pageviews' => $pageviews,
						];

						// Update post meta with view count and date of update.
						update_post_meta( $post_id, '_page_views', $pageviews );
						update_post_meta( $post_id, '_last_popular_update', current_time( 'mysql' ) );
					}
				} elseif ( strpos( $page_path, '/artist/' ) !== FALSE || strpos( $page_path, '/category/' ) !== FALSE )
				{
					// Artists (Renamed Categories)
					$artist_slug = trim( str_replace( [ '/artist/', '/category/' ], '', $page_path ), '/' );
					$artist      = get_term_by( 'slug', $artist_slug, 'category' );
					if ( $artist )
					{
						$popular_artists[] = [ 
							'term_id'   => $artist->term_id,
							'term_type' => 'artist',
							'pageviews' => $pageviews,
						];

						// Update artist meta (category meta) with view count and date of update
						update_term_meta( $artist->term_id, '_pageviews', $pageviews );
						update_term_meta( $artist->term_id, '_last_popular_update', current_time( 'mysql' ) );
					}
				}
			}

			return [ 'posts' => $popular_posts, 'artists' => $popular_artists ];
		} catch ( Exception $e )
		{
			error_log( 'Error fetching popular data: ' . $e->getMessage() );
			return [ 'posts' => [], 'artists' => [] ];
		}
	}

	/**
	 * Caches popular posts and artists data in WordPress options.
	 */
	public function cache_popular_data ()
	{
		$popular_data = $this->get_popular_data_from_google_analytics();
		if ( ! empty( $popular_data['posts'] ) )
		{
			update_option( $this->cache_key_posts, $popular_data['posts'], FALSE );
			update_option( $this->cache_key_posts . '_last_updated', time(), FALSE );
		}
		if ( ! empty( $popular_data['artists'] ) )
		{
			update_option( $this->cache_key_artists, $popular_data['artists'], FALSE );
			update_option( $this->cache_key_artists . '_last_updated', time(), FALSE );
		}
	}

	/**
	 * Retrieves cached popular posts.
	 *
	 * @return array
	 */
	public function get_cached_popular_posts ()
	{
		$popular_posts = get_option( $this->cache_key_posts );

		if ( empty( $popular_posts ) )
		{
			return [];
		}

		return $popular_posts;
	}

	/**
	 * Retrieves cached popular artists.
	 *
	 * @return array
	 */
	public function get_cached_popular_artists ()
	{
		$popular_artists = get_option( $this->cache_key_artists );

		if ( empty( $popular_artists ) )
		{
			return [];
		}

		return $popular_artists;
	}

	/**
	 * Schedules a cron job to update popular posts and artists cache.
	 */
	public static function schedule_cron ()
	{
		if ( ! wp_next_scheduled( 'popular_posts_cron' ) )
		{
			wp_schedule_event( time(), 'hourly', 'popular_posts_cron' );
		}
	}

	/**
	 * Unschedules the cron job on deactivation.
	 */
	public static function unschedule_cron ()
	{
		$timestamp = wp_next_scheduled( 'popular_posts_cron' );
		if ( $timestamp )
		{
			wp_unschedule_event( $timestamp, 'popular_posts_cron' );
		}
	}
}

// Initialize the Popular_Posts_Manager class.
$popular_posts_manager = new Popular_Posts_Manager();

// Schedule cron when theme is activated.
add_action( 'after_setup_theme', [ 'Popular_Posts_Manager', 'schedule_cron' ] );

// Unschedule cron and delete options when theme is switched or deactivated.
add_action( 'switch_theme', function ()
{
	Popular_Posts_Manager::unschedule_cron();
	delete_option( 'cached_popular_posts' );
	delete_option( 'cached_popular_artists' );
	delete_option( 'cached_popular_posts_last_updated' );
	delete_option( 'cached_popular_artists_last_updated' );
} );

/**
 * Custom WP_Query to loop through popular posts.
 */
function get_popular_posts_query ( $args = [] )
{
	global $popular_posts_manager;
	$popular_posts = $popular_posts_manager->get_cached_popular_posts();

	if ( empty( $popular_posts ) )
	{
		return new WP_Query( [ 'post__in' => [] ] );
	}

	$default_args = [ 
		'post_type' => 'post',
		'post__in'  => wp_list_pluck( $popular_posts, 'post_id' ),
		'orderby'   => 'post__in',
	];

	$query_args = wp_parse_args( $args, $default_args );

	return new WP_Query( $query_args );
}

/**
 * Function to get popular artists.
 */
function get_popular_artists ()
{
	global $popular_posts_manager;
	$popular_artists = $popular_posts_manager->get_cached_popular_artists();

	if ( empty( $popular_artists ) )
	{
		return [];
	}

	return wp_list_pluck( $popular_artists, 'term_id' );
}