<?php
/**
 * Post Types
 *
 * Registers post types and taxonomies.
 *
 * @class     Cjwd_Ird_Post_types
 * @version   1.0.0
 * @package   Cjwd_Ird
 * @package   Cjwd_Ird/admin
 * @category  Class
 * @author    Chinara James <cjwd@chinarajames.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Studiousapp_Notes_Post_types Class.
 */
class Cjwd_Ird_Post_types {

  /**
   * Hook in methods.
   */
  public static function init() {
    add_filter('piklist_post_types', array( __CLASS__ , 'register_post_types' ) );
  }

  /**
   * Register core post types.
   */
  public static function register_post_types() {
    if ( post_type_exists('room') ) {
      return;
    }

    do_action( 'ird_register_post_type' );

    $post_types['room'] = array(
      'labels' => piklist('post_type_labels', 'Room')
      ,'title' => __('Enter a new Room Title')
      ,'menu_icon' => piklist('url', 'piklist') . '/parts/img/piklist-menu-icon.svg'
      ,'page_icon' => piklist('url', 'piklist') . '/parts/img/piklist-page-icon-32.png'
      ,'supports' => array(
        'title'
        ,'thumbnail'
        ,'page-attributes'
      )
      ,'public' => true
      ,'admin_body_class' => array(
        'room'
      )
      ,'has_archive' => true
      ,'capability_type' => 'post'
      ,'edit_columns' => array(
        'title' => __('Room', 'cjwd-ird')
        ,'room_image' => __('Image', 'cjwd-ird')
      )
      ,'show_in_rest' => true
    );

    return $post_types;

  }

}

Cjwd_Ird_Post_types::init();
