<?php
/**
 * NOTE: tag group names are in wp_options with option_name=term_group_labels
 *
 */

class TagGroupWidget extends WP_Widget {

  public function __construct() {

    $widget_ops = array(
      'classname' => 'tag_group_widget',
      'description' => 'A plugin that displays Tag Groups in a widget'
    );

    parent::__construct('tag_group_widget', 'Tag Group Widget', $widget_ops);
  }

  public function widget($args, $inst) 
  }

  public function form($inst) {
  }

  public function update($new_inst, $old_inst) {
  }
}

?>

