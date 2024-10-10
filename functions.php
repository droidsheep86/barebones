<?php

require_once 'vendor/autoload.php'; // Include the Composer autoload.php

// Include additional template tags
require get_template_directory() . '/includes/template-tags.php';
require get_template_directory() . '/includes/google-analytics-fetch.php';

/**
 * Add support for useful features in the Akordi theme
 */
if ( function_exists( 'add_theme_support' ) )
{
    // Add support for document title tag
    add_theme_support( 'title-tag' );

    // Add Thumbnail Theme Support
    add_theme_support( 'post-thumbnails' );
    // add_image_size( 'custom-size', 700, 200, true );

    // Localisation Support
    load_theme_textdomain( 'akordi', get_template_directory() . '/languages' );
}

/**
 * Remove unnecessary elements from wp_head and deregister styles
 */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Disable Gutenberg editor
 */
add_filter( 'use_block_editor_for_post', '__return_false' );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Remove Gutenberg-related styles
 */
add_action( 'wp_enqueue_scripts', function ()
{
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
}, 100 );

/**
 * Remove comments feed
 *
 * @return void
 */
function akordi_remove_post_comments_feed_link ()
{
    return;
}
add_filter( 'post_comments_feed_link', 'akordi_remove_post_comments_feed_link' );

/**
 * Deregister unnecessary styles
 *
 * @return void
 */
function akordi_deregister_styles ()
{
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'akordi_deregister_styles', 100 );

/**
 * Enqueue theme scripts and styles
 */
function akordi_enqueue_scripts ()
{
    wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/style.css?' . filemtime( get_stylesheet_directory() . '/style.css' ) );
    wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.min.js?' . filemtime( get_stylesheet_directory() . '/js/scripts.min.js' ), [], NULL, TRUE );
}
add_action( 'wp_enqueue_scripts', 'akordi_enqueue_scripts' );

/**
 * Add Google Analytics tracking code to head
 *
 * @return void
 */
function akordi_add_gtag_to_head ()
{
    // Check if it's a staging environment
    if ( strpos( get_bloginfo( 'url' ), '.test' ) !== FALSE ) return;

    // Google Analytics
    $tracking_code = 'UA-*********-1';
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $tracking_code; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '<?php echo $tracking_code; ?>');
    </script>
    <?php
}
add_action( 'wp_head', 'akordi_add_gtag_to_head' );

/**
 * Register navigation menus
 *
 * @return void
 */
function akordi_register_nav_menus ()
{
    register_nav_menus( [ 
        'header' => 'Header',
        'footer' => 'Footer',
    ] );
}
add_action( 'after_setup_theme', 'akordi_register_nav_menus', 0 );

/**
 * Modify nav menu arguments
 *
 * @param array $args Navigation menu arguments.
 * @return array Modified navigation menu arguments.
 */
function akordi_nav_menu_args ( $args )
{
    $args['container']       = 'ul';
    $args['container_class'] = FALSE;
    $args['menu_id']         = FALSE;
    $args['items_wrap']      = '<ul class="%2$s">%3$s</ul>';
    return $args;
}
add_filter( 'wp_nav_menu_args', 'akordi_nav_menu_args' );

/**
 * Add class to nav menu links
 *
 * @param array  $atts Attributes for the anchor element.
 * @param object $item The current menu item.
 * @param object $args An array of wp_nav_menu() arguments.
 * @return array Modified attributes for the anchor element.
 */
function akordi_add_menu_link_class ( $atts, $item, $args )
{
    if ( property_exists( $args, 'link_class' ) )
    {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'akordi_add_menu_link_class', 1, 3 );

/**
 * Sidebar setup
 */
/**
 * Register sidebars for archive and single pages
 *
 * @return void
 */
function akordi_register_sidebars ()
{
    register_sidebar( [ 
        'name'          => __( 'Archive Sidebar', 'akordi' ),
        'id'            => 'archive-sidebar',
        'description'   => __( 'Sidebar for archive pages', 'akordi' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ] );

    register_sidebar( [ 
        'name'          => __( 'Single Page Sidebar', 'akordi' ),
        'id'            => 'single-page-sidebar',
        'description'   => __( 'Sidebar for single pages', 'akordi' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ] );
}
add_action( 'widgets_init', 'akordi_register_sidebars' );

/**
 * Modify search results to include category-specific posts
 *
 * @param WP_Query $query The WP_Query instance (passed by reference).
 * @return void
 */
function akordi_add_category_to_search_results ( $query )
{
    if ( ! is_admin() && $query->is_main_query() && $query->is_search )
    {
        $cat_id = get_cat_ID( get_search_query() );
        if ( ! empty( $cat_id ) )
        {
            $query->set( 's', '' );
            $query->set( 'cat', $cat_id );
        }
    }
}
add_action( 'pre_get_posts', 'akordi_add_category_to_search_results' );

/**
 * Remove archive labels.
 * 
 * @param  string $title Current archive title to be displayed.
 * @return string        Modified archive title to be displayed.
 */
function my_theme_archive_title ( $title )
{
    if ( is_category() )
    {
        $title = single_cat_title( '', FALSE );
    } elseif ( is_tag() )
    {
        $title = single_tag_title( '', FALSE );
    } elseif ( is_author() )
    {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() )
    {
        $title = post_type_archive_title( '', FALSE );
    } elseif ( is_tax() )
    {
        $title = single_term_title( '', FALSE );
    }

    return $title;
}
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );