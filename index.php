<?php
/**
 * Plugin Name: WP Check Indexable
 * Plugin URI: https://eastsidecode.com
 * Description: This add a notice in the admin panel if a site can or can't be indexed. 
 * Version: 1.1
 * Author: EastSide Code
 * Author URI: http://eastsidecode.com
 * License: GPL12

 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class esCodeCheckIndexable {

	function __construct() {
		

		add_action( 'admin_notices', function() {
			  ob_start();
    		  do_action('wp_head');
    		  $esCodeSiteHeaderContent = ob_get_clean();
    		  
    		  $escodeHasNoIndex = false;

			  if (strpos($esCodeSiteHeaderContent, 'noindex') !== false) {
			    $escodeHasNoIndex = true;
			 } else {
			 	$escodeHasNoIndex = false;
			 }

			 if ($escodeHasNoIndex) {
			 	echo "<div id='update-nag' class='notice-error' style='border-left-color: #ff0000;'>";
			    echo "<b>This website is set to no index. Search Engines will not crawl it.</b>";
			    echo "</div>";
			} else {
			    echo "<div id='update-nag' class='notice-info' style='border-left-color: #0000ff;'>";
			    echo "<b>This website is set to index. Search engines can crawl it.</b>";
			    echo "</div>";
			}


		}, 3 );


	} // end construct

} // end class


// initialise the class with an object
$esCodeCheckIndexable= new esCodeCheckIndexable();