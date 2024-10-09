<?php
// template-parts/content-tags.php

// Get all tags
$tags = get_tags();
?>

<div class="tags-section space-y-8 md:grid md:grid-cols-4 md:gap-12 md:space-y-0 lg:grid-cols-4">
	<?php if ( $tags ) : ?>
	<?php foreach ( $tags as $tag ) : ?>
	<div>
		<div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
			<svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
				<path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"></path>
			</svg>
		</div>
		<h3 class="mb-2 text-xl font-bold dark:text-white">
			<a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="hover:underline">
				<?php echo esc_html( $tag->name ); ?>
			</a>
		</h3>
		<p class="text-gray-500 dark:text-gray-400">
			<?php echo  $tag->description ; ?>
		</p>
	</div>
	<?php endforeach; ?>
	<?php else : ?>
	<p><?php esc_html_e( 'No tags found', 'your-textdomain' ); ?></p>
	<?php endif; ?>
</div>