<?php
    // add navwalker class to bootstrap navigation menu 
    require_once('wp-bootstrap-navwalker.php');

    // add featured image support
    add_theme_support('post-thumbnails');

// adding style function
    function import_style() {
        wp_enqueue_style("bootstrap-style", get_template_directory_uri()."/source/css/bootstrap.min.css");
        wp_enqueue_style("fontawesome", get_template_directory_uri()."/source/css/all.min.css");
        wp_enqueue_style("main-style", get_template_directory_uri()."/source/css/main.css");
    }


    function import_script() {
        //adding jquery to the footer
        wp_deregister_script('jquery'); //remove jquery default registeration
        wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), array(),false, true); // create new registeration
        wp_enqueue_script('jquery'); //add jquery

        wp_enqueue_script("bootstrap-script", get_template_directory_uri() ."/source/js/bootstrap.min.js",array('jquery'), false, true);
        wp_enqueue_script("my-script", get_template_directory_uri() ."/source/js/main.js",array(), false, true);

        
        wp_enqueue_script("html5shiv", get_template_directory_uri() ."/source/js/html5shiv.min.js");
        wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');
        wp_enqueue_script("respond", get_template_directory_uri() ."/source/js/respond.min.js");
        wp_script_add_data('respond', 'conditional', 'lt IE 9');

    }

    function init_navigation_bar() {
        register_nav_menus(array(
            'nav-menu' => 'Navigation bar',
            'footer-menu' => 'Footer menu'
        ));
    }

    function bootstrap_navigation_bar() {
        wp_nav_menu(array(
            'theme_location' => 'nav-menu',
            'menu_class'     => 'navbar-nav ml-auto w-50 justify-content-around',
            'container'      => '',
            'depth'          => 2,
            'walker'         => new wp_bootstrap_navwalker()
        ));

    }

    function extend_excerpt_length($len) {
        return 65;
    }

    function change_excerpt_text($text) {
        return ' ...';
    }

    add_filter('excerpt_length', 'extend_excerpt_length');
    add_filter('excerpt_more', 'change_excerpt_text');

    add_action('wp_enqueue_scripts', 'import_style');
    add_action('wp_enqueue_scripts', 'import_script');
    add_action('init', 'init_navigation_bar');


?>