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

  public function widget($args, $inst) {
    global $wpdb;
    //$results = $wpdb->get_results("SELECT $wpdb->;terms.name, $wpdb->;terms.term_group FROM $wpdb->;terms WHERE $wpdb->;terms.term_group NOT = 0");
    /* GET GROUP LABELS */ $labels = get_option('term_group_labels', array('result'=> 'nada'));
    /*GET GROUP POSITIONS */ $positions = get_option('term_group_positions', array('result'=> 'nada'));
    print_r($results);
    // GET ALL TERMS $results = get_terms( array('taxonomy' => 'post_tag'));
    $post = get_the_ID();
    $tag_arr = get_the_tags($post);
    //print_r($tag_arr);
    /*
    echo "<ul>";
    foreach($tag_arr as $tag) {
      echo "<li><strong>Tag name: </strong>$tag->name</li>";
    }
    echo "</ul>";
    */
      

  }

  public function form($inst) {
  }

  public function update($new_inst, $old_inst) {
  }
}

?>
