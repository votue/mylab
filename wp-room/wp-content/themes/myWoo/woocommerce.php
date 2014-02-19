<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage myWoo
 * @since MyWoo 1.0
 */
$sidebar = 'right-sidebar'; // left-sidebar, both-sidebar or no-sidebar
/*$left_sidebar = 'NAME_OF_THE_SIDEBAR_YOU_CREATE_IN_ADMIN_PANEL';
$right_sidebar = 'NAME_OF_THE_SIDEBAR_YOU_CREATE_IN_ADMIN_PANEL';*/
get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php
				woocommerce_content(); 
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>