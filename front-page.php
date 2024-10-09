<?php get_header(); ?>



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

<!-- Features Section -->
<?php
// Get all tags
$tags = get_tags();
?>

<section class="bg-gray-50 dark:bg-gray-800">
	<div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 lg:px-6">
		<div class="max-w-screen-md mb-8 lg:mb-12">
			<h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
				<?php esc_html_e( 'Пушти душа, не се слуша', 'your-textdomain' ); ?>
			</h2>
			<p class="text-gray-500 sm:text-xl dark:text-gray-400">
				<?php esc_html_e( 'Избери од нашата богата архива', 'your-textdomain' ); ?>
			</p>
		</div>
		<div class="space-y-8 md:grid md:grid-cols-4 md:gap-12 md:space-y-0 lg:grid-cols-4">
			<?php if ( $tags ) : ?>
				<?php foreach ( $tags as $tag ) : ?>
					<div>
						<div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
							<svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
								<path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"></path>
							</svg>
						</div>
						<h3 class="mb-2 text-xl font-bold dark:text-white">
							<a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="hover:underline">
								<?php echo esc_html( $tag->name ); ?>
							</a>
						</h3>
						<p class="text-gray-500 dark:text-gray-400">
							<?php echo $tag->description; ?>
						</p>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<p><?php esc_html_e( 'No tags found', 'your-textdomain' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- Authors -->
<section class="container mx-auto my-8">
	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
		<?php
		// Fetch all categories
		$categories = get_categories();
		foreach ( $categories as $category ) : ?>
			<div class="bg-white dark:bg-gray-800 shadow-md overflow-hidden px-4 py-1">
				<a href=" <?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="text-lg font-semibold text-gray-300 hover:underline block">
					<?php echo esc_html( $category->name ); ?>
				</a>

			</div>
		<?php endforeach; ?>
	</div>
</section>
<section class="container mx-auto my-8">

	<?php
	// Include this within your index.php or other appropriate template file
	
	global $wpdb;

	// Step 1: Create a custom query to get post IDs of top viewed posts
	$table_name       = $wpdb->prefix . 'popularpostsdata'; // Adjust to match your table name
	$top_viewed_posts = $wpdb->get_results( "
    SELECT p.ID
    FROM {$table_name} AS ppd
    INNER JOIN {$wpdb->posts} AS p ON ppd.postid = p.ID
    WHERE p.post_status = 'publish'
    ORDER BY ppd.pageviews DESC
    LIMIT 10
" );

	// Step 2: Loop through the IDs to display post titles and excerpts
	if ( ! empty( $top_viewed_posts ) )
	{
		echo '	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">';
		foreach ( $top_viewed_posts as $post )
		{
			$post_id     = $post->ID;
			$post_object = get_post( $post_id );

			if ( $post_object )
			{
				?>
				<div class="post-item dark:bg-gray-800 bg-gray-300 p-10 relative">
					<p class="absolute top-2 right-2 bg-green-600 p-1"><?php echo akordi_views( $post->ID ); ?></p>

					<h2 class="post-title text-xl mb-5">
						<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
							<?php echo esc_html( get_the_title( $post_object ) ); ?>
						</a>
					</h2>
					<div class="post-excerpt">
						<?php echo wp_kses_post( get_the_excerpt( $post_object ) ); ?>
					</div>
				</div>
				<?php
			}
		}
		echo '</div>';
	} else
	{
		echo '<p>No top viewed posts available.</p>';
	}
	?>

</section>


</main>

<?php get_footer(); ?>