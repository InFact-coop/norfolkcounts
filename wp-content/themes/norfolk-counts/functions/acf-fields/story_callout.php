<?php

if (function_exists('acf_add_local_field_group')):
  acf_add_local_field_group(array(
    'key' => 'group_5bce36bbae2d8',
    'title' => 'Story Callout',
    'fields' => array(
      array(
        'key' => 'field_5bce36c4bf159',
        'label' => 'Callout',
        'name' => 'callout',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => ''
        ),
        'default_value' => '',
        'placeholder' =>
          'Umma Milli is one of the 500,000 Rohingya refugees who fled Myanmar since last year.',
        'prepend' => '',
        'append' => '',
        'maxlength' => ''
      )
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post'
        )
      )
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => ''
  ));
endif;
