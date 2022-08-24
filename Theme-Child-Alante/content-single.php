<?php
/**
 * The Single Post content template file.
 *
 * @package ThinkUpThemes
 *
 * Added single_post_title() header
 */
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php thinkup_input_postmeta(); ?>

		<h1><?php single_post_title(); ?></h1>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'alante' ), 'after'  => '</div>', ) ); ?>
		</div><!-- .entry-content -->

		</article>

		<div class="clearboth"></div>