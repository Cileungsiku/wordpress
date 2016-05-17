<?php
/* 
Plugin Name: Social Media Widget by Acurax
Plugin URI: http://www.acurax.com/products/floating-social-media-icon-plugin-wordpress/
Description: A Simple Wordpress Plugin Which Allow You To Add Widget Which Links Social Media Icons to Your Social Media Profiles Twitter,Facebook,Pinterest,Youtube,Rss Feed,Linkedin,google plus. You can define icon style size for each widget.
Author: Acurax 
Version: 2.4.1
Author URI: http://www.acurax.com 
License: GPLv2 or later
*/
/*
Copyright 2008-current  Acurax International  ( website : www.acurax.com )
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/ 
define('ACX_SOCIALMEDIA_WIDGET_TOTAL_THEMES', 24);
define('ACX_SMW_TOTAL_STATIC_SERVICES', 7);
define('ACX_SMW_VERSION', "2.4.1");
?>
<?php
//*************** Include JS in Header ********
function enqueue_acx_social_widget_icon_script()
{
	wp_enqueue_script ( 'jquery' );
}	add_action( 'get_header', 'enqueue_acx_social_widget_icon_script' );
//*************** Include JS in Header Ends Here ********
//*********** Include Additional Menu ********************
function Acurax_Widget_Links($links, $file) {
	$plugin = plugin_basename(__FILE__);
	// create link
	$acx_installation_domain = $_SERVER['HTTP_HOST'];
	$acx_installation_domain = str_replace("www.","",$acx_installation_domain);
	$acx_installation_domain = str_replace(".","_",$acx_installation_domain);
	if($acx_installation_domain == "") { $acx_installation_domain = "not_defined";}
	if ($file == $plugin) {
	
		return array_merge( $links, array( 
			'<div id="plugin_page_links"><a href="http://www.acurax.com?utm_source=wp&utm_medium=link&utm_campaign=plugin-page&ref=' . $acx_installation_domain . '" target="_blank">' . __('Acurax International') . '</a>',
			'<a href="https://twitter.com/#!/acuraxdotcom" target="_blank">' . __('Acurax on Twitter') . '</a>',
			'<a href="http://www.facebook.com/AcuraxInternational" target="_blank">' . __('Acurax on Facebook') . '</a>',
			'<a href="http://wordpress.acurax.com/?utm_source=wp&utm_medium=link&utm_campaign=plugin-page&ref=' . $acx_installation_domain . '" target="_blank">' . __('Wordpress Expert Support') . '</a>'
		));
	}
	return $links;
}	add_filter('plugin_row_meta', 'Acurax_Widget_Links', 10, 2 );
//*********************************************************
include('function.php');
//*************** Admin function ***************
function acx_social_widget_icon_admin() 
{
	include('social-icon.php');
}
function acx_social_widget_icon_help() 
{
	include('social-help.php');
}
function acx_social_widget_icon_premium() 
{
	include('premium.php');
}
function acx_social_widget_troubleshoot() 
{
	include('troubleshoot.php');
}
function acx_social_widget_icon_misc() 
{
	include('smw-misc.php');
}
$acx_si_smw_hide_expert_support_menu = get_option('acx_si_smw_hide_expert_support_menu');
if ($acx_si_smw_hide_expert_support_menu == "") {	$acx_si_smw_hide_expert_support_menu = "no"; }
function acx_social_widget_icon_admin_actions()
{
global $acx_si_smw_hide_expert_support_menu;
	add_menu_page(  'Acurax Social Media Widget Configuration', 'Social Media Widget Settings', 'manage_options', 'Acurax-Social-Widget-Settings','acx_social_widget_icon_admin',plugin_dir_url( __FILE__ ).'/images/acurax_international.png' ); // 'manage_options' for admin
	
	add_submenu_page('Acurax-Social-Widget-Settings', 'Acurax Social Icon Premium', 'Premium', 'manage_options', 'Acurax-Social-Widget-Premium' ,'acx_social_widget_icon_premium');
	
	add_submenu_page('Acurax-Social-Widget-Settings', 'Acurax Social Icon Misc Settings', 'Misc', 'manage_options', 'Acurax-Social-Widget-Misc' ,'acx_social_widget_icon_misc');
	add_submenu_page('Acurax-Social-Widget-Settings', 'Acurax Troubleshooter', 'Troubleshoot', 'manage_options', 'Acurax-Social-Widget-Troubleshooter' ,'acx_social_widget_troubleshoot');
	if($acx_si_smw_hide_expert_support_menu == "no") {
	add_submenu_page('Acurax-Social-Widget-Settings', 'Acurax Expert Support', 'Expert Support', 'manage_options', 'Acurax-Social-Widget-Expert-Support' ,'acx_social_widget_troubleshoot');
	}
	add_submenu_page('Acurax-Social-Widget-Settings', 'Acurax Social Widget Help and Support', 'Help', 'manage_options', 'Acurax-Social-Widget-Help' ,'acx_social_widget_icon_help');
}
	
if ( is_admin() )
{
	add_action('admin_menu', 'acx_social_widget_icon_admin_actions');
}
?>