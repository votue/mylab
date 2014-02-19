<?php
/**
 * @package Mfp
 */
class Mfp_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'Mfp Widget',
			__( 'Mfp Widget' ),
			array( 'description' => __( 'Show a image' ) )
		);
		

		if ( is_active_widget( false, false, $this->id_base ) ) {
			add_action( 'wp_head', array( $this, 'css' ) );
			add_action( 'admin_head', array( $this, 'mfp_admin_css' ) );
		}
	}

	function css() {
		echo <<<EOT
		<style type="text/css">
			/*.mfp-admin-wrap fieldset{
				margin:10px 0px;
			}*/
		</style>
EOT;
	}
 	function mfp_admin_css(){
 		echo <<<EOT
		<style type="text/css">
			.mfp-admin-wrap fieldset{
				margin:10px 0px;
			}
		</style>
EOT;
 	}

 	//backend
	function form( $instance ) {
		if ( $instance ) {
			$image = esc_attr( $instance['my_fav_img'] );
		}
		else {
			$image = __( 'Spam Blocked' );
		}
		$field_id = $this->get_field_id( 'my_fav_img' );
		$field_name = $this->get_field_name( 'my_fav_img' );
		echo <<<EOT
			<div class="mfp-admin-wrap">
				<fieldset>
					<label for="$field_id"><?php _e( 'Image:' ); ?></label> 
					<input class="widefat" id="$field_id" name="" type="text" value="$image" />
				</fieldset>
			</div>
EOT;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance['my_fav_img'] = strip_tags( $new_instance['my_fav_img'] );
		return $instance;
	}

/*	function widget( $args, $instance ) {
		$count = get_option( 'akismet_spam_count' );

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}
?>

	<div class="a-stats">
		<a href="http://akismet.com" target="_blank" title=""><?php printf( _n( '<strong class="count">%1$s spam</strong> blocked by <strong>Akismet</strong>', '<strong class="count">%1$s spam</strong> blocked by <strong>Akismet</strong>', $count ), number_format_i18n( $count ) ); ?></a>
	</div>

<?php
		echo $args['after_widget'];
	}*/

	//frontend
	function widget($args, $instance){

		$name = get_option( 'mfp_fname' ).' '.get_option( 'mfp_lname' );
		echo '<ul><li>'.$name.'</li></ul>';
	}
}

function mfp_register_widgets() {
	register_widget( 'Mfp_Widget' );
}

add_action( 'widgets_init', 'mfp_register_widgets' );