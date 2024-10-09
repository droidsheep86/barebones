<?php
/**
 * Template for displaying the Archive Sidebar
 *
 * @package akordi
 */
?>

<aside id="archive-sidebar" class="sidebar archive-sidebar">
	<div class="widget custom-archive-widget">
		<h2 class="widget-title"><?php esc_html_e( 'Archive Navigation', 'akordi' ); ?></h2>
		<ul>
			<?php
			// Example: List categories in the archive sidebar
			wp_list_categories( [ 
				'title_li'   => '',
				'orderby'    => 'name',
				'show_count' => TRUE,
			] );
			?>
		</ul>
	</div>
	<div class="widget custom-popular-posts-widget">
		<h2 class="widget-title"><?php esc_html_e( 'Popular Posts', 'akordi' ); ?></h2>
		<ul>
			<?php
			// Example: Display popular posts
			$popular_posts = new WP_Query( [ 
				'posts_per_page' => 5,
				'meta_key'       => 'post_views_count',
				'orderby'        => 'meta_value_num',
				'order'          => 'DESC',
			] );

			if ( $popular_posts->have_posts() ) :
				while ( $popular_posts->have_posts() ) :
					$popular_posts->the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile;
				wp_reset_postdata();
			endif;
			?>
		</ul>
	</div>
</aside>