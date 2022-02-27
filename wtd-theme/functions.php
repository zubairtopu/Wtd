<?php

// For The Theme Support
function wtd_setup() {
    // For support multilangual
    load_theme_textdomain('wtd');
    //Title
    add_theme_support('title-tag');

    // For Post Thumbnails
    add_theme_support('post-thumbnails', );

    // for nav menu
    register_nav_menus(array(
        'main-menu'   => __('Main Menu', 'wtd'),
        'footer-menu' => __('Footer Menu', 'wtd'),
    ));
}
add_action('after_setup_theme', 'wtd_setup');

function wtd_scripts() {
    // Font-awsome CSS
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0.0', 'all');
    // Owl Css
    wp_enqueue_style('owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '1.0.0', 'all');

    // Main Css
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all');
    // Responsive Css
    wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0', 'all');
    // Theme Style Css
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // Owl Scripts
    wp_enqueue_script('owl-carosel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);
    // Main Scripts
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

}
add_action('wp_enqueue_scripts', 'wtd_scripts');

// Register Sidebar

function wtd_widgets() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'wtd'),
        'id'            => 'sidebar-1',
        'description'   => __('Our Main Sidebar', 'wtd'),
        'before_widget' => '<div class="single-sidebar">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',

    ));
}

add_action('widgets_init', 'wtd_widgets');

// For Custom Post Type
function wtd_cpt() {
    $labels = array(
        'name'                  => __('Events', 'Post type general name', 'wtd'),
        'singular_name'         => __('Event', 'Post type singular name', 'wtd'),
        'menu_name'             => __('Events', 'Admin Menu text', 'wtd'),
        'name_admin_bar'        => __('Event', 'Add New on Toolbar', 'wtd'),
        'add_new'               => __('Add New Event', 'wtd'),
        'add_new_item'          => __('Add New Event', 'wtd'),
        'new_item'              => __('New Event', 'wtd'),
        'edit_item'             => __('Edit Event', 'wtd'),
        'view_item'             => __('View Event', 'wtd'),
        'all_items'             => __('All Events', 'wtd'),
        'search_items'          => __('Search Events', 'wtd'),
        'parent_item_colon'     => __('Parent Events:', 'wtd'),
        'not_found'             => __('No Events found.', 'wtd'),
        'not_found_in_trash'    => __('No Events found in Trash.', 'wtd'),
        'featured_image'        => __('Event Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'wtd'),
        'set_featured_image'    => __('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'wtd'),
        'remove_featured_image' => __('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'wtd'),
        'use_featured_image'    => __('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'wtd'),
        'archives'              => __('Event archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'wtd'),
        'insert_into_item'      => __('Insert into Event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'wtd'),
        'uploaded_to_this_item' => __('Uploaded to this Event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'wtd'),
        'filter_items_list'     => __('Filter Events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'wtd'),
        'items_list_navigation' => __('Events list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'wtd'),
        'items_list'            => __('Events list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'wtd'),

    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'events'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        // for using Gutenburg editor
        'show_in_rest'       => false,
    );

    register_post_type('events', $args);
}
add_action('init', 'wtd_cpt');

/**
 * Register a 'genre' taxonomy for post type 'book'.
 *
 * Register custom capabilities for taxonomies.
 *
 * @see register_post_type for registering post types.
 */
function events_taxonomy() {
    register_taxonomy('event_category ', 'events', array(
        'label'        => __('Category', 'wtd'),
        'rewrite'      => array('slug' => 'event-category'),
        'hierarchical' => true,
        'public'       => true,
        'show_ui'      => true,
    ));
}
add_action('init', 'events_taxonomy');

/*
 * Add columns to exhibition post list
 */
function add_acf_columns($columns) {
    return array_merge($columns, array(
        'location'   => __('Event Location'),
        'event_date' => __('Event Date'),
    ));
}
add_filter('manage_events_posts_columns', 'add_acf_columns');

/*
 * Add columns to exhibition post list
 */
function exhibition_custom_column($column, $post_id) {
    switch ($column) {
    case 'location':
        echo get_post_meta($post_id, 'location', true);
        break;
    case 'event_date':
        echo get_post_meta($post_id, 'event_date', true);
        break;
    }
}
add_action('manage_events_posts_custom_column', 'exhibition_custom_column', 10, 2);

// Add Sortable Culumns
function wtd_eventsShort($columns) {
    $columns['location']   = 'location';
    $columns['event_date'] = 'event_date';
    return $columns;
}
add_filter('manage_events_sortable_columns', 'wtd_eventsShort');
