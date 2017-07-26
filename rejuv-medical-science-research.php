<?php
/*
 * Plugin Name: Rejuv Medical Science and Research Articles
 * Version: 1.4.1
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
        'slug'                  => 'science-research/all',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $cpt_args = array(
        'label'                 => 'Science and Research Article',
        'description'           => 'Science and Research Articles',
        'labels'                => $cpt_labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'revisions', 'page-attributes', ),
        'taxonomies'            => array( 'science_taxonomy', 'treatment_taxonomy' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-clipboard',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'science-research/all',
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
        'menu_name'                  => 'Science and Research Categories',
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

    $tag_labels = array(
        'name'                       => 'Treatment Categories', 'Taxonomy General Name',
        'singular_name'              => 'Treatment Category', 'Taxonomy Singular Name',
        'menu_name'                  => 'Treatment Categories',
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
    $tag_rewrite = array(
        'slug'                       => 'treatment-category',
        'with_front'                 => true,
        'hierarchical'               => true,
    );
    $tag_args = array(
        'labels'                     => $tag_labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $tag_rewrite,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'treatment_taxonomy', array( 'science_article' ), $tag_args );
}
add_action( 'init', 'rejuv_science_research' );

/**
 * Add custom archive/taxonomy template
 * @param  string $archive_template path to default archive template
 * @return string path to modified archive template
 */
function rejuv_science_archive_template( $archive_template ) {
    global $post;
    if ( is_post_type_archive ( 'science_article' ) || is_tax( 'science_taxonomy' ) || is_tax( 'treatment_taxonomy' ) ) {
        $archive_template = dirname( __FILE__ ) . '/archive-science_research.php';
    }
    return $archive_template;
}
add_filter( 'archive_template', 'rejuv_science_archive_template' );
add_filter( 'taxonomy_archive', 'rejuv_science_archive_template' );

/**
 * Register site assets
 */
function rejuv_science_assets() {
    wp_register_style( 'science-research', plugin_dir_url( __FILE__ ) . 'css/science-research.css' );
}
add_action( 'wp_enqueue_scripts', 'rejuv_science_assets' );

/**
 * Register custom menu for archive page
 */
function rejuv_science_tax_menu() {
    register_nav_menu( 'science_research_articles_menu', 'Science and Research Categories Menu' );
}
add_action( 'after_setup_theme', 'rejuv_science_tax_menu' );

/**
 * Show only 9 science and research posts on archive/taxonomy pages
 * @param  object $query WP_Query object
 * @return object modified WP_Query object
 */
function rejuv_science_archive_post_count( $query ) {
    if ( 'science_article' == $query->get( 'post_type' ) && ( is_archive() || is_tax() ) ) {
        $query->set( 'posts_per_page', 9 );
    }

    return $query;
}
add_filter( 'pre_get_posts', 'rejuv_science_archive_post_count' );

/**
 * Add ACF options page
 */
function rejuv_science_options() {
    if ( function_exists( 'acf_add_options_sub_page' ) ) {
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Science and Research Article Archive Options',
            'menu_title'	=> 'Archive Options',
            'parent_slug'   => 'edit.php?post_type=science_article',
        ));
    }
}
add_action( 'after_setup_theme', 'rejuv_science_options' );

/**
 * Set ACF local JSON save directory
 * @param  string $path ACF local JSON save directory
 * @return string ACF local JSON save directory
 */
function rejuv_science_acf_json_save_point( $path ) {
    return plugin_dir_path( __FILE__ ) . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'rejuv_science_acf_json_save_point' );

/**
 * Set ACF local JSON open directory
 * @param  array $path ACF local JSON open directory
 * @return array ACF local JSON open directory
 */
function rejuv_science_acf_json_load_point( $path ) {
    $paths[] = plugin_dir_path( __FILE__ ) . '/acf-json';
    return $paths;
}
add_filter( 'acf/settings/load_json', 'rejuv_science_acf_json_load_point' );

/**
 * Add search form to science/research menu
 * @param  string $items HTML string of menu items
 * @param  object $args  menu args
 * @return string HTML string of menu items
 */
function add_search_form( $items, $args ) {
    if ( 'science_research_articles_menu' == $args->theme_location ) {
        $items .= '<li class="search">' . get_search_form( false ) . '</li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_search_form', 10, 2 );

/**
 * Display grid of posts by category
 * @return string HTML output
 */
function rejuv_science_research_articles() {
    $posts_per_term = 5;

    wp_enqueue_style( 'science-research' );

    $science_terms = get_terms( array(
        'taxonomy'      => 'science_taxonomy',
    ));

    ob_start();
    echo '</div></div>';
    include( 'inc/science-research-nav.php' );
    echo '<div class="dmbs-main science-articles-grid"><div class="container">';

    echo '<div class="science-research-articles">';

    foreach ( $science_terms as $term ) {
        $post_query_args = array(
            'post_type'         => 'science_article',
            'posts_per_page'    => $posts_per_term + 1,
            'tax_query'         => array(
                array(
                    'taxonomy'  => 'science_taxonomy',
                    'terms'     => $term->term_id,
                ),
            ),
        );

        $post_query = new WP_Query( $post_query_args );

        if ( $post_query->have_posts() ) {
            $iterator = 1;
            $term_link = get_term_link( $term );
            echo '<div class="row dmbs-content">
            <h2 class="col-md-12 text-center science-term-header">' . $term->name . '</h2>';

            while ( $post_query->have_posts() && $iterator <= $posts_per_term ) {
                $post_query->the_post();
                if ( ( $iterator % 3 ) == 1 ) {
                    echo '<div class="row">';
                }
                include( 'excerpt-science_research.php' );
                if ( ( $iterator % 3 ) == 0 || $iterator == $post_query->post_count ) {
                    echo '</div>';
                }
                $iterator++;
            }

            if ( $post_query->post_count >= $posts_per_term ) {
                include( 'inc/read-more-block.php' );
            }
            echo '</div>';
        }

        wp_reset_postdata();
    }

    echo '</div>';
    return ob_get_clean();
}
add_shortcode( 'rejuv_science_research_articles', 'rejuv_science_research_articles' );
