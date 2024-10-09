<?php
/**
 * The template for displaying index and archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akordi
 */

get_header();
?>

<main id="primary" class="index-main">
	<div class="md:gap-8 md:grid md:grid-cols-4">
		<table class="col-span-3 chords-table">
			<caption>
				<?php if ( is_archive() && get_the_archive_title() ) : ?>
				<!-- Display archive title and description -->
				<h1 class="text-3xl font-extrabold">
					<?php echo get_the_archive_title(); ?>
				</h1>
				<div class=" archive-description">
					<?php echo get_the_archive_description(); ?>
				</div>
				<?php endif; ?>
			</caption>
			<thead>
				<tr>
					<th scope="col"><?php esc_html_e( 'Песна', 'akordi' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Жанр', 'akordi' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Артист', 'akordi' ); ?></th>
					<th scope="col"><?php esc_html_e( 'Прегледана', 'akordi' ); ?></th>
					<th scope="col">
						<span class="sr-only"><?php esc_html_e( 'Измени', 'akordi' ); ?></span>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) :
						the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'chord-row' ); ?>
				<?php endwhile; ?>
				<?php else : ?>
				<tr>
					<td colspan="5" class="no-chords"><?php esc_html_e( 'Тука нема акорди. Уживај во тишината...', 'akordi' ); ?></td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
		<?php get_template_part( 'sidebar', 'archive' ); ?>

	</div>
	<div class="pagination mt-4">
		<?php
		// Display pagination links
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => __( '&laquo; Previous', 'akordi' ),
				'next_text' => __( 'Next &raquo;', 'akordi' ),
			)
		);
		?>
	</div>
</main><!-- #main -->

<?php get_footer(); ?>