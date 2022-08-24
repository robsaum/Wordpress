<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package RCTLE_Theme
 *
 */

// From: https://www.smashingmagazine.com/2016/03/advanced-wordpress-search-with-wp_query/
$args1 = array( 
    'post_type'     => 'accommodation', 
    'meta_key'      => 'city', 
    'meta_value'        => 'Freiburg', 
    'meta_compare'  => 'LIKE' );

$args2 = array(
    'post_type' => 'accommodation',
    'meta_query'    => array(
        array( 'key' => 'city', 'value' => 'Paris', 'compare' => 'LIKE' ),
        array( 'key' => 'type', 'value' => 'room', 'compare' => 'LIKE' ),
        'relation' => 'AND'
    )
);

$the_query = new WP_Query( $args1 );
$query = new WP_Query( array( 'author_name' => 'carlo', 'category_name' => 'webdesign' ) );





get_header(); ?>
<main id="primary" class="container" role="main">
			<?php if ( have_posts() ) : ?>
		            <header class="page-header">
		            	<h1 class="search-title">
							<?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>"
						</h1>
		            </header><!-- .page-header -->
					
					<div class="row">
						<div class="col-md-8 order-md-1">
							<section class="page-section">
	     					
	     					<?php /* Start the Loop */
	            				while ( have_posts() ) : the_post(); ?>
	            					<?php // get_template_part( 'content', 'search' ); ?>
		            				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		            				<p class="search-post-excerpt">


										<?php if ( has_post_thumbnail() ) : ?>
									    	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									        	<?php the_post_thumbnail( 'thumbnail',array( 'class' => 'img-thumbnail float-left' ) ); ?>
									    	</a>
										<?php endif; ?>




		            					<?php the_excerpt(); ?><br /><br />
		            					
		            				</p>
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

		            				<br>
	    	        				
	        	    			<?php endwhile; ?>
	        	    			<br>
	            					<?php //the_posts_navigation(); ?>




										<?php the_posts_navigation( 
											array(
										    	'mid_size'  => 1, // 1 = no dropdowns, 2 = with dropdowns.
										    	'prev_text' => __( '<i class="fas fa-arrow-circle-left"></i>  Older Posts', 'textdomain' ),
										    	'next_text' => __( 'Newer Posts  <i class="fas fa-arrow-circle-right"></i>', 'textdomain' ),
										    	'class'     => '',
										    	'screen_reader_text' => __( 'Post navigation' ),
												'aria_label'         => __( 'Posts' ),
										) ); ?>

								<br><br>
	            			</section>
	            		</div>
					
					 
			        <?php else : ?>		
			        	<header class="page-header">
		    				<h1 class="search-title">Nothing Found</h1>
						</header> 
						<div class="row">
							<div class="col-md-8 order-md-1">
								<section class="page-section">
			            			<?php //get_template_part( 'template-parts/content', 'none' ); ?>
										<p>Try searching for another term.</p>
									<?php get_search_form( true ); ?>
								</section>
							</div>
			        <?php endif; 
						/* Restore original Post Data */
						wp_reset_postdata();
			        ?>

	            	<div class="col-md-4 order-md-2 mb-4">
						<?php get_sidebar(); ?>
					</div>

</main><!-- #main -->
<div class="clearboth"></div>

<?php // input_pagination(); ?>
<?php get_footer(); ?>