<?php
/*
Plugin Name: Dsprog Slider
Plugin URI: http://github.com/dsprog/ds-slider
Description: Slide show para todos os sites responsivo e customizavel.
Version: 1.0.0
Require at least: 5.6
Author: Dsprog
Author URI: http://dsprog.com.br
License: GPLv2 or later
Text Domain: dsprog
Domain Path: /languages/
*/

if (!defined('ABSPATH')){
    exit;
}

if (! class_exists('DS_Slider')) {
    class DS_Slider
    {
        public function __construct()
        {
            $this->define_constants();
            require_once(DS_SLIDER_PATH.'post-types/class.ds-slider-cpt.php');
            $DS_Slider_Post_Type = new DS_Slider_Post_Type();
        }

        public function define_constants()
        {
            define('DS_SLIDER_PATH', plugin_dir_path(__FILE__) );
            define('DS_SLIDER_URL', plugin_dir_url(__FILE__) );
            define('DS_SLIDER_VERSION', '1.0.0' );
        }

        public static function activate()
        {
            update_option('rewrite_rules', true );
        }

        public static function deactivate()
        {
            flush_rewrite_rules();
            unregister_post_type('ds-slider');

        }

        public static function uninstall()
        {

        }

    }

}

if (class_exists('DS_Slider')) {
    register_activation_hook(__FILE__, ['DS_Slider','activate']);
    register_deactivation_hook(__FILE__, ['DS_Slider','deactivate']);
    register_uninstall_hook(__FILE__, ['DS_Slider','uninstall']);

    $slider = new DS_Slider();
}