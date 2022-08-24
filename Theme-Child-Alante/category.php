<?php
/**
 * The template for displaying Archive pages.
 *
 * @package ThinkUpThemes
 */

get_header(); ?>

			<?php if( have_posts() ): ?>
				<?php the_archive_description( '<div class="taxonomy-description" style="font-weight:600; font-size:120%; background:#eee; padding:10px; border: 1px solid #000; margin-bottom:20px">', '</div>' ); ?>

				<div id="container">
				
				<?php while( have_posts() ): the_post(); ?>

					<div class="blog-grid element<?php thinkup_input_stylelayout(); ?>">

					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-article'); ?>>

						<header class="entry-header<?php thinkup_input_stylelayout_class1(); ?>">
							<?php echo thinkup_input_blogimage(); ?>
						</header>		

						<div class="entry-content<?php thinkup_input_stylelayout_class2(); ?>">
							<?php thinkup_input_blogtitle(); ?>

							<?php thinkup_input_blogmeta_2(); ?>

							<?php thinkup_input_blogtext(); ?>
						</div>

					</article><!-- #post-<?php get_the_ID(); ?> -->

					</div>

				<?php endwhile; ?>

				</div><div class="clearboth"></div>

				<?php thinkup_input_pagination(); ?>

			<?php else: ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>		

			<?php endif; wp_reset_query(); ?>

<?php get_footer() ?>