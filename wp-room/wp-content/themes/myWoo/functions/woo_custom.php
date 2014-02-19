<?php

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

function my_taxonomies_woo_custom() {
	$labels = array(
		'name'              => _x( 'Product Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Product Categories' ),
		'all_items'         => __( 'All Product Categories' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Edit Product Category' ), 
		'update_item'       => __( 'Update Product Category' ),
		'add_new_item'      => __( 'Add New Product Category' ),
		'new_item_name'     => __( 'New Product Category' ),
		'menu_name'         => __( 'Product Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'product_woo_custom', 'product', $args );
}
add_action( 'init', 'my_taxonomies_woo_custom', 0 );


function my_simple_taxonomies() {
	$labels = array(
		'name'              => _x( 'Taxonomy Test', 'taxonomy general name' ),
		'singular_name'     => _x( 'Taxonomy Test', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Taxonomy Test' ),
		'all_items'         => __( 'All Taxonomy Test' ),
		'parent_item'       => __( 'Parent Taxonomy Test' ),
		'parent_item_colon' => __( 'Parent Taxonomy Test:' ),
		'edit_item'         => __( 'Edit Taxonomy Test' ), 
		'update_item'       => __( 'Update Taxonomy Test' ),
		'add_new_item'      => __( 'Add New Taxonomy Test' ),
		'new_item_name'     => __( 'New Taxonomy Test' ),
		'menu_name'         => __( 'Taxonomy Test' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'taxonomy_post', 'post', $args );
}
add_action( 'init', 'my_simple_taxonomies', 0 );

add_action('woocommerce_before_single_product','mywoo_before_single_product_single',10);

function mywoo_before_single_product_single(){
	woocommerce_breadcrumb();
}


