<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Twenty Twelve setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	$font_url = twentytwelve_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function twentytwelve_mce_css( $mce_css ) {
	$font_url = twentytwelve_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'twentytwelve_mce_css' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentytwelve_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 *
 * @return void
 */
function twentytwelve_customize_preview_js() {
	wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );

/* CUSTOM POSTTYPE */

/* Category TABLE */ 
function category_post_type() {

	$labels = array(
		'name'                => _x( 'Category', 'Post Type General Name', 'post_type_category' ),
		'singular_name'       => _x( 'Category', 'Post Type Singular Name', 'post_type_category' ),
		'menu_name'           => __( 'Category', 'post_type_category' ),
		'parent_item_colon'   => __( 'Parent Item:', 'post_type_category' ),
		'all_items'           => __( 'All Items', 'post_type_category' ),
		'view_item'           => __( 'View Item', 'post_type_category' ),
		'add_new_item'        => __( 'Add New Item', 'post_type_category' ),
		'add_new'             => __( 'Add New', 'post_type_category' ),
		'edit_item'           => __( 'Edit Item', 'post_type_category' ),
		'update_item'         => __( 'Update Item', 'post_type_category' ),
		'search_items'        => __( 'Search Item', 'post_type_category' ),
		'not_found'           => __( 'Not found', 'post_type_category' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'post_type_category' ),
	);
	$args = array(
		'label'               => __( 'category', 'post_type_category' ),
		'description'         => __( 'Category of Article', 'post_type_category' ),
		'labels'              => $labels,
		'supports'            => array(),
		'taxonomies'          => array(),//sub menu
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => get_template_directory_uri().'/img/category.png',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		//custom field
		'register_meta_box_cb' => 'briefing_subcategory_metaboxs',
	);
	register_post_type( 'product_category', $args );

}

add_action( 'init', 'category_post_type', 0 );
add_action( 'add_meta_boxes', 'briefing_subcategory_metaboxs' );
function briefing_subcategory_metaboxs() {
	add_meta_box('briefing_subcategory_id', 'Sub Category', 'brief_html_subcat_metaboxes', 'product_category', 'normal', 'low');
}
add_action('init', 'briefing_subcategory_remove_contentbox');
function briefing_subcategory_remove_contentbox() {
    remove_post_type_support( 'product_category', 'editor' );
}
// The Event Location Metabox
function brief_html_subcat_metaboxes() {
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="meta_subcategory" id="meta_subcategory" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    // Get the location data if its already been entered
    $location = get_post_meta($post->ID, '_parentid', true);
    // Echo out the field
    echo '<input type="text" name="_parentid" value="' . $location  . '" class="widefat" />';
}

//save postmeta
// Save the Metabox Data
function briefing_save_subcategory($post_id, $post) {
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['meta_subcategory'], plugin_basename(__FILE__) )) {
    	return $post->ID;
    }
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $events_meta['_parentid'] = $_POST['_parentid'];
    // Add values of $events_meta as custom fields
    foreach ($events_meta as $key => $value) { // loop through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'briefing_save_subcategory', 1, 2); // save the custom fields

//remove
/*function briefing_remove_menu_sub_category() {
	global $submenu;
	$post_type = 'product_category';
	$cat_slug = 'taxonomy=category';
	$tax_slug = 'taxonomy=post_tag';
	
	if (isset($submenu['edit.php?post_type='.$post_type])) {
		foreach ($submenu['edit.php?post_type='.$post_type] as $k => $sub) {
			if (false !== strpos($sub[2],$cat_slug)) {
				unset($submenu['edit.php?post_type='.$post_type][$k]);
			}
			if (false !== strpos($sub[2],$tax_slug)) {
				unset($submenu['edit.php?post_type='.$post_type][$k]);
			}
		}
	}
}
add_action('admin_menu','briefing_remove_menu_sub_category');*/

// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );
 
// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields() {

	global $woocommerce, $post;
	echo '<div class="options_group">';
	woocommerce_wp_text_input(
	array(
	'id' => '_text_field',
	'label' => __( 'My Text Field', 'woocommerce' ),
	'placeholder' => 'http://',
	'desc_tip' => 'true',
	'description' => __( 'Enter the custom value here.', 'woocommerce' )
	)
	);

	woocommerce_wp_text_input(
	array(
	'id' => '_number_field',
	'label' => __( 'My Number Field', 'woocommerce' ),
	'placeholder' => '',
	'description' => __( 'Enter the custom value here.', 'woocommerce' ),
	'type' => 'number',
	'custom_attributes' => array(
	'step' => 'any',
	'min' => '0'
	)
	)
	);

	// Textarea
	woocommerce_wp_textarea_input(
	array(
	'id' => '_textarea',
	'label' => __( 'My Textarea', 'woocommerce' ),
	'placeholder' => '',
	'description' => __( 'Enter the custom value here.', 'woocommerce' )
	)
	);

	// Select
	woocommerce_wp_select(
	array(
	'id' => '_select',
	'label' => __( 'My Select Field', 'woocommerce' ),
	'options' => array(
	'one' => __( 'Option 1', 'woocommerce' ),
	'two' => __( 'Option 2', 'woocommerce' ),
	'three' => __( 'Option 3', 'woocommerce' )
	)
	)
	);

	// Checkbox
	woocommerce_wp_checkbox(
	array(
	'id' => '_checkbox',
	'wrapper_class' => 'show_if_simple',
	'label' => __('My Checkbox Field', 'woocommerce' ),
	'description' => __( 'Check me!', 'woocommerce' )
	)
	);

	// Hidden field
	woocommerce_wp_hidden_input(
	array(
	'id' => '_hidden_field',
	'value' => 'hidden_value'
	)
	);

	// Product Select
	?>
	<p class="form-field product_field_type">
	<label for="product_field_type"><?php _e( 'Product Select', 'woocommerce' ); ?></label>
	<select id="product_field_type" name="product_field_type[]" class="ajax_chosen_select_products" multiple="multiple" data-placeholder="<?php _e( 'Search for a product&hellip;', 'woocommerce' ); ?>">
	<?php
	$product_field_type_ids = get_post_meta( $post->ID, '_product_field_type_ids', true );
	$product_ids = ! empty( $product_field_type_ids ) ? array_map( 'absint', $product_field_type_ids ) : null;
	if ( $product_ids ) {
	foreach ( $product_ids as $product_id ) {
	 
	$product = get_product( $product_id );
	$product_name = woocommerce_get_formatted_product_name( $product );
	 
	echo '<option value="' . esc_attr( $product_id ) . '" selected="selected">' . esc_html( $product_name ) . '</option>';
	}
	}
	?>
	</select> <img class="help_tip" data-tip='<?php _e( 'Your description here', 'woocommerce' ) ?>' src="<?php echo $woocommerce->plugin_url(); ?>/assets/images/help.png" height="16" width="16" />
	</p>
	<?php

	// Custom field Type
	?>
	<p class="form-field custom_field_type">
	<label for="custom_field_type"><?php echo __( 'Custom Field Type', 'woocommerce' ); ?></label>
	<span class="wrap">
	<?php $custom_field_type = get_post_meta( $post->ID, '_custom_field_type', true ); ?>	
	<input placeholder="<?php _e( 'Field One', 'woocommerce' ); ?>" class="" type="number" name="_field_one" value="<?php echo $custom_field_type[0]; ?>" step="any" min="0" style="width: 80px;" />
	<input placeholder="<?php _e( 'Field Two', 'woocommerce' ); ?>" type="number" name="_field_two" value="<?php echo $custom_field_type[1]; ?>" step="any" min="0" style="width: 80px;" />
	</span>
	<span class="description"><?php _e( 'Place your own description here!', 'woocommerce' ); ?></span>
	</p>
	<?php
		// Custom fields will be created here...
		echo '</div>';
}

function woo_add_custom_general_fields_save( $post_id ){
	// Text Field
	$woocommerce_text_field = $_POST['_text_field'];
	if( !empty( $woocommerce_text_field ) )
	update_post_meta( $post_id, '_text_field', esc_attr( $woocommerce_text_field ) );
	// Number Field
	$woocommerce_number_field = $_POST['_number_field'];
	if( !empty( $woocommerce_number_field ) )
	update_post_meta( $post_id, '_number_field', esc_attr( $woocommerce_number_field ) );
	// Textarea
	$woocommerce_textarea = $_POST['_textarea'];
	if( !empty( $woocommerce_textarea ) )
	update_post_meta( $post_id, '_textarea', esc_html( $woocommerce_textarea ) );
	// Select
	$woocommerce_select = $_POST['_select'];
	if( !empty( $woocommerce_select ) )
	update_post_meta( $post_id, '_select', esc_attr( $woocommerce_select ) );
	// Checkbox
	$woocommerce_checkbox = isset( $_POST['_checkbox'] ) ? 'yes' : 'no';
	update_post_meta( $post_id, '_checkbox', $woocommerce_checkbox );
	// Custom Field
	$custom_field_type = array( esc_attr( $_POST['_field_one'] ), esc_attr( $_POST['_field_two'] ) );
	update_post_meta( $post_id, '_custom_field_type', $custom_field_type );
	// Hidden Field
	$woocommerce_hidden_field = $_POST['_hidden_field'];
	if( !empty( $woocommerce_hidden_field ) )
	update_post_meta( $post_id, '_hidden_field', esc_attr( $woocommerce_hidden_field ) );
	// Product Field Type
	$product_field_type = $_POST['product_field_type'];
	update_post_meta( $post_id, '_product_field_type_ids', $product_field_type );
}

add_action('plugins_loaded', 'my_callback', 0);
function my_callback(){
    class WC_my_product extends WC_product { 
	    /**
		 * Get SKU (Stock-keeping unit) - product unique ID.
		 *
		 * @return string
		 */
		public function get_sku() {
			return $this->sku;
		}
    }
}