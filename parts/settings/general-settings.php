<?php
/*
Title: General Settings
Setting: ird_settings
 */

piklist( 'field', [
  'type'  => 'text',
  'field' => 'ird_slideshow_width',
  'label' => __( 'Rooms Slideshow Width', 'cjwd-ird'),
  'help' => 'This forms the basis for the X and Y coordinates for room items',
  'value' =>  '940',
  'attributes' => [ 'class' => 'text']
] );
