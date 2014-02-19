<?php 
/**
 * @package WordPress
 * @subpackage eTheme
 * @since eTheme 1.0
 * @author VoTue
 */

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'etheme', get_template_directory() . '/languages' );
 
$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);
 
// Get the page number
function get_page_number() {
    if ( get_query_var('paged') ) {
        print ' | ' . __( 'Page ' , 'your-theme') . get_query_var('paged');
    }
} // end get_page_number