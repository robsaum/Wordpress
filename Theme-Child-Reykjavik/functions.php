<?php

// Load CSS
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
      get_stylesheet_directory_uri() . '/style.css',
      array('parent-style'),
      wp_get_theme()->get('Version')
    );
	wp_enqueue_style( 'reykjavik_child-theme-fonts', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' );
}

// Add Google Analytics to header
function blli_google_analytics() { ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-SLZC8B2KH8"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-SLZC8B2KH8');
        /* gtag('config', 'G-VZ9K6SFPS0'); gtag('config', 'UA-217855727-1'); */
	</script>
    <?php
}      
add_action( 'wp_head', 'blli_google_analytics', 10 );





