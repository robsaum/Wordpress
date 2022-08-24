<?php get_header(); ?>


<main role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php 	
	if ( is_front_page() ) {
    //Hide the page title and timestamp
		$da_sidebar = '';
    
	} else {
    	// This is not the blog posts index
    	$da_sidebar = get_sidebar();
    ?>
    	<header class="page-header">
    		<h1><?php the_title(); ?></h1>
			<h4>Posted on <?php the_time('F jS, Y') ?></h4>
		</header>
	<?php
	}
?>

<?php the_content(__('(more...)')); ?>
				
<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>


<?php echo $da_sidebar; ?>



</main>

<?php get_footer(); ?>