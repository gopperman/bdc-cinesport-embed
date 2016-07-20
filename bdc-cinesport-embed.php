<?php
/**
 * Plugin Name: BDC Cinesport Embed
 * Plugin URI: http://www.boston.com
 * Description: Allow authors to embed cinesport videos into pages / posts
 * Version: 0.1.0
 * Author: Greg Opperman
 * Author URI: http://www.boston.com
 *
 * @package bdc.cinesport-embed
 * @version 0.1.0
 * @author Greg Opperman <gregory.opperman@globe.com>
 */

define( 'BDC_CINESPORT_EMBED_REGEX', '#^https?://(www.)?cinesport\.boston\.com/.*#' );

class BDC_Cinesport_Embed {
	/**
	 * Set up the default handlers for embedding
	*/
	function __construct() {

		// Example URL: http://cinesport.boston.com/boston-globe-sports/manning-reflects-win-over-brady-pats/
		wp_embed_register_handler( 'cinesport', BDC_CINESPORT_EMBED_REGEX, array( $this, 'cinesport_embed_handler' ) );

		add_shortcode( 'cinesport', array( $this, 'cinesport_shortcode_handler' ) );
	}

	function cinesport_embed_handler( $matches, $attr, $url ) {
		// Escape and change URL from permalink to embed URL, i.e http://cinesport.boston.com/embed/...
		$embed_url = esc_url( str_replace( '.com/', '.com/embed/', $url ) );

		$embed = '<div class="content-media__video content-media__video--cinesport"><iframe frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" src="' . $embed_url . '#autostart=on;titles=on;nolink=on;"></iframe></div>';

		return $embed;
	}

	function cinesport_shortcode_handler( $atts ) {
		global $wp_embed;
		if ( empty( $atts['url'] ) ) {
			return;
		}
		if ( ! preg_match( BDC_CINESPORT_EMBED_REGEX, $atts['url'] ) ) {
			return;
		}
		return $wp_embed->shortcode( $atts, $atts['url'] );
	}
}

new BDC_Cinesport_Embed;


