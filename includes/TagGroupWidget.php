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
    //print_r($labels);
    // GET ALL TERMS $results = get_terms( array('taxonomy' => 'post_tag'));
    $post = get_the_ID();
    $tag_arr = $this->makeTagArray( get_the_tags($post) );
    $tag_sql = $this->getTagGroupSQLStatement($tag_arr);
    $sql_arr = $wpdb->get_results("SELECT name, term_group FROM $wpdb->terms WHERE $tag_sql");
    $output_arr = $this->makeTagGroupOutputArray($sql_arr, $labels);
    $output = "<ul>";
    foreach($output_arr as $key => $arr) {
      $output .= "<li>$key</li><ul>";
        foreach($arr as $tag) {
          $output .= "<li>$tag</li>";
        }
      $output .= "</ul>";
    }
    $output .= "</ul>";
    echo $output;

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

  private function makeTagArray($tagObjs) {
    $tag_arr = [];
    foreach($tagObjs as $obj) {
      $tag_arr[]= $obj->term_id;
    }
    return $tag_arr;
  }

  private function getTagGroupSQLStatement($tag_arr) {
    $sql = "";
    foreach($tag_arr as $key => $val) {
      $sql .= "term_id=$val";
      $sql .= $key < ( count($tag_arr) - 1) ? " or " : ";";
    }
    return $sql;
  }

  private function makeTagGroupOutputArray($sql_arr, $labels) {
    $output = [];
    foreach($sql_arr as $obj) {
      $label = $labels[$obj->term_group];
      if (!isset($output[$label])) {
        $output[$label] = [];
      }
      $output[$label][] = $obj->name;
    }
    return $output;
  }

}

?>
