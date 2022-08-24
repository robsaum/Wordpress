<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package ThinkUpThemes
 *
 * Added the_title() header on 2019-11-18
 */

get_header(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; wp_reset_query(); ?>

<?php get_footer(); ?>