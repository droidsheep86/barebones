<?php get_header(); ?>

<main class="page-main" role="main">
	<div class="container max-w-screen-xl mx-auto px-4">

		<?php while ( have_posts() ) :
			the_post(); ?>

			<article <?php post_class(); ?>>

				<header role="heading">
					<h1 class="post__title"><?php the_title(); ?></h1>
				</header>

				<?php the_content(); ?>

			</article>

		<?php endwhile; ?>

	</div>
</main>

<?php get_footer(); ?>