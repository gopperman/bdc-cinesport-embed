<?php
namespace Plugin_Cinesport_Embed;

class BDC_Cinesport_Embed_Unit_Test extends \WP_UnitTestCase {
	/**
	 * Store an instance of our plugin's object for testing direct calls to its
	 * methods
	 */
	private $bdc_cinesport_embed = null;

	/**
	 * Create an instance of our plugin's object
	 */
	public function setUp() {
		// before
		parent::setUp();

		$this->bdc_cinesport_embed = new \BDC_Cinesport_Embed;
	}

	/**
	 * Test that the related links shortcode works. Hits all the regexes
	 */
	function test_cinesport_embed_shortcode_works() {
		//Videos
		$content = '[cinesport url="http://cinesport.boston.com/boston-globe-sports/manning-reflects-win-over-brady-pats/"]';
		$output = do_shortcode( $content );
		$this->assertEquals( '<div class="content-media__video content-media__video--cinesport"><iframe frameborder="0" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" src="http://cinesport.boston.com/embed/boston-globe-sports/manning-reflects-win-over-brady-pats/#autostart=on;titles=on;nolink=on;"></iframe></div>', $output );

		// Bad URL should return nothing
		$content = '[cinesport url="https://boston.com"]';
		$output = do_shortcode( $content );
		$this->assertEquals( '', $output );
	}
}
