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
	<table class="chords-table ">
		<caption>
			<?php if ( is_archive() && get_the_archive_title() ) : ?>
				<!-- Display archive title and description -->
				<?php echo get_the_archive_title(); ?>
				<div class="archive-description">
					<?php echo get_the_archive_description(); ?>
				</div>
			<?php endif; ?>
		</caption>
		<thead>
			<tr>
				<th scope="col">Песна</th>
				<th scope="col">Жанр</th>
				<th scope="col">Артист</th>
				<th scope="col">Прегледана</th>
				<th scope="col">
					<span class="sr-only">Измени</span>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if ( have_posts() ) :
				while ( have_posts() ) :
					the_post(); ?>

					<tr id="post-<?php the_ID(); ?>" class="chord-row">
						<th scope="row" class="chord-title">
							<a href="<?php echo esc_url( get_permalink() ); ?>">
								<?php echo esc_html( get_the_title() ); ?>
							</a>
						</th>
						<td class="chord-genres">
							<?php echo akordi_get_genres(); ?>
						</td>
						<td class="chord-artists">
							<?php echo akordi_get_artists(); ?>
						</td>
						<td class="chord-view">
							<?php akordi_views( the_id() ); ?>
						</td>
						<?php if ( current_user_can( 'administrator' ) ) : ?>
							<td class="chord-edit">
								<a href="<?php echo esc_url( get_edit_post_link() ); ?>" class="edit-link">Edit</a>
							</td>
						<?php endif; ?>
					</tr>
				<?php endwhile; else : ?>
				<tr>
					<td colspan="4" class="no-chords">Тука нема акорди. Уживај во тишината...</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
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