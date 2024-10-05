<!DOCTYPE html>
<!--[if IE 8]><html <?php language_attributes(); ?> class="ie8"><![endif]-->
<!--[if lte IE 9]><html <?php language_attributes(); ?> class="ie9"><![endif]-->
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="dns-prefetch" href="//google-analytics.com">
	<?php wp_head(); ?>
	<!--[if lt IE 10]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script>
    <![endif]-->
	<!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/livingston-css3-mediaqueries-js/1.0.0/css3-mediaqueries.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <![endif]-->
	<script>
	// On page load or when changing themes, best to add inline in `head` to avoid FOUC
	if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
		document.documentElement.classList.add('dark');
	} else {
		document.documentElement.classList.remove('dark')
	}
	</script>
</head>

<body <?php body_class( '' ); ?>>
	<header class="header" role="banner">
		<nav class="nav">
			<div class="navbar">
				<!-- Logo -->
				<a href="/" class="logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/guitar.svg" class="logo-img" alt="Akordi Mk Logo" />
					<span class="logo-text">Акорди МК</span>
				</a>
				<button data-collapse-toggle="navbar-default" type="button" class="toggle-button" aria-controls="navbar-default" aria-expanded="false">
					<span class="sr-only">Open main menu</span>
					<svg class="toggle-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
					</svg>
				</button>

				<div class="navbar-menu" id="navbar-default">
					<?php wp_nav_menu( [ 'theme_location' => 'header', 'link_class' => 'nav-link', 'menu_class' => 'main-nav' ] ); ?>
				</div>
				<!-- Dark Mode -->
				<button id="theme-toggle" type="button" class="theme-toggle">
					<svg id="theme-toggle-dark-icon" class="theme-icon hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
					</svg>
					<svg id="theme-toggle-light-icon" class="theme-icon hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
							fill-rule="evenodd" clip-rule="evenodd"></path>
					</svg>
				</button>
			</div>
		</nav>
	</header>