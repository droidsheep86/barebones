<?php get_header(); ?>

<main class="main dark:bg-gray-800 bg-gray-100" role="main">
	<div class="container max-w-6xl mx-auto">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post(); ?>

				<article <?php post_class(); ?>>

					<header class="post__header" role="heading">
						<h1 class="post__title"><?php the_title(); ?></h1>
					</header>

					<?php the_excerpt(); ?>


				</article>

			<?php endwhile;

		endif;
		?>


	</div>
</main>

<?php get_footer(); ?>