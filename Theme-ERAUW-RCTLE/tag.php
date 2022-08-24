<?php
/**
 * The template for displaying tags
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RCTLE_Theme
*/

get_header();
?>

<main id="primary" class="container" role="main">
            
    <?php if ( have_posts() ) : ?>

	<header class="page-header">
		<?php 
			the_archive_title( '<h1 class="page-title text-center">', '</h1>' );	
			the_archive_description( '<div class="archive-description" style="font-weight:600; font-size:120%; background:#eee; padding:10px; border: 1px solid #000; margin-bottom:20px; width:80%; margin-left: auto;margin-right: auto;">', '</div>' );
		?>
	</header><!-- .page-header -->

	<div class="row">
		<div class="col-md-8 order-md-1">
			<section class="page-section">

	        <?php


   			echo '<div class="card" style=""><div class="card-body">';
			echo do_shortcode( '[searchandfilter fields="category,post_tag" types="select,checkbox" headings="Category,Tags" hide_empty="1,1" show_count="1,1" hierarchical="1," empty_search_url="/" submit_label="Filter"]' );
			echo '</div></div>';



                // Start the Loop.
                while ( have_posts() ) : the_post(); ?>
                	




					<div class="card" style="">
				  		<div class="card-body">
				    		<h2 class="card-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				    		<small class="card-subtitle mb-2 text-muted"><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?><br />
				    			Filed under: <?php the_category( ', ' ); ?> |
				    			<?php the_tags(); ?>
				    		</small>
				    			<p class="card-text"><?php if ( has_post_thumbnail() ) : ?>
									    	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									        	<?php the_post_thumbnail( 'thumbnail',array( 'class' => 'img-thumbnail float-left' ) ); ?>
									    	</a>
										<?php endif; ?>
										<?php 
											the_excerpt(); 
											// Display the excerpt unless empty, then display the first 40 words 
											// if ( has_excerpt() ) { the_excerpt(); } else { echo wp_trim_words( get_the_content(), 40, '...' ); } 

										?>
										<!--
											<br /> 
											<a class="btn btn-primary" role="button" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> Read More&#8230;</a> 
										-->
									</p>
				 	 </div>
				</div>





                	<?php
            	endwhile;

            	the_posts_navigation( 
					array(
				    	'mid_size'  => 1, // 1 = no dropdowns, 2 = with dropdowns.
				    	'prev_text' => __( '<i class="fas fa-arrow-circle-left"></i>  Older Posts', 'textdomain' ),
				    	'next_text' => __( 'Newer Posts  <i class="fas fa-arrow-circle-right"></i>', 'textdomain' ),
				    	'class'     => '',
				    	'screen_reader_text' => __( 'Post navigation' ),
						'aria_label'         => __( 'Posts' ),
				) );
        
        		else :
         			

        			// No results
					get_template_part( 'template-parts/content', 'none' );



					// No results
					echo '<header class="page-header">';
					the_archive_title( '<h1 class="page-title text-center">', '</h1>' );
					echo '<div class="archive-description" style="font-weight:600; font-size:120%; background:#eee; padding:10px; border: 1px solid #000; margin-bottom:20px; width:80%; margin-left: auto;margin-right: auto;">
						There are no results to display as too many filters were selected. Try choosing fewer tags.
						</div>';
					echo '</header>';
					echo '<section class="category-section">';
		   			echo '<div class="card" style=""><div class="card-body">';
					echo do_shortcode( '[searchandfilter fields="category,post_tag" types="select,checkbox" headings="Category,Tags" hide_empty="1,1" hierarchical="1," show_count="1,1" empty_search_url="/" submit_label="Filter"]' );
					echo '</div></div>';




                endif;
            ?>
			</section><!-- #primary -->
		</div>

		<div class="col-md-4 order-md-2 mb-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>

<?php 

	//$category = get_queried_object();
	//echo $category->term_id;
	//echo $category->count;

	// Get the first category
	$category = get_the_category();
	$cat_size = sizeof($category);
	if($cat_size>1) {
		if(!empty($category)){$firstCategoryName = $category[1]->name;}
		if(!empty($category)){$firstCategoryID = $category[1]->term_id;}

	} else {
		if(!empty($category)){$firstCategoryName = $category[0]->name;}
		if(!empty($category)){$firstCategoryID = $category[0]->term_id;}
	}
?>

<script type="text/javascript">
	<?php 
	/* Remove all current options
		var select = document.getElementById("ofcategory");
	    select.options.length = 0; // set to 0 to wipe out list, set to 1 to keep the 'All Categories'
		select.options[select.selectedIndex].value = 'This is the selected message!!!';

	 	$(document).ready(()=>{ 
	        // $("#ofcategory").val('417').attr('selected', 'selected');
			// $("#ofcategory option[value=417]").attr('selected', 'selected');
			$("#ofcategory").append("<option value='"+cat_ID+"' selected='selected'>"+ cat_name +"</option>");
	    });  
	*/
	?>
	// Pass category name and ID from WordPress to jQuery
	var cat_name	= '<?php echo $firstCategoryName; ?>';
	var cat_ID 		= '<?php echo $firstCategoryID; ?>';	
	// Add the current category
 	$(document).ready(()=>{ 
		$("#ofcategory").append("<option value='"+cat_ID+"' selected='selected'>"+ cat_name +"</option>");
    });  
</script>


<?php

get_footer();