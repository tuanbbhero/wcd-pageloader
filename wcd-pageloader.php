<?php
/*
Plugin Name: WCD Page Loader
Plugin URI: https://github.com/WestCoastDigital/wcd-pageloader/
Description: Add a page loader with the new after_body hook and have the ability to change the svg in the customiser
Author: Jon Mather
Author URI: https://westcoastdigital.com.au
Contributors: WestCoastDigital
Requires at least: 5.2
Tested up to: 5.2
Stable tag: 1.0.0
Version: 1.0.0
Text Domain: wcd
Domain Path: /languages
License: GPL v2 or later
*/

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


function wcd_page_loader()
{
	$defaultGif = '<svg class="lds-blocks" width="200px"  height="200px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;"><rect x="19" y="19" width="20" height="20" fill="#1d3f72">
		<animate attributeName="fill" values="#5699d2;#1d3f72;#1d3f72" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0s" calcMode="discrete"></animate>
	  </rect><rect x="40" y="19" width="20" height="20" fill="#1d3f72">
		<animate attributeName="fill" values="#5699d2;#1d3f72;#1d3f72" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.125s" calcMode="discrete"></animate>
	  </rect><rect x="61" y="19" width="20" height="20" fill="#1d3f72">
		<animate attributeName="fill" values="#5699d2;#1d3f72;#1d3f72" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.25s" calcMode="discrete"></animate>
	  </rect><rect x="19" y="40" width="20" height="20" fill="#1d3f72">
		<animate attributeName="fill" values="#5699d2;#1d3f72;#1d3f72" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.875s" calcMode="discrete"></animate>
	  </rect><rect x="61" y="40" width="20" height="20" fill="#1d3f72">
		<animate attributeName="fill" values="#5699d2;#1d3f72;#1d3f72" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.375s" calcMode="discrete"></animate>
	  </rect><rect x="19" y="61" width="20" height="20" fill="#1d3f72">
		<animate attributeName="fill" values="#5699d2;#1d3f72;#1d3f72" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.75s" calcMode="discrete"></animate>
	  </rect><rect x="40" y="61" width="20" height="20" fill="#1d3f72">
		<animate attributeName="fill" values="#5699d2;#1d3f72;#1d3f72" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.625s" calcMode="discrete"></animate>
	  </rect><rect x="61" y="61" width="20" height="20" fill="#1d3f72">
		<animate attributeName="fill" values="#5699d2;#1d3f72;#1d3f72" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.5s" calcMode="discrete"></animate>
	  </rect></svg>';
	$customSVG = get_theme_mod('pageloader_svg');
	if ($customSVG) {
		$gif_loader = $customSVG;
	} else {
		$gif_loader = $defaultGif;
	}
	$content = '<div id="gp-preloader">';
	$content .= '<div class="graphic">';
	$content .= $gif_loader;
	$content .= '</div>';
	$content .= '</div>';
	echo $content;
}
add_action('wp_body_open', 'wcd_page_loader');


function wcd_pageloader_customiser($wp_customize)
{
	$wp_customize->add_setting('pageloader_svg', array(
		'default' 		=> '',
		'type' 				=> 'theme_mod',
		'capability'	=> 'edit_theme_options',
		'transport' 	=> 'refresh',
	));

	$wp_customize->add_control('pageloader_svg', array(
		'type' 				=> 'textarea',
		'priority' 		=> 160,
		'section' 		=> 'title_tagline',
		'label' 			=> __('SVG Code', 'wcd'),
		'description'	=> '',
	));
}
add_action('customize_register', 'wcd_pageloader_customiser');

function wcd_pageloader_script()
{
	wp_enqueue_script('theme-script', plugin_dir_url(__FILE__) .  'script.min.js');
}
add_action('wp_enqueue_scripts', 'wcd_pageloader_script', 100);