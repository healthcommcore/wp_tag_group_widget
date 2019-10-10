<?php
/*
   Plugin Name: WP Tag Group Widget
   Description: Site plugin that displays tag group taxonomy in a widget
   Version: 1.0
   Author: Dave Rothfarb
   Organization: Dana-Farber Cancer Institute
   Group: Health Communication Core
*/

defined('ABSPATH') or die('No script kiddies please!');

add_action('the_content', 'hello_world');

function hello_world($content) {
  return $content .= '<p>Hello world!</p>';
}
?>
