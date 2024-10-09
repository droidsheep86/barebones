<?php
// template-parts/content-chord-card.php

global $wpdb;

// Step 1: Create a custom query to get post IDs of top viewed posts
$table_name       = $wpdb->prefix . 'popularpostsdata'; // Adjust to match your table name
$top_viewed_posts = $wpdb->get_results( "
    SELECT p.ID
    FROM {$table_name} AS ppd
    INNER JOIN {$wpdb->posts} AS p ON ppd.postid = p.ID
    WHERE p.post_status = 'publish'
    ORDER BY ppd.pageviews DESC
    LIMIT 10
" );

// Step 2: Loop through the IDs to display post titles and excerpts
if ( ! empty( $top_viewed_posts ) ) :
	?>
	<div class="popular-posts-section grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 shadow-md">
		<?php foreach ( $top_viewed_posts as $post ) :
			$post_id     = $post->ID;
			$post_object = get_post( $post_id );
			if ( $post_object ) :
				?>
				<div class="post-item dark:bg-gray-900 bg-gray-300 p-10 relative">
					<p class="absolute top-2 right-2 bg-green-600 p-1"><?php akordi_views( $post->ID ); ?></p>
					<h2 class="post-title text-xl mb-5">
						<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
							<?php echo esc_html( get_the_title( $post_object ) ); ?>
						</a>
					</h2>
					<div class="post-excerpt">
						<?php echo wp_kses_post( get_the_excerpt( $post_object ) ); ?>
					</div>
				</div>
				<?php
			endif;
		endforeach; ?>
	</div>
<?php else : ?>
	<p><?php esc_html_e( 'No top viewed posts available.', 'akordi' ); ?></p>
<?php endif; ?>