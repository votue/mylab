<?php
/**
 * MyWoo functions and definitions
 *
 * @package WordPress
 * @subpackage myWoo
 * @since MyWoo 1.0
 */
include('widget/mfp.php');
include('functions/theme.php');
include('functions/sidebar_widget.php');
include('functions/woo_custom.php');

//remove unnecessary widgets
function jpb_unregister_widgets(){
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
}

add_action( 'widgets_init', 'jpb_unregister_widgets' );