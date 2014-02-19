<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage myWoo
 * @since MyWoo 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'mywoo_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'mywoo' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'mywoo' ); ?>"><?php printf( __( 'Proudly powered by %s', 'mywoo' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>