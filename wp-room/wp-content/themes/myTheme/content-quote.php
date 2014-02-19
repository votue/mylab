<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package WordPress
 * @subpackage Simple_Code_Blog
 * @since Simple_Code_Blog 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'simplecode' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'simplecode' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
			<?php if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'simplecode' ) . '</span>', __( '1 Reply', 'simplecode' ), __( '% Replies', 'simplecode' ) ); ?>
			</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php edit_post_link( __( 'Edit', 'simplecode' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
