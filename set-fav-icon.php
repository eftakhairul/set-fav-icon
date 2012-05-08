<?php
/*
Plugin Name: set-fav-icon
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This plugin will help you to set Fav icon to your blog.
Version: The Plugin's Version Number, e.g.: 1.0
Author: Eftakhairul Islam & Sirajus Salayhin 
Author URI: http://eftakhairul.com (Eftakhairul) & http://salayhin.com (Salayhin)
License: GPL2
*/

include_once('installation-plugin.php');

register_activation_hook (__FILE__,'es_favicon_install');
register_deactivation_hook (__FILE__,'es_favicon_uninstall');

add_action('admin_menu', 'es_set_favicon_create_menu');
add_action('wp_head', 'es_enqueue_favicon_head');


function es_set_favicon_create_menu()
{
    $main_option_page = __FILE__;
    add_menu_page('Set Fav icon', 'Set Icon Url', 'administrator', 'ad-fav-icon', 'es_save_favicon_url',plugins_url('/set-fav-icon/images/icon_pref_settings.gif','set-fav-icon'));
}

function es_enqueue_favicon_head()
{
    global $wpdb;
    $favIconTable = $wpdb->prefix . "fav_icon_link";
    $result = $wpdb->get_results("SELECT * FROM $favIconTable WHERE id = 1");
    echo '<link rel="shortcut icon" href="' . $result[0]->link . '" type="image/x-icon" /><!-- Favi -->';

}

function es_save_favicon_url()
{
    include("save-icon-url.php");
}





