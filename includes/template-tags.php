<?php

/**
 * Retrieve and display the genres (tags) for the current post.
 *
 * This function gets the tags associated with the current post
 * and echoes them as a comma-separated list of links. If no tags
 * are found, 'N/A' is echoed.
 *
 * @return void
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
		echo implode( ', ', $genres_list );
	} else
	{
		echo 'N/A';
	}
}

/**
 * Retrieve and display the artists (categories) for the current post.
 *
 * This function gets the categories associated with the current post
 * and echoes them as a comma-separated list of links. If no categories
 * are found, 'N/A' is echoed.
 *
 * @return void
 */
function akordi_get_artists ()
{
	$artists = get_the_category();
	if ( $artists )
	{
		$artists_list = array_map( function ($category)
		{
			return '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
		}, $artists );
		echo implode( ', ', $artists_list );
	} else
	{
		echo 'N/A';
	}
}

/**
 * Display the number of views for a given post.
 *
 * This function checks if the 'wpp_get_views' function is available,
 * and if so, it echoes the view count for the given post ID.
 *
 * @param int $id The ID of the post for which views are to be displayed.
 * @return void
 */
function akordi_views ( $id )
{
	if ( function_exists( 'wpp_get_views' ) )
	{
		echo wpp_get_views( $id );
	}
}

/**
 * Retrieve and display the genres (tags) for a given post.
 *
 * This function gets the tags associated with the given post ID
 * and echoes them as a comma-separated list of links. If no tags
 * are found, 'N/A' is echoed.
 *
 * @param int $post_id The ID of the post for which genres are to be displayed.
 * @return void
 */
function akordi_get_genres_by_post_id ( $post_id )
{
	$genres = get_the_tags( $post_id );
	if ( $genres )
	{
		$genres_list = array_map( function ($tag)
		{
			return '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>';
		}, $genres );
		echo implode( ', ', $genres_list );
	} else
	{
		echo 'N/A';
	}
}

/**
 * Retrieve and display the artists (categories) for a given post.
 *
 * This function gets the categories associated with the given post ID
 * and echoes them as a comma-separated list of links. If no categories
 * are found, 'N/A' is echoed.
 *
 * @param int $post_id The ID of the post for which artists are to be displayed.
 * @return void
 */
function akordi_get_artists_by_post_id ( $post_id )
{
	$artists = get_the_category( $post_id );
	if ( $artists )
	{
		$artists_list = array_map( function ($category)
		{
			return '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
		}, $artists );
		echo implode( ', ', $artists_list );
	} else
	{
		echo 'N/A';
	}
}

/**
 * Display popular posts for a specific taxonomy term.
 *
 * This function fetches and displays the most popular posts for a given taxonomy and term ID.
 *
 * @param string $taxonomy The taxonomy name.
 * @param int $term_id The ID of the taxonomy term.
 * @param int $number The number of posts to display. Default is 5.
 * @return void
 */
function akordi_display_popular_posts_by_taxonomy_term ( $taxonomy, $term_id, $number = 5 )
{
	if ( ! function_exists( 'wpp_get_mostpopular' ) )
	{
		return;
	}

	$args = array(
		'range'     => 'all',
		'limit'     => $number,
		'post_type' => 'post',
		'taxonomy'  => $taxonomy,
		'term_id'   => $term_id,
		'wpp_start' => '<ul>',
		'wpp_end'   => '</ul>',
		'post_html' => '<li>{title}</li>',
	);

	wpp_get_mostpopular( $args );
}

/**
 * Get post thumbnail URL
 *
 * @param string  $size    Thumbnail size. Default is 'full'.
 * @param boolean $post_id Post ID. Default is false.
 * @param boolean $icon    Whether the image should be treated as an icon. Default is false.
 * @return string Thumbnail URL.
 */
function akordi_get_post_thumbnail_url ( $size = 'full', $post_id = FALSE, $icon = FALSE )
{
	if ( ! $post_id )
	{
		$post_id = get_the_ID();
	}
	$thumb_url_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size, $icon );
	return $thumb_url_array[0];
}