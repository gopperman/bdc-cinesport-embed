<?php
namespace Plugin_Cinesport_Embed;

class BDC_Cinesport_Embed_Integration_Test extends \WP_UnitTestCase {
	/**
	 * Test that the shortcode exists using WordPress's `shortcode_exists`
	 */
	function test_shortcode_added() {
		$this->assertTrue( shortcode_exists( 'cinesport' ) );
	}
}
