<?php get_header(); ?>

<main class="single-main" role="main">
	<?php while ( have_posts() ) :
		the_post(); ?>
		<article <?php post_class( 'md:gap-8 md:grid md:grid-cols-4' ); ?>>
			<div class="col-span-3 mt-6 md:mt-0">
				<p class="bg-green-700 text-white text-sm font-semibold inline-block mb-2 p-1.5 ">
					<?php akordi_views( get_the_ID() );
					?>
				</p>
				<div class="flex items-start mb-5">

					<div class="pe-4">
						<h4 class="text-xl font-bold text-gray-900 dark:text-white"><?php the_title(); ?></h4>
					</div>

				</div>
				<div class="">
					<?php the_content(); ?>
				</div>
			</div>
			<?php get_template_part( 'sidebar', 'single' ); ?>

		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>