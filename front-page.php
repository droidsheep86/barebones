<?php
/**
 * The template for displaying index and archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akordi
 */

get_header(); ?>

<!-- Hero Section -->
<section class="bg-white dark:bg-gray-900">
	<div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
		<div class="mr-auto place-self-center lg:col-span-7">
			<h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
				Македонски акорди за сите жици
			</h1>
			<p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
				Не мора да си професионалец – доволно е да имаш срце и барем една жица на гитарата </p>
			<a href="/pesnarka"
				class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
				Песнарка
				<svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M12.293 9.293a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L9.586 10 8.293 8.707a1 1 0 011.414-1.414l3 3z" clip-rule="evenodd"></path>
				</svg>
			</a>
			<a href="/akord-uchilnica/"
				class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
				Учи ме мајко, карај ме
			</a>
		</div>
		<div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
			<img src="https://akordi.local/wp-content/uploads/2023/01/akordi-za-gitara-makedonski-pesni-9.jpg" alt="mockup">
		</div>
	</div>
</section>

<!-- Genres -->
<section class="bg-gray-50 dark:bg-gray-800">
	<div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 lg:px-6">
		<div class="max-w-screen-md mb-8 lg:mb-12">
			<h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
				<?php esc_html_e( 'Пушти душа, нек се слуша', 'akordi' ); ?>
			</h2>
			<p class="text-gray-500 sm:text-xl dark:text-gray-400">
				<?php esc_html_e( 'Избери жанр/категорија', 'akordi' ); ?>
			</p>
		</div>
		<?php get_template_part( 'template-parts/content', 'tags' ); ?>
	</div>
</section>


<!-- Popular Posts -->
<section class="bg-gray-50 dark:bg-gray-900">
	<div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 lg:px-6">
		<?php

		$popular_posts_query = get_popular_posts_query( [ 
			'posts_per_page' => 20,
		] );

		if ( $popular_posts_query->have_posts() )
		{
			echo '<div class="popular-posts-section grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 shadow-md">';
			while ( $popular_posts_query->have_posts() )
			{
				$popular_posts_query->the_post();
				do_action( 'qm/debug', get_the_title() );

				get_template_part( 'template-parts/content', 'chord-card' );
			}

			wp_reset_postdata();
			echo '</div>';
		}
		?>
	</div>
</section>

<!-- Popular Artists -->
<section class="bg-gray-50 dark:bg-gray-800">
	<div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 lg:px-6">
		<?php
		$popular_artist_ids = get_popular_artists();


		if ( ! empty( $popular_artist_ids ) )
		{
			echo '<div class="popular-artists">';
			echo '<h2 class=" text-4xl font-extrabold">Популарни артисти</h2>';
			echo '<ul class="flex flex-wrap gap-8">';

			foreach ( $popular_artist_ids as $artist_id )
			{
				$artist = get_term( $artist_id, 'category' );
				if ( $artist )
				{
					$artist_link = get_term_link( $artist );
					$artist_name = esc_html( $artist->name );
					$view_count  = intval( get_term_meta( $artist->term_id, '_pageviews', TRUE ) );
					echo '<li class="bg-green-800 px-2 py-1"><a href="' . esc_url( $artist_link ) . '">' . $artist_name . ' <span class="bg-white text-slate-900 text-xs p-1 ml-5">' . $view_count . '</span></a></li>';
					do_action( 'qm/debug', $artist_name );
				}
			}

			echo '</ul>';
			echo '</div>';
		} else
		{
			echo '<p>No popular artists found.</p>';
		}
		?>
	</div>
</section>
<?php get_footer(); ?>