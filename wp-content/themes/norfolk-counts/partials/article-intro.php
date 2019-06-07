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

          <div class="lead-counter">
            <?= $fields['stats_section']; ?>
          </div>

          <div class="share-buttons">
            <?php wp_reset_postdata(); ?>
            <a href="<?=mailto_link();?>" class="btn-social email" data-log-ga
            data-ga-category="email-button"
            data-ga-action="click"
            data-ga-label="Email"
            data-fb-event="CompleteAction"
            data-fb-event-name="Email"
            data-link-out="<?=mailto_link();?>"><i></i> Email</a>
            <a href="<?=twitter_link();?>" class="btn-social twitter" target="_blank" data-log-ga
            data-ga-category="twitter-button"
            data-ga-action="click"
            data-ga-label="Twitter"
            data-fb-event="CompleteAction"
            data-fb-event-name="Twitter"
            data-link-out="<?=twitter_link();?>"><i></i> Twitter</a>

          </div>

          <div>
          <div class="story-paragraph">
            <?= $fields['story_heading']; ?>
            <?= $fields['story_content']; ?>
          </div>
          <div class="norfolk-paragraph">
            <?= $fields['norfolk_heading']; ?>
            <?= $fields['norfolk_content']; ?>
          </div>
          </div>


          <?php the_content();
          if(false){ ?>
            <p><span class="intro">UMMA MILLI’S STORY</span> The UN has called the crisis a textbook example of ethnic cleansing. Umma is 8 years old and is currently living in Balukhali refugee camp in Bangladesh.</p>
            <p>Water is a major challenge for those living in the camps. With campsites prone to floods and overcrowding, disease outbreaks are common. A shortage of toilets poses a further risk to water borne diseases. Many children like Umma are having to bathe in dirty ponds.</p>
          <?php } ?>
        </div>


        <div class="highlighted">
          <?= $fields['highlight_section']; ?>
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
