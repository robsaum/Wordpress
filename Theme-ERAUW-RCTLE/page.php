<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RCTLE_Theme
 */

get_header();
?>

		<?php while ( have_posts() ) : the_post(); ?>

		<?php 	
			if ( is_front_page() ) {
		    //Hide the page title, timestamp, and sidebar. Remove container.
				echo '<main id="primary" role="main">';
				the_content(__('(more...)'));
						    
			} else {
		    // This is not the blog posts index
		    	echo '<main id="primary" class="container" role="main">';
		    ?>
		    	<header class="page-header">
		    		<h1><?php the_title(); ?></h1>
					<h4>Posted on <?php the_time('F jS, Y') ?></h4>
					<div class="container">
					  <div class="row">
					    <div class="col-">
					      Filed under: 
					    </div>
					    <div class="col-">
					      <?php the_category(); ?>
					    </div>
					    <div class="col-">
					      <?php the_tags(); ?>
					    </div>
					  </div>
					</div>
				</header>
				<div class="row">
					<div class="col-md-8 order-md-1">
						<section class="page-section">
						<?php 
							//Display the content
							the_content(__('(more...)')); 
						?>
						</section>
					</div>
					<div class="col-md-4 order-md-2 mb-4">
						<?php echo get_sidebar(); ?>
					</div>
				</div>

			<?php
			}
		?>
	
		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->

<?php get_footer(); ?>