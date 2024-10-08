<?php get_header(); ?>

<main class="single-main" role="main">
	<div class="container max-w-screen-xl mx-auto px-4">
		<?php while ( have_posts() ) :
			the_post(); ?>
		<article <?php post_class( 'md:gap-8 md:grid md:grid-cols-3' ); ?>>
			<div>
				<div class="flex items-center mb-6">
					<div>
						<ul>
							<?php
								$artists = get_the_category();
								if ( $artists )
								{
									$artists_list = array_map( function ($category)
									{
										return '<a class="text-xl font-semibold" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><p>' . $category->description . '</p>';
									}, $artists );
									echo implode( ', ', $artists_list );
								} else
								{
									echo 'N/A';
								}
								?>
						</ul>
					</div>
				</div>

			</div>
			<div class="col-span-2 mt-6 md:mt-0">
				<div class="flex items-start mb-5">
					<div class="pe-4">
						<footer>
							<p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Reviewed: <time datetime="2022-01-20 19:00">January 20, 2022</time></p>
						</footer>
						<h4 class="text-xl font-bold text-gray-900 dark:text-white"><?php the_title(); ?></h4>
					</div>
					<p class="bg-green-700 text-white text-sm font-semibold inline-flex items-center p-1.5 rounded">
						<?php akordi_views( the_ID() );
							?>
					</p>
				</div>
				<div class="">
					<?php the_content(); ?>
				</div>
			</div>
		</article>
		<?php endwhile; ?>
	</div>
</main>

<?php get_footer(); ?>