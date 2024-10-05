<?php

/**
 * Custom template tags to simplify code and improve reusability.
 */
function akordi_get_genres ()
{
	$genres = get_the_tags();
	if ( $genres )
	{
		$genres_list = array_map( function ($tag)
		{
			return '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>';
		}, $genres );
		return implode( ', ', $genres_list );
	} else
	{
		return 'N/A';
	}
}

function akordi_get_artists ()
{
	$artists = get_the_category();
	if ( $artists )
	{
		$artists_list = array_map( function ($category)
		{
			return '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
		}, $artists );
		return implode( ', ', $artists_list );
	} else
	{
		return 'N/A';
	}
}