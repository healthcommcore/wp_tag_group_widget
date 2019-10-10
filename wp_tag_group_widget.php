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

add_action('widgets_init', 'init_tag_group_widget');

function init_tag_group_widget() {
  register_widget('TagGroupWidget');
}


class TagGroupWidget extends WP_Widget {

  public function __construct() {

    $widget_ops = array(
      'classname' => 'tag_group_widget',
      'description' => 'A plugin that displays Tag Groups in a widget'
    );

    parent::__construct('tag_group_widget', 'Tag Group Widget', $widget_ops);
  }

  public function widget($args, $inst) {
  }

  public function form($inst) {
  }

  public function update($new_inst, $old_inst) {
  }
}

?>
