<?php
/**
 * Template Name: Full Width Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RCTLE_Theme
 */

get_header();
?>

<main id="primary" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

    	<header class="page-header">
    		<h1><?php the_title(); ?></h1>
			<h4>Posted: <?php the_time('F jS, Y') ?></h4>
		</header>
		<section class="page-section">
			<?php 
				//Display the content
				the_content(__('(more...)')); 
			?>
		</section>
		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php get_footer(); ?>
