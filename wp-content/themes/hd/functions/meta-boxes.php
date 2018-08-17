<?php

add_action( 'admin_init', 'custom_meta_boxes' );

function custom_meta_boxes() {
  
  $meta_box = array(
    'id'          => 'meta_box',
    'title'       => 'Meta_box',
    'desc'        => '',
    'pages'       => array( 'post' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       =>'Options video',
        'id'          => 'options',
        'type'        => 'tab'
      ),
      array(
        'label'       => 'Src video',
        'id'          => 'src',
        'type'        => 'text',
        'desc'        => ''
      ),
      array(
        'label'       => 'Time',
        'id'          => 'time',
        'type'        => 'text',
        'desc'        => '',
      ),
    )
  );
  
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $meta_box );
}