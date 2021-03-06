<?php

if (function_exists('acf_add_local_field_group')):
  acf_add_local_field_group(array(
    'key' => 'group_5bce2ca2758a6',
    'title' => 'Main page fields',
    'fields' => array(
      array(
        'key' => 'field_5bce2cd1e0af3',
        'label' => 'Intro CTA',
        'name' => 'step_1_cta',
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
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => ''
      ),
      array(
        'key' => 'field_5bce2ee250998',
        'label' => 'Step 1',
        'name' => 'step_1',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => ''
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5bce2ef550999',
            'label' => 'Question',
            'name' => 'step_1_question',
            'type' => 'text',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => ''
            ),
            'default_value' =>
              'First thing’s first -<br> Do you really live in Norfolk?',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => ''
          ),
          array(
            'key' => 'field_5bce2f095099a',
            'label' => 'Text',
            'name' => 'step_1_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => ''
            ),
            'default_value' => 'Think very carefully about your answer…',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => ''
          ),
          array(
            'key' => 'field_5bce2f510d872',
            'label' => '"No" answer text',
            'name' => 'no_answer_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => ''
            ),
            'default_value' => ':( Well, maybe you should',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => ''
          ),
          array(
            'key' => 'field_5bce2f7e0d873',
            'label' => '"No" answer link',
            'name' => 'no_answer_link',
            'type' => 'link',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => ''
            ),
            'return_format' => 'array'
          ),
          array(
            'key' => 'field_5bce2fab003cc',
            'label' => '"No" answer CTA',
            'name' => 'no_answer_cta',
            'type' => 'text',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => ''
            ),
            'default_value' =>
              'And as if you’d need another reason to move, see why Norfolk is proud here',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => ''
          )
        )
      ),
      array(
        'key' => 'field_5bce347e9e3e2',
        'label' => 'Step 2',
        'name' => 'step_2',
        'type' => 'group',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => ''
        ),
        'layout' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_5bce348f9e3e3',
            'label' => 'Main text',
            'name' => 'step_2_main_text',
            'type' => 'text',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => ''
            ),
            'default_value' => 'Yay! You’re already part of something great.',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => ''
          ),
          array(
            'key' => 'field_5bce34e09e3e4',
            'label' => 'Sub text',
            'name' => 'step_2_sub_text',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => ''
            ),
            'default_value' =>
              'Living in Norfolk, you’ve had an impact in ways you might not imagine. To find out what you’ll be most proud of, tell us what issues you care about:',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 4,
            'new_lines' => 'br'
          )
        )
      ),
      array(
        'key' => 'field_5bce42386f75f',
        'label' => 'Preloader',
        'name' => 'preloader',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => ''
        ),
        'collapsed' => 'field_5bce42436f760',
        'min' => 1,
        'max' => 0,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_5bce42436f760',
            'label' => 'Loader Text',
            'name' => 'loader_text',
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
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => ''
          )
        )
      ),
      array(
        'key' => 'field_5bcf5603d4476',
        'label' => 'Story order',
        'name' => 'story_order',
        'type' => 'post_object',
        'instructions' =>
          'Control the order of story buttons shown in Step 2. Also controls the order in which remaining stories (those other than the one selected by the visitor) appear in the carousel and the load-on-scroll by adding them here. Stories omitted here will still be loaded, in order of publish date, after the others.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => ''
        ),
        'post_type' => array(
          0 => 'post'
        ),
        'taxonomy' => array(),
        'allow_null' => 0,
        'multiple' => 1,
        'return_format' => 'object',
        'ui' => 1
      ),
      array(
        'key' => 'field_5bd1ea50588bd',
        'label' => 'Poster Download File',
        'name' => 'download_the_posters',
        'type' => 'file',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => ''
        ),
        'return_format' => 'url',
        'library' => 'all',
        'min_size' => '',
        'max_size' => '',
        'mime_types' => ''
      ),
      array(
        'key' => 'field_5bcf77477cb27',
        'label' => 'Scroll CTA Text',
        'name' => 'scroll_cta_text',
        'type' => 'text',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => ''
        ),
        'default_value' =>
          'Keep scrolling to learn about another way Norfolk should be proud',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => ''
      ),
      array(
        'key' => 'field_5bcf77477cb28',
        'label' => 'Email Share Subject',
        'name' => 'email_share_subject',
        'type' => 'text',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => ''
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => ''
      ),
      array(
        'key' => 'field_5bcf77477cb29',
        'label' => 'Email Share Body',
        'name' => 'email_share_body',
        'type' => 'textarea',
        'instructions' => '',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => ''
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'new_lines' => '',
        'rows' => ''
      )
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'front_page'
        )
      )
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => ''
  ));
endif;
