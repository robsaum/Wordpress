<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package RCTLE_Theme
 */

get_header();
?>

	<main id="primary" class="container" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<header class="page-header">
    			<h1><?php the_title(); ?></h1>
				<p class="posted">Posted on <?php the_time('F jS, Y') ?></p>
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

		<?php endwhile; // End of the loop. ?>

			<div class="col-md-4 order-md-2 mb-4">
				<?php if( has_tag( 'iframe' ) ) {
                      $sidestuff = "";
                    } else {
                      $sidestuff = get_sidebar();
                    }
                    echo $sidestuff;
                ?>
			</div>

	</div>
	</main><!-- #main -->

<?php
get_footer();