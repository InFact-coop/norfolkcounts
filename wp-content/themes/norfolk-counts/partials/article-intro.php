<?php
/*
 *
 *
 * Expects $post to be a WP post object
 *
 */
global $post;
setup_postdata($post);
$fields = get_fields($post->ID);
?>

<!-- Introduction -->
<div class="article-introduction" data-ga-category="stories" data-ga-action="view" data-ga-label="<?= esc_attr($post->post_title) ?>" data-fb-event="ViewContent" data-fb-event-name="<?= esc_attr($post->post_title) ?>">
  <div class="row">
    <div class="small-12 medium-6 columns">
      <div class="article-content">
        <div class="for-slide">
          <span class="tag"><?= $post->post_title ?></span>

          <div class="lead-counter">
            <?= $fields['stats_section'] ?>
          </div>

          <div class="first-cta">
            <div class="cta-heading">Ask Liz Truss to protect Norfolk's Aid contributions.</div>
            <div class="cta-buttons">
              <?php wp_reset_postdata(); ?>
              <button data-open="doGooderModal" type="button" name="button" data-log-ga data-ga-category="email-button" data-ga-action="click" data-ga-label="Email" data-fb-event="CompleteAction" data-fb-event-name="Email" class="social active begin pointer email"><i></i> Email
              </button>

              <a href="https://ctt.ac/2ffE2" target="_blank" data-log-ga data-ga-category="tweet-mp-button" data-ga-action="click" data-ga-label="Tweet MP" data-fb-event="CompleteAction" data-fb-event-name="Tweet MP" data-link-out="https://ctt.ac/2ffE2">
                <button type="button" name="button" class="social active begin pointer twitter"><i></i>
                  Tweet
                </button>

              </a>
            </div>
          </div>

          <div class="small-12 medium-6 columns display-small-screens-only">
            <figure class="article-image">
              <img src="<?= get_featured_image_src() ?>" alt="<?php esc_attr_e($post->post_title); ?>" />
              <figcaption>
                Credit:
                <?= get_featured_image_caption() ?>
              </figcaption>
            </figure>
          </div>


          <div>
            <div class="story-paragraph">
              <div class="paragraph-heading"><?= $fields['story_heading'] ?></div>
              <?= $fields['story_content'] ?>
            </div>
            <div class="norfolk-paragraph">
              <div class="paragraph-heading"><?= $fields['norfolk_heading'] ?> </div>
              <?= $fields['norfolk_content'] ?>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="small-12 medium-6 columns display-large-screens-only">
      <figure class="article-image">
        <img src="<?= get_featured_image_src() ?>" alt="<?php esc_attr_e($post->post_title); ?>" />
        <figcaption>
          Credit:
          <?= get_featured_image_caption() ?>
        </figcaption>
      </figure>
    </div>
  </div>
</div>

<div class="bottom-buttons">
  <?php wp_reset_postdata(); ?>
  <button data-open="doGooderModal" type="button" name="button" data-log-ga data-ga-category="email-button" data-ga-action="click" data-ga-label="Email" data-fb-event="CompleteAction" data-fb-event-name="Email" class="social active begin pointer email"><i></i> Email
  </button>

  <a href="https://ctt.ac/2ffE2" target="_blank" data-log-ga data-ga-category="tweet-mp-button" data-ga-action="click" data-ga-label="Tweet MP" data-fb-event="CompleteAction" data-fb-event-name="Tweet MP" data-link-out="https://ctt.ac/2ffE2">
    <button type="button" name="button" class="social active begin pointer twitter"><i></i>
      Tweet
    </button>
  </a>
</div>

<div class="bottom-banner">
  <p class="banner-heading">Tell Liz Truss that Norfolk is against these devastating cuts.<p>
      <p class="banner-content">Let her know why you’re proud of Norfolk's contribution to UK aid and why you want it protected.</p>
      <div class="button-banner-container">
        <button data-open="doGooderModal" type="button" data-ga-label="Email" data-fb-event="CompleteAction" data-fb-event-name="Email" class="social active begin pointer email"><i></i> Email
        </button>
        <a href="https://ctt.ac/2ffE2" target="_blank" data-log-ga data-ga-category="tweet-mp-button" data-ga-action="click" data-ga-label="Tweet MP" data-fb-event="CompleteAction" data-fb-event-name="Tweet MP" data-link-out="https://ctt.ac/2ffE2">
          <button type="button" name="button" class="social active begin pointer twitter"><i></i>
            Tweet
          </button>
        </a>
      </div>
</div>

<!-- //Introduction -->