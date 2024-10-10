<div class="post-item dark:bg-gray-900 bg-gray-300 p-10 relative">
	<p class="absolute top-2 right-2 bg-green-600 p-1"><?php echo get_post_meta( get_the_ID(), '_page_views', TRUE ); ?></p>
	<h2 class="post-title text-xl mb-5">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php echo esc_html( get_the_title() ); ?>
		</a>
	</h2>
	<div class="post-excerpt">
		<?php echo wp_kses_post( get_the_excerpt() ); ?>
	</div>
</div>