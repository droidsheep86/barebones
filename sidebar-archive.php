<?php
/**
 * Template for displaying the Archive Sidebar
 *
 * @package akordi
 */
$queried_object = get_queried_object();
?>

<aside id="archive-sidebar" class="sidebar archive-sidebar">
	<?php akordi_display_popular_posts_by_taxonomy_term( $queried_object->taxonomy, $queried_object->term_id, 10 ); ?>
</aside>