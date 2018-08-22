<?php

/*
Plugin Name:	Padma Post Slider
Plugin URI:		https://www.padmaunlimited/plugins/post-slider
Description:  	Padma slider is a WordPress plugin that turns your posts into a post slider in different styles. Post slider is touch friendly and responsive for all devices.
Version:		1.0.3
Author: 		Padma Unlimited Team
Author URI: 	https://www.padmaunlimited.com/
License:      	GPL2
License URI:  	https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  	padma-post-slider
Domain Path:  	/languages


Padma Filter Gallery plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Padma Filter Gallery plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Padma Filter Gallery plugin. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


defined('ABSPATH') or die( 'Access Forbidden!' );


add_action('after_setup_theme', 'register_post_slider_block');
function register_post_slider_block() {

    if ( !class_exists('Padma') )
		return;

	require_once 'block.php';
	require_once 'block-options.php';
	
	if (!class_exists('PadmaBlockAPI') )
		return false;

	
	return padma_register_block('PadmaPostSliderBlock', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

}


/**
 *
 * Updates control
 *
 */
if(is_admin()){
	add_action('after_setup_theme', 'padma_post_slider_updates');
    function padma_post_slider_updates(){
        if(class_exists('PadmaUpdater')){
			$PadmaUpdater = new PadmaUpdater();
			$PadmaUpdater->updater('padma-post-slider',__DIR__);
		}
    }
}