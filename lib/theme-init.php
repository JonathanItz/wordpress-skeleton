<?php

add_action( 'init', 'register_my_menus' );
function register_my_menus() {
    register_nav_menus(
        [
            'primary-navigation' => __( 'Header Menu' ),
            'secondary-navigation' => __( 'Extra Menu' )
        ]
    );
}

remove_comments();
function remove_comments() {
    add_action('admin_init', function () {
        // Redirect any user trying to access comments page
        global $pagenow;
        
        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url());
            exit;
        }

        // Remove comments metabox from dashboard
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

        // Disable support for comments and trackbacks in post types
        foreach (get_post_types() as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    });

    // Close comments on the front-end
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);

    // Hide existing comments
    add_filter('comments_array', '__return_empty_array', 10, 2);

    // Remove comments page in menu
    add_action('admin_menu', function () {
        remove_menu_page('edit-comments.php');
    });

    // Remove comments links from admin bar
    add_action('init', function () {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    });
}

/**
 * Enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
    $my_css_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'style.css' ));
    $my_js_ver  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/custom.js' ));

    wp_enqueue_style( 'style-name', get_stylesheet_uri(), false, $my_css_ver );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/main.js', [ 'jquery' ], $my_js_ver, true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );