<?php
/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since MyWoo 1.0
 */
function mywoo_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'mywoo' ),
		'id' => 'right-sidebar',
		'description' => __( 'Appears on all page', 'mywoo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/*register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'mywoo' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'mywoo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'mywoo' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'mywoo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );*/
}
add_action( 'widgets_init', 'mywoo_widgets_init' );