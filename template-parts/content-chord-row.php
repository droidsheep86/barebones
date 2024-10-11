<?php
// template-parts/content-chord-row.php

if ( ! isset( $post ) )
{
	return;
}

?>

<tr id="post-<?php the_ID(); ?>" class="chord-row">
	<th scope="row" class="chord-title">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php echo esc_html( get_the_title() ); ?>
		</a>
	</th>
	<td class="chord-genres">
		<?php akordi_get_genres(); ?>
	</td>
	<td class="chord-artists">
		<?php akordi_get_artists(); ?>
	</td>
	<td class="chord-view">
		<?php echo get_post_meta( $post->ID, '_page_views', TRUE ); ?>
	</td>
	<?php if ( current_user_can( 'administrator' ) ) : ?>
		<td class="chord-edit">
			<a href="<?php echo esc_url( get_edit_post_link() ); ?>" class="edit-link">Edit</a>
		</td>
	<?php else : ?>
		<td class="chord-edit"></td>
	<?php endif; ?>
</tr>