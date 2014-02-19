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
		}
	}

	function css() {
		echo <<<EOT
		<style type="text/css">
		</style>
EOT;
	}
 
	function form( $instance ) {
		if ( $instance ) {
			$image = esc_attr( $instance['my_fav_img'] );
		}
		else {
			$image = __( 'Spam Blocked' );
		}
?>

		<fieldset>
			<label for="<?php echo $this->get_field_id( 'my_fav_img' ); ?>"><?php _e( 'Image:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'my_fav_img' ); ?>" name="<?php echo $this->get_field_name( 'my_fav_img' ); ?>" type="text" value="<?php echo $image; ?>" />
		</fieldset>

<?php }

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

	function widget($args, $instance){

		$name = get_option( 'mfp_fname' ).' '.get_option( 'mfp_lname' );
		echo '<ul><li>'.$name.'</li></ul>';
	}
}

function mfp_register_widgets() {
	register_widget( 'Mfp_Widget' );
}

add_action( 'widgets_init', 'mfp_register_widgets' );