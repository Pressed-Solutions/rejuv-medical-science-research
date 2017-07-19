<?php
/*
 * Plugin Name: Rejuv Medical Science and Research Articles
 * Version: 1.0.0
 * Description: Adds science and research articles custom post type and categories
 * Author: Pressed Solutions
 * Author URI: https://pressedsolutions.com
 * Plugin URI: https://github.com/Pressed-Solutions/rejuv-medical-science-research
 * License: GPL2
 */

/*
 * Prevent this file from being accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Set up custom post type and flush rewrite rules
 */
function rejuv_science_research_activation() {
    rejuv_science_research();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'rejuv_science_research_activation' );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );

/**
 * Register custom post type and taxonomy
 */
function rejuv_science_research() {
    $cpt_labels = array(
        'name'                  => 'Science and Research Articles',
        'singular_name'         => 'Science and Research Article',
        'menu_name'             => 'Science and Research Articles',
        'name_admin_bar'        => 'Science and Research Article',
        'archives'              => 'Science and Research Articles',
        'attributes'            => 'Article Attributes',
        'parent_item_colon'     => 'Parent Article:',
        'all_items'             => 'All Articles',
        'add_new_item'          => 'Add New Article',
        'add_new'               => 'Add New',
        'new_item'              => 'New Article',
        'edit_item'             => 'Edit Article',
        'update_item'           => 'Update Article',
        'view_item'             => 'View Article',
        'view_items'            => 'View Articles',
        'search_items'          => 'Search Article',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into article',
        'uploaded_to_this_item' => 'Uploaded to this article',
        'items_list'            => 'Articles list',
        'items_list_navigation' => 'Articles list navigation',
        'filter_items_list'     => 'Filter articles list',
    );
    $cpt_rewrite = array(
        'slug'                  => 'science-research',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $cpt_args = array(
        'label'                 => 'Science and Research Article',
        'description'           => 'Science and Research Articles',
        'labels'                => $cpt_labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'page-attributes', ),
        'taxonomies'            => array( 'science_taxonomy' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-clipboard',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'science-research',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $cpt_rewrite,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
    );
    register_post_type( 'science_article', $cpt_args );

    $tax_labels = array(
        'name'                       => 'Science and Research Categories', 'Taxonomy General Name',
        'singular_name'              => 'Science and Research Category', 'Taxonomy Singular Name',
        'menu_name'                  => 'Science and Research Category',
        'all_items'                  => 'All Items',
        'parent_item'                => 'Parent Item',
        'parent_item_colon'          => 'Parent Item:',
        'new_item_name'              => 'New Item Name',
        'add_new_item'               => 'Add New Item',
        'edit_item'                  => 'Edit Item',
        'update_item'                => 'Update Item',
        'view_item'                  => 'View Item',
        'separate_items_with_commas' => 'Separate items with commas',
        'add_or_remove_items'        => 'Add or remove items',
        'choose_from_most_used'      => 'Choose from the most used',
        'popular_items'              => 'Popular Items',
        'search_items'               => 'Search Items',
        'not_found'                  => 'Not Found',
        'no_terms'                   => 'No items',
        'items_list'                 => 'Items list',
        'items_list_navigation'      => 'Items list navigation',
    );
    $tax_rewrite = array(
        'slug'                       => 'science-research-category',
        'with_front'                 => true,
        'hierarchical'               => true,
    );
    $tax_args = array(
        'labels'                     => $tax_labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $tax_rewrite,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'science_taxonomy', array( 'science_article' ), $tax_args );
}
add_action( 'init', 'rejuv_science_research' );

/**
 * Register custom image sizes
 */
function rejuv_science_images() {
    add_image_size( 'science_article_thumb', 350, 100, true );
    add_image_size( 'science_article_md', 700, 200, true );
    add_image_size( 'science_article_lg', 1050, 300, true );
}
add_action( 'after_setup_theme', 'rejuv_science_images' );
