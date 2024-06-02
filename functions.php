<?php

// Activate the thumbnails
add_theme_support( 'post-thumbnails' );

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}
add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'dist/main.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'dist/main.js' ), array(), $theme->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
// function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
// 	if ( isset( $args->submenu_class ) ) {
// 		$classes[] = $args->submenu_class;
// 	}

// 	if ( isset( $args->{"submenu_class_$depth"} ) ) {
// 		$classes[] = $args->{"submenu_class_$depth"};
// 	}

// 	return $classes;
// }
// add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

// Register Activites Custom Post Type
function activites() {

	$labels = array(
		'name'                  => _x( 'Activités', 'Post Type General Name', 'custom' ),
		'singular_name'         => _x( 'Activité', 'Post Type Singular Name', 'custom' ),
		'menu_name'             => __( 'Activités', 'custom' ),
		'name_admin_bar'        => __( 'Activités', 'custom' ),
		'archives'              => __( 'Item Archives', 'custom' ),
		'attributes'            => __( 'Item Attributes', 'custom' ),
		'parent_item_colon'     => __( 'Parent Item:', 'custom' ),
		'all_items'             => __( 'All Items', 'custom' ),
		'add_new_item'          => __( 'Add New Item', 'custom' ),
		'add_new'               => __( 'Add New', 'custom' ),
		'new_item'              => __( 'New Item', 'custom' ),
		'edit_item'             => __( 'Edit Item', 'custom' ),
		'update_item'           => __( 'Update Item', 'custom' ),
		'view_item'             => __( 'View Item', 'custom' ),
		'view_items'            => __( 'View Items', 'custom' ),
		'search_items'          => __( 'Search Item', 'custom' ),
		'not_found'             => __( 'Not found', 'custom' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'custom' ),
		'featured_image'        => __( 'Featured Image', 'custom' ),
		'set_featured_image'    => __( 'Set featured image', 'custom' ),
		'remove_featured_image' => __( 'Remove featured image', 'custom' ),
		'use_featured_image'    => __( 'Use as featured image', 'custom' ),
		'insert_into_item'      => __( 'Insert into item', 'custom' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'custom' ),
		'items_list'            => __( 'Items list', 'custom' ),
		'items_list_navigation' => __( 'Items list navigation', 'custom' ),
		'filter_items_list'     => __( 'Filter items list', 'custom' ),
	);
	$args = array(
		'label'                 => __( 'Activité', 'custom' ),
		'description'           => __( 'Les différentes activités proposées par LCO', 'custom' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'activites', $args );

}
add_action( 'init', 'activites', 0 );

// Register Evenements Custom Post Type
function evenements() {

	$labels = array(
		'name'                  => _x( 'Évènements', 'Post Type General Name', 'custom' ),
		'singular_name'         => _x( 'Évènement', 'Post Type Singular Name', 'custom' ),
		'menu_name'             => __( 'Évènements', 'custom' ),
		'name_admin_bar'        => __( 'Évènements', 'custom' ),
		'archives'              => __( 'Item Archives', 'custom' ),
		'attributes'            => __( 'Item Attributes', 'custom' ),
		'parent_item_colon'     => __( 'Parent Item:', 'custom' ),
		'all_items'             => __( 'All Items', 'custom' ),
		'add_new_item'          => __( 'Add New Item', 'custom' ),
		'add_new'               => __( 'Add New', 'custom' ),
		'new_item'              => __( 'New Item', 'custom' ),
		'edit_item'             => __( 'Edit Item', 'custom' ),
		'update_item'           => __( 'Update Item', 'custom' ),
		'view_item'             => __( 'View Item', 'custom' ),
		'view_items'            => __( 'View Items', 'custom' ),
		'search_items'          => __( 'Search Item', 'custom' ),
		'not_found'             => __( 'Not found', 'custom' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'custom' ),
		'featured_image'        => __( 'Featured Image', 'custom' ),
		'set_featured_image'    => __( 'Set featured image', 'custom' ),
		'remove_featured_image' => __( 'Remove featured image', 'custom' ),
		'use_featured_image'    => __( 'Use as featured image', 'custom' ),
		'insert_into_item'      => __( 'Insert into item', 'custom' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'custom' ),
		'items_list'            => __( 'Items list', 'custom' ),
		'items_list_navigation' => __( 'Items list navigation', 'custom' ),
		'filter_items_list'     => __( 'Filter items list', 'custom' ),
	);
	$args = array(
		'label'                 => __( 'Évènement', 'custom' ),
		'description'           => __( 'Les différents évènements proposés par le LCO', 'custom' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-calendar',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'evenements', $args );

}
add_action( 'init', 'evenements', 0 );

// Register Reunions Custom Post Type
function administratif() {

	$labels = array(
		'name'                  => _x( 'Documents administratifs', 'Post Type General Name', 'custom' ),
		'singular_name'         => _x( 'Document administratif', 'Post Type Singular Name', 'custom' ),
		'menu_name'             => __( 'Documents administratifs', 'custom' ),
		'name_admin_bar'        => __( 'Documents administratifs', 'custom' ),
		'archives'              => __( 'Item Archives', 'custom' ),
		'attributes'            => __( 'Item Attributes', 'custom' ),
		'parent_item_colon'     => __( 'Parent Item:', 'custom' ),
		'all_items'             => __( 'All Items', 'custom' ),
		'add_new_item'          => __( 'Add New Item', 'custom' ),
		'add_new'               => __( 'Add New', 'custom' ),
		'new_item'              => __( 'New Item', 'custom' ),
		'edit_item'             => __( 'Edit Item', 'custom' ),
		'update_item'           => __( 'Update Item', 'custom' ),
		'view_item'             => __( 'View Item', 'custom' ),
		'view_items'            => __( 'View Items', 'custom' ),
		'search_items'          => __( 'Search Item', 'custom' ),
		'not_found'             => __( 'Not found', 'custom' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'custom' ),
		'featured_image'        => __( 'Featured Image', 'custom' ),
		'set_featured_image'    => __( 'Set featured image', 'custom' ),
		'remove_featured_image' => __( 'Remove featured image', 'custom' ),
		'use_featured_image'    => __( 'Use as featured image', 'custom' ),
		'insert_into_item'      => __( 'Insert into item', 'custom' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'custom' ),
		'items_list'            => __( 'Items list', 'custom' ),
		'items_list_navigation' => __( 'Items list navigation', 'custom' ),
		'filter_items_list'     => __( 'Filter items list', 'custom' ),
	);
	$args = array(
		'label'                 => __( 'Document administratif', 'custom' ),
		'description'           => __( 'Les différents comptes rendus des réunions', 'custom' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'administratif', $args );
}
add_action( 'init', 'administratif', 0 );

// redirect administratif single to archive
add_action('template_redirect', 'redirect_cpt_single_pages');
function redirect_cpt_single_pages() {
	if (is_singular('administratif')) {
        wp_redirect(get_post_type_archive_link('administratif'), 301);
        exit;
	}
}

// Generate title style
function generate_title($title_content, $title_tag) {
    $html = '<div class="flex flex-col gap-4 w-fit mb-10">';
    $html .= '<' . $title_tag . ' class="text-3xl font-bold text-lco_gray-500 text-center">' . $title_content . '</' . $title_tag . '>';
    $html .= '<div class="flex flex-row items-center justify-center gap-2">';
    $html .= '<div class="h-3 w-14 bg-lco_blue-500 rounded-full"></div>';
    $html .= '<div class="h-3 w-3 bg-lco_gray-500 rounded-full"></div>';
    $html .= '<div class="h-3 w-20 bg-lco_yellow-500 rounded-full"></div>';
    $html .= '</div></div>';

    return $html;
}


// Add theme styles to TinyMCE
function add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'add_editor_styles' );

function mce_css( $mce_css ) {
	if ( !empty( $mce_css ) ) {
		$mce_css .= ',';
	}
	$mce_css .= trailingslashit( get_stylesheet_directory_uri() ) . 'main.css';
	return $mce_css;
}
add_filter( 'mce_css', 'mce_css' );


function my_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');


function my_mce_before_init_insert_formats($init_array) {
	$style_formats = array(
		array(
			'title' => 'Bouton',
			'block' => 'span',
			'classes' => 'btn blue',
			'wrapper' => true,
		),
	);
	$init_array['style_formats'] = json_encode($style_formats);
	return $init_array;
}
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');
