<?php
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

//create some field at generate_tab product woocommerce
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
	
	<?php // Custom field Type ?>
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