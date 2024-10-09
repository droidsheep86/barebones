<?php
// template-parts/content-categories.php

// Fetch all categories
$categories = get_categories();
?>
<div class="categories-section grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
	<?php foreach ( $categories as $category ) : ?>
		<div class="bg-white dark:bg-gray-800 shadow-md overflow-hidden px-4 py-1">
			<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="text-lg font-semibold text-gray-300 hover:underline block">
				<?php echo esc_html( $category->name ); ?>
			</a>
		</div>
	<?php endforeach; ?>
</div>