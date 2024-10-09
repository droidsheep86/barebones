<?php
/**
 * Template for displaying the Single Page Sidebar
 *
 * @package akordi
 */
?>

<aside id="single-page-sidebar" class="sidebar single-page-sidebar">
	<div class="flex items-center mb-6">
		<div>
			<ul>
				<?php
					$artists = get_the_category();
					if ( $artists )
					{
						$artists_list = array_map( function ($category)
						{
							return '<a class="text-xl font-semibold mb-5 block" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><p>' . $category->description . '</p>';
						}, $artists );
						echo implode( ', ', $artists_list );
					} else
					{
						echo 'N/A';
					}
					?>
			</ul>
			<?php
				// Get the current post ID and categories
				$current_post_id    = get_the_ID();
				$current_categories = wp_get_post_terms( $current_post_id, 'category', [ 'fields' => 'ids' ] );

				// Prepare arguments for WP_Query to get related posts
				$args = [ 
					'post_type'      => 'post',
					'posts_per_page' => -1, // Adjust the number of related posts to show
					'post__not_in'   => [ $current_post_id ], // Exclude the current post
					'tax_query'      => [ 
						[ 
							'taxonomy' => 'category',
							'field'    => 'term_id',
							'terms'    => $current_categories,
							'operator' => 'IN',
						],
					],
				];

				// Create new query for related posts
				$related_posts_query = new WP_Query( $args );

				// Check if there are related posts
				if ( $related_posts_query->have_posts() )
				{
					echo '<div class="related-posts">';
					echo '<h3 class="text-xl font-semibold mb-5">Други песни од артистот</h3>';
					echo '<ul>';

					// Loop through related posts
					while ( $related_posts_query->have_posts() )
					{
						$related_posts_query->the_post();
						?>
			<li>
				<a class="dark:hover:text-gray-300 hover:text-gray-800" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</li>
			<?php
					}

					echo '</ul>';
					echo '</div>';
				}

				// Reset post data to avoid conflicts
				wp_reset_postdata();
				?>

		</div>
	</div>
</aside>