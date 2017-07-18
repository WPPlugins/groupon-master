<?php
/**
Plugin Name: Groupon Master
Plugin URI: http://wordpress.techgasp.com/groupon-master/
Version: 5.0.6
Author: TechGasp
Author URI: http://wordpress.techgasp.com
Text Domain: groupon-master
Description: Easy to use bombastic plugin that will be a great source of income for any wordpress webmaster. Groupon Master.
License: GPL2 or later
*/
/*
Copyright 2013 TechGasp  (email : info@techgasp.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!class_exists('groupon_master')) :
///////DEFINE///////
define( 'GROUPON_MASTER_VERSION', '5.0.6' );
define( 'GROUPON_MASTER_NAME', 'Groupon Master' );

class groupon_master{
public static function content_with_quote($content){
$quote = '<p>' . get_option('tsm_quote') . '</p>';
	return $content . $quote;
}
//SETTINGS LINK IN PLUGIN MANAGER
public static function groupon_master_links( $links, $file ) {
if ( $file == plugin_basename( dirname(__FILE__).'/groupon-master.php' ) ) {
		if( is_network_admin() ){
		$techgasp_plugin_url = network_admin_url( 'admin.php?page=groupon-master' );
		}
		else {
		$techgasp_plugin_url = admin_url( 'admin.php?page=groupon-master' );
		}
	$links[] = '<a href="' . $techgasp_plugin_url . '">'.__( 'Settings' ).'</a>';
	}
	return $links;
}

//END CLASS
}
add_filter('the_content', array('groupon_master', 'content_with_quote'));
add_filter( 'plugin_action_links', array('groupon_master', 'groupon_master_links'), 10, 2 );
endif;

// HOOK ADMIN
require_once( dirname( __FILE__ ) . '/includes/groupon-master-admin.php');
// HOOK ADMIN ADDONS
require_once( dirname( __FILE__ ) . '/includes/groupon-master-admin-addons.php');
// HOOK ADMIN WIDGETS
require_once( dirname( __FILE__ ) . '/includes/groupon-master-admin-widgets.php');
// HOOK WIDGET BUTTONS
require_once( dirname( __FILE__ ) . '/includes/groupon-master-widget-buttons.php');
// HOOK WIDGET GROUPON DEALS
require_once( dirname( __FILE__ ) . '/includes/groupon-master-widget-groupon-deals.php');
