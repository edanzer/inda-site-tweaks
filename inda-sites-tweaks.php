<?php

/*
Plugin Name: INDA Site Tweaks
Plugin URI: https://www.internationalnaturedetectives.org
Description: A custom plugin for www.internationalnaturedetectives.org
Author: Erick Danzer
Author URI: https://www.internationalnaturedetectives.org
version: 1.0.0
*/

define( 'INDA_SITE_TWEAKS_VERSION', '1.0.0' );

class Inda_Site_Tweaks {

	function __construct() {

		$this->add_hooks();

	}

  	function add_hooks() {

		if ( is_admin() ) {
			// Add admin only hooks here
		} else {
			// Add front end only hooks here
		}

		// Add general hooks here
		add_action('h5p_alter_library_styles', array($this, 'h5pmods_custom_css'), 10, 3);

	}

	/**
	 * Add custom stylesheet for H5P. 
	 *
	 * @param object &styles List of stylesheets that will be loaded.
	 * @param array $libraries The libraries which the styles belong to.
	 * @param string $embed_type Possible values are: div, iframe, external, editor.
	 */
	function h5pmods_custom_css(&$styles, $libraries, $embed_type) {
	  $styles[] = (object) array(
	    // Path can be relative to wp-content/uploads/h5p or absolute.
	    'path' => 'https://www.internationalnaturedetectives.org/wp-content/plugins/inda-site-tweaks/css/hp5-custom.css',
	    'version' => '?ver=.03' // Cache buster
	  );
	}

}

new Inda_Site_Tweaks();