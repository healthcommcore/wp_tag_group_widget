<?php
/*
   Plugin Name: WP Tag Group Widget
   Description: Site plugin that displays tag group taxonomy in a widget
   Version: 1.0
   Author: Dave Rothfarb
   Organization: Dana-Farber Cancer Institute
   Group: Health Communication Core
*/
/*
*/
defined('ABSPATH') or die('No script kiddies please!');

add_action('plugins_loaded', 'tag_group_widget_init');

function tag_group_widget_init() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/pis-core.php';
  register_widget('TagGroupWidget');
}

?>
