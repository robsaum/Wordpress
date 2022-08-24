<?php
/**
 * The template for displaying archive pages
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

			<section class="archives-section">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>



				<article class="post">
					<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					<p class="post-meta"><?php the_time( 'F jS, Y' ); ?> | by: <a
							href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
						| category: <?php
						$categories = get_the_category();
						$comma      = ', ';
						$output     = '';
						
						if ( $categories ) {
							foreach ( $categories as $category ) {
								$output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $comma;
							}
							echo trim( $output, $comma );
						} ?>
					</p>
					<?php 
						// Display the excerpt unless empty, then display the first 40 words 
						if ( has_excerpt() ) { the_excerpt(); } else { echo wp_trim_words( get_the_content(), 40, '...' ); } 
					?>
				</article>

			<?php endwhile;

			the_posts_navigation();

		else :

			echo '<p>There are no posts!</p>';

		endif;
		?>
		</section>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
