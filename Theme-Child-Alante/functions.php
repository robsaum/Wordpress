<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
      get_stylesheet_directory_uri() . '/style.css',
      array('parent-style'),
      wp_get_theme()->get('Version')
    );
	wp_enqueue_style( 'alantepro-child-theme-fonts', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
}


// Add Google Analytics to header
function rctle_google_analytics() { ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-KQ2C73M4MQ"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-KQ2C73M4MQ');
	</script>
    <?php
}      
add_action( 'wp_head', 'rctle_google_analytics', 10 );

// Rob added 2019-11-15
function wpb_widgets_init() {
    register_sidebar( array(
        'name'          => 'Custom Header Widget Area',
        'id'            => 'custom-header-widget',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// added to address canonical urls
/* Begin Rel-canonical by custom fields */
// A copy of rel_canonical but to allow an override on a custom tag
function rel_canonical_with_custom_tag_override()
{
 if( !is_singular() )
 return;

 global $wp_the_query;
 if( !$id = $wp_the_query->get_queried_object_id() )
 return;

 // check whether the current post has content in the "canonical_url" custom field
 $canonical_url = get_post_meta( $id, 'canonical_url', true );
 if( '' != $canonical_url )
 {
 // trailing slash functions copied from http://core.trac.wordpress.org/attachment/ticket/18660/canonical.6.patch
 $link = user_trailingslashit( trailingslashit( $canonical_url ) );
 }
 else
 {
 $link = get_permalink( $id );
 }
 echo "<link rel='canonical' href='" . esc_url( $link ) . "' />\n";
}

// remove the default WordPress canonical URL function
if( function_exists( 'rel_canonical' ) )
{
 remove_action( 'wp_head', 'rel_canonical' );
}
// replace the default WordPress canonical URL function with your own
add_action( 'wp_head', 'rel_canonical_with_custom_tag_override' );
/* End Rel-canonical by custom fields */


add_theme_support( 'align-wide' );


// Deactivate the Echo Kb CSS
add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 );
function remove_default_stylesheet() {
    wp_dequeue_style( 'epkb-public-styles' );
    wp_deregister_style( 'epkb-public-styles' );
 }


// Add back jquery-migrate which was dropped in WP 5.5
function wpdocs_selectively_enqueue_admin_script( $hook ) {
    if ( 'admin.php' == $hook ) {
        return;
    }
    wp_enqueue_script( 'my_custom_script', get_stylesheet_directory_uri() . '/jquery-migrate.min.js', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );


