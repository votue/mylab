<?php 
/**
 * @package WordPress
 * @subpackage eTheme
 * @since eTheme 1.0
 * @author VoTue
 */
?>
<?php get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php if ( have_posts() ) : ?>
			<!-- List Content -->
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php //twentytwelve_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<!-- No Articles -->
			<article id="post-0" class="post no-results not-found">

				<?php if ( current_user_can( 'edit_posts' ) ) : ?>
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'No posts to display', 'twentytwelve' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'twentytwelve' ), admin_url( 'post-new.php' ) ); ?></p>
					</div>

				<?php else : ?>
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'twentytwelve' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				<?php endif ?>

			</article>

		<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer() ?>