<?php
/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Simple Code 1.0
 */
function simplecode_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'simplecode' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'simplecode' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'simplecode' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'simplecode' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'simplecode' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'simplecode' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'simplecode_widgets_init' );
