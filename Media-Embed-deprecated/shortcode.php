<?php
/*
* Plugin Name: WordPress Plugin Media Embed Code Maker
* Description: Shortcode to create embed code for YouTube and Piktochart
* Version: 1.1
* Author: Rob Saum
* Author URI: https://www.robsaum.com
*/


function get_vidID($youtube_url) {
    $youtube_url_parts = array('feature=youtu.be','https://www.youtube.com/','watch?v=','&#038;','&','amp;');
	
	if( strpos( $youtube_url, 'v=' ) !== false) {
		// URL has vars, strip them out
		foreach ($youtube_url_parts as $part)  {
		    $youtube_url = str_replace($part,"",$youtube_url);
		}
		return $youtube_url;

	} else {
		// URL lacks vars
		$youtube_url_parts = explode('/', $youtube_url);
	    $youtube_url_last_element = sizeof($youtube_url_parts) -1;
	    return $youtube_url_parts[$youtube_url_last_element];
	}
}


function gen_youtube_player($youtube_content) {
	$yt_player_code = '<iframe src="https://www.youtube-nocookie.com/embed/'. $youtube_content .'?modestbranding=1&#038;rel=0&#038;showinfo=0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" width="560" height="315" frameborder="0"></iframe>';
	return $yt_player_code;	
}


function youtube_emebed_function( $atts, $youtube_shortcode = null ) {
	if( strpos( $youtube_shortcode, ':' ) !== false) {
		// It's a URL
	    $youtbe_ID = get_vidID($youtube_shortcode);
	    return gen_youtube_player($youtbe_ID);

	} else {
		// It's an ID
	    return gen_youtube_player($youtube_shortcode);
	}
}

add_shortcode('scYouTube', 'youtube_emebed_function');








function get_piktoID($piktochart_url) {
		$piktochart_url_parts = explode('/', $piktochart_url);
	    $piktochart_last_element = sizeof($piktochart_url_parts) -1;
	    return $piktochart_url_parts[$piktochart_last_element];
}


function gen_infographic($piktochart_content) {
	$piktochart_code = '<div class="piktowrapper-embed" style="height: 300px; position: relative;" data-uid="'. $piktochart_content .'"><div class="pikto-canvas-wrap"><div class="pikto-canvas"><div class="embed-loading-overlay" style="width: 100%; height: 100%; position: absolute; text-align: center;"><img alt="Loading..." style="margin-top: 100px" src="https://create.piktochart.com/loading.gif" width="60px"><p style="margin: 0; padding: 0; font-family: Lato, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px">Loading...</p></div></div></div></div><script>(function(d){var js, id="pikto-embed-js", ref=d.getElementsByTagName("script")[0];if (d.getElementById(id)) { return;}js=d.createElement("script"); js.id=id; js.async=true;js.src="https://create.piktochart.com/assets/embedding/embed.js";ref.parentNode.insertBefore(js, ref);}(document));</script>';
	return $piktochart_code;	
}





function piktochart_emebed_function( $atts, $piktochart_shortcode = null) {
	if( strpos( $piktochart_shortcode, ':' ) !== false) {
			// It's a URL
		    $piktochart_ID = get_piktoID($piktochart_shortcode);
		    return gen_infographic($piktochart_ID);

		} else {
			// It's an ID
	    	return gen_infographic($piktochart_shortcode);
		}
}


add_shortcode('scPikto', 'piktochart_emebed_function');
?>
