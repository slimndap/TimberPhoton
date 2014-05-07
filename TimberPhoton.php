<?php
/*
Plugin Name: Timber with Jetpack Photon
Plugin URI: http://slimndap.com
Description: Make the Timber plugin work with Jetpack's Photon. Once installed, all TimberImages will use Photon as a CDN and for image manipulation (eg. resize).
Author: Jeroen Schmit
Version: 0.1
Author URI: http://slimndap.com
*/	

class TimberPhoton {
	function __construct() {
		$this->admin_notices = array();
		
		add_action('plugins_loaded',array($this,'plugins_loaded'));
		
		
	}
	
	function add_twig_filters($twig) {
		$twig->addFilter('resize', new Twig_Filter_Function(array($this, 'resize')));
		return $twig;
	}
	
	function admin_notices() {
		if (!empty($this->admin_notices)) {
			echo '<div class="error"><p>';
			if (in_array('timber', $this->admin_notices)) {
				_e('Timber with Jetpack Photon requires the Timber plugin to be installed and activated. <a href="http://jarednova.github.io/timber/">Get it here</a>.');				
			}
			if (in_array('photon', $this->admin_notices)) {
				_e('Timber with Jetpack Photon requires the Jetpack plugin to be installed with Photon activated.');				
			}
			echo '</p></div>';
		}
	}
	
	function resize($src, $w, $h = 0, $crop = 'default', $force_resize = false ) {
		if (empty($src)){
			return '';
		}
		
		if ($parsed = parse_url($src)) {

			// strip http:// from $src
			$src = $parsed['host'].$parsed['path'];
			if (!empty($parsed['query'])) {
				$src.= '?'.$parsed['query'];
			}			
			
			// Set width
			// Photon API: Set the width of an image. Defaults to pixels, supports percentages. 
			$args = array(
				'w' => $w
			);
			
			// Use fit if height is set
			// Photon API: Fit an image to a containing box of width,height dimensions. Image aspect ratio is maintained.
			if (!empty($h)) {
				$args['resize'] = $w.','.$h;
				unset ($args['w']);
			}
			$src = add_query_arg($args, $src);
			
			// create a Photon URL
			$src = $parsed['scheme'].'://i0.wp.com/'.$src;
		}
	
	
		return $src;
	}
	
	function plugins_loaded() {
		if ($this->system_ready()) {
			add_action('twig_apply_filters', array(&$this, 'add_twig_filters'), 99);
		}		
	}
	
	/*
	 * Check if Timber and Jetpack are installed and activated.
	 * Check if Photon is activated
	 */
	
	function system_ready() {
		global $timber;
	
		// Is Timber installed and activated?
		if (!class_exists('Timber')) {
			$this->admin_notices[] = 'timber';
			add_action( 'admin_notices', array($this,'admin_notices'));
			return false;
		}
		
		// Determine if Jetpack is installed and can generate photon URLs.
		if (!class_exists( 'Jetpack' ) || !method_exists( 'Jetpack', 'get_active_modules' ) || !in_array( 'photon', Jetpack::get_active_modules() )) {
			$this->admin_notices[] = 'photon';
			add_action( 'admin_notices', array($this,'admin_notices'));
			return false;
		}
		
		return true;
	}
}

new TimberPhoton();

?>
