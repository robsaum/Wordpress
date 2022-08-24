<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package RCTLE_Theme
 */

get_header();
?>

<main id="primary" class="container" role="main">

		
			<header class="page-header">
				<h1 class="page-title text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rctle-slug' ); ?></h1>
			</header><!-- .page-header -->

		<section class="page-section error-404 not-found">
			<div class="page-content text-center">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rctle-slug' ); ?></p>
					<?php get_search_form(); ?>
			</div>

			<div class="row" style="margin-top: 2em; margin-bottom: 2em">
				<div class="col-4">
					<div class="card mb-4 shadow-sm">
						<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
					</div>
				</div>
				<div class="col-4">
					<div class="card mb-4 shadow-sm">
						<h2><?php esc_html_e( 'Most Used Categories', 'rctle-slug' ); ?></h2>
							<ul lass="card-text">
								<?php
									wp_list_categories(
									array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
										)
									);
								?>
							</ul>
						</div>
					</div>
				<div class="col-4">
					<div class="card mb-4 shadow-sm">
						<?php
							/* translators: %1$s: smiley */
							$rctle_slug_archive_content = '<p class="card-text">' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'rctle-slug' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$rctle_slug_archive_content" );

							the_widget( 'WP_Widget_Tag_Cloud' );
						?>
					</div>
				</div>
			</div>
		</section><!-- .error-404 -->
	</main>

<?php get_footer(); ?>