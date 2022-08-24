<?php
/*
* Plugin Name: WordPress Plugin YouTube Embed
* Description: Shortcode to embed a GDPR compliant YouTube player
* Version: 1.5
* Author: Rob Saum
* Author URI: https://www.robsaum.com
*/


function get_vidID($content) {
	// Samples:
    // https://youtu.be/95aM4OIPWGs
    // https://www.youtube.com/watch?v=95aM4OIPWGs&feature=youtu.be
    $rem_parts = array('feature=youtu.be','https://www.youtube.com/','watch?v=','&#038;','&','amp;');
	
	if( strpos( $content, 'v=' ) !== false) {
		// URL has vars, strip them out
		foreach ($rem_parts as $part)  {
		    $content = str_replace($part,"",$content);
		}
		return $content;

	} else {
		// URL lacks vars
		$url_parts = explode('/', $content);
	    $parts = sizeof($url_parts);
	    $last_element = $parts -1;
	    $new_content = $url_parts[$last_element];
	    return $new_content;
	}
}


function youtube_emebed_function( $atts, $content = null ) {

	if( strpos( $content, ':' ) !== false) {
		// It's a URL
	    $new_content = get_vidID($content);
	    return '<iframe src="https://www.youtube-nocookie.com/embed/'. $new_content .'?modestbranding=1&#038;rel=0&#038;showinfo=0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" width="560" height="315" frameborder="0"></iframe>';

	} else {
		// It's an ID
	    return '<iframe src="https://www.youtube-nocookie.com/embed/'. $content .'?modestbranding=1&#038;rel=0&#038;showinfo=0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" width="560" height="315" frameborder="0"></iframe>';
	}
}

add_shortcode('yt', 'youtube_emebed_function');

?>