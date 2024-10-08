<?php get_header(); ?>



<!-- Hero Section -->
<section class="bg-white dark:bg-gray-900">
	<div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
		<div class="mr-auto place-self-center lg:col-span-7">
			<h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
				Welcome to Our Landing Page
			</h1>
			<p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
				Discover our amazing features and take your business to the next level.
			</p>
			<a href="#"
				class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
				Get Started
				<svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M12.293 9.293a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L9.586 10 8.293 8.707a1 1 0 011.414-1.414l3 3z" clip-rule="evenodd"></path>
				</svg>
			</a>
			<a href="#"
				class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
				Learn More
			</a>
		</div>
		<div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
			<img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
		</div>
	</div>
</section>

<!-- Features Section -->
<section class="bg-gray-50 dark:bg-gray-800">
	<div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 lg:px-6">
		<div class="max-w-screen-md mb-8 lg:mb-12">
			<h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
				Our Features
			</h2>
			<p class="text-gray-500 sm:text-xl dark:text-gray-400">
				Explore the powerful tools and features designed to help you succeed.
			</p>
		</div>
		<div class="space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0 lg:grid-cols-3">
			<div>
				<div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
					<svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"></path>
					</svg>
				</div>
				<h3 class="mb-2 text-xl font-bold dark:text-white">Easy Integration</h3>
				<p class="text-gray-500 dark:text-gray-400">Quick and easy setup that integrates seamlessly with your platform.</p>
			</div>
			<div>
				<div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
					<svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M8 2a2 2 0 012 2v2H6V4a2 2 0 012-2zM4 8h8a2 2 0 012 2v5a2 2 0 01-2 2H4a2 2 0 01-2-2v-5a2 2 0 012-2zm12 0h2a2 2 0 012 2v5a2 2 0 01-2 2h-2V8zM6 16a2 2 0 01-2 2H2v-2h2a2 2 0 012 2z"></path>
					</svg>
				</div>
				<h3 class="mb-2 text-xl font-bold dark:text-white">Secure Payment</h3>
				<p class="text-gray-500 dark:text-gray-400">Our platform provides secure and reliable payment gateways.</p>
			</div>
			<div>
				<div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
					<svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M5 10a2 2 0 100 4 2 2 0 000-4zm5 0a2 2 0 100 4 2 2 0 000-4zm5 0a2 2 0 100 4 2 2 0 000-4zm-5-6a6 6 0 100 12A6 6 0 0010 4z"></path>
					</svg>
				</div>
				<h3 class="mb-2 text-xl font-bold dark:text-white">Customizable</h3>
				<p class="text-gray-500 dark:text-gray-400">Tailor the platform to your specific needs with customizable options.</p>
			</div>
		</div>
	</div>
</section>


</main>

<?php get_footer(); ?>