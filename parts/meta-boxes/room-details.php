<?php
/*
Title: Room Details
Post Type: room
*/

piklist( 'field', [
  'type'  =>  'group',
  'label' =>  __( 'Room Item', 'cjwd-ird'),
  'field' =>  'room_items',
  'add_more'  =>  true,
  'fields'  => [
    [
      'type' => 'text',
      'field' => 'item_name',
      'label' =>  __( 'Name', 'cjwd-ird'),
      'columns' => 4,
      'required'  => true,
      'validate'  => [
        [
          'type'  =>  'limit',
          'options' =>  [
            'max' => 140
          ]
        ]

      ]
    ],
    [
      'type' => 'text',
      'field' => 'item_description',
      'label' =>  __( 'Description', 'cjwd-ird'),
      'columns' => 4,
      'required'  => true
    ],
    [
      'type'  => 'text',
      'field' => 'item_x_coord',
      'label' =>  __( 'X coord', 'cjwd-ird' ),
      'columns' => 2,
      'required'  => true
    ],
    [
      'type'  => 'text',
      'field' => 'item_y_coord',
      'label' =>  __( 'Y coord', 'cjwd-ird' ),
      'columns' => 2,
      'required'  =>  true
    ],
    [
      'type'  =>  'file',
      'field' =>  'item_image',
      'label' =>  __( 'Image', 'cjwd-ird'),
      'columns' => 12,
      'options' =>  [
        'save'  =>  'url'
      ],
      'required'  =>  true,
      'validate'  => [
        [
          'type'  =>  'image',
        ],
        [
          'type'  =>  'limit',
          'options' =>  ['max' => 1]
        ]
      ]
    ]
  ]
] );
