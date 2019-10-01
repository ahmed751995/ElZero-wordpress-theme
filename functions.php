<?php
// adding style function
    function import_style() {
        wp_enqueue_style("bootstrap-style", get_template_directory_uri()."/source/css/bootstrap.min.css");
        wp_enqueue_style("fontawesome", get_template_directory_uri()."/source/css/fontawesome.min.css");
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

    function navigation_bar() {
        register_nav_menu('nav-menu', __('Navigation bar'));
    }

    add_action('wp_enqueue_scripts', 'import_style');
    add_action('wp_enqueue_scripts', 'import_script');
    add_action('init', 'navigation_bar');

?>