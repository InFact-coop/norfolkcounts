<?php
/*
*
*
* Expects $post to be a WP post object
*
*/
global $post;
setup_postdata($post);
$fields = get_fields($post->ID); ?>

<!-- Introduction -->
<div class="article-introduction"
    data-ga-category="stories"
    data-ga-action="view"
    data-ga-label="<?=esc_attr($post->post_title);?>"
    data-fb-event="ViewContent"
    data-fb-event-name="<?=esc_attr($post->post_title);?>">

  <div class="row">
    <div class="small-12 medium-6 columns">
      <div class="article-content">

        <div class="for-slide">
          <span class="tag"><?= $post->post_title; ?></span>
          <span class="title"><?= $fields['callout'];?></span>
          <?php the_content();
          if(false){ ?>
            <p><span class="intro">UMMA MILLI’S STORY</span> The UN has called the crisis a textbook example of ethnic cleansing. Umma is 8 years old and is currently living in Balukhali refugee camp in Bangladesh.</p>
            <p>Water is a major challenge for those living in the camps. With campsites prone to floods and overcrowding, disease outbreaks are common. A shortage of toilets poses a further risk to water borne diseases. Many children like Umma are having to bathe in dirty ponds.</p>
          <?php } ?>
        </div>

        <div class="for-cta">
          <?php $frontpage_id = get_option( 'page_on_front' ); ?>
          <span class="tag"><?= $post->post_title; ?></span>
          <span class="title"><?= get_field('scroll_cta_text', $frontpage_id); ?></span>
        </div>

      </div>
    </div>
    <div class="small-12 medium-6 columns">
      <figure class="article-image">
        <img src="<?= get_featured_image_src(); ?>" alt="<?php esc_attr_e($post->post_title); ?>">
        <figcaption>Credit: <?= get_featured_image_caption(); ?></figcaption>
      </figure>
    </div>
  </div>
</div>
<!-- //Introduction -->
