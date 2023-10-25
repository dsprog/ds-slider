<?php

if (!class_exists("DS_Slider_Post_Type")) {
    class DS_Slider_Post_Type
    {
        function __construct()
        {
            add_action("init", [$this, "create_post_type"]);
            add_action("add_meta_boxes", [$this,"add_meta_boxes"]);
        }

        public function create_post_type()
        {

            $labels = array(
                'name'          => 'Sliders', // Plural name
                'singular_name' => 'Slider'   // Singular name
            );

            $supports = [
                'title',
                'editor',
                'thumbnail'
            ];

            $args = [
                'labels'              => $labels,
                'description'         => '', // Description
                'supports'            => $supports,
                'taxonomies'          => [], // Allowed taxonomies
                'hierarchical'        => false, // Allows hierarchical categorization, if set to false, the Custom Post Type will behave like Post, else it will behave like Page
                'public'              => true,  // Makes the post type public
                'show_ui'             => true,  // Displays an interface for this post type
                'show_in_menu'        => true,  // Displays in the Admin Menu (the left panel)
                'show_in_nav_menus'   => false,  // Displays in Appearance -> Menus
                'show_in_admin_bar'   => true,  // Displays in the black admin bar
                'show_in_rest'        => true,
                'menu_position'       => 5,     // The position number in the left menu
                'menu_icon'           => 'dashicons-slides',  // The URL for the icon used for this post type
                'can_export'          => true,  // Allows content export using Tools -> Export
                'has_archive'         => false,  // Enables post type archive (by month, date, or year)
                'exclude_from_search' => false, // Excludes posts of this type in the front-end search result page if set to true, include them if set to false
                'publicly_queryable'  => false,  // Allows queries to be performed on the front-end part if set to true
                'capability_type'     => 'post', // Allows read, edit, delete like “Post”
                //'register_meta_box_ct' => [$this, 'add_meta_boxes'],
            ];

            register_post_type('ds-slider', $args);
        }

        public function add_meta_boxes()
        {
            add_meta_box(
                'ds_slider_meta_boxe',
                'Link Options',
                [$this, 'add_inner_meta_boxes'],
                'ds-slider',
                'normal',
                'high',
                //['foo'=>'bar']
            );
        }

        public function add_inner_meta_boxes($post, $test)
        {

        }
    }
}
