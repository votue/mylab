<?php 
/**
 * @package WordPress
 * @subpackage eTheme
 * @since eTheme 1.0
 * @author VoTue
 */
?>
		</div><!-- #main .wrapper -->
			<footer id="colophon" role="contentinfo">
				<div class="site-info">
					<?php do_action( 'twentytwelve_credits' ); ?>
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>
	</body>
</html>