<?php
/*
*
*
* Expects $post to be a WP post object
# Expects $download_url to be the URL of the 'posters' CTA
*
*/
global $post;
setup_postdata($post);
$fields = get_fields($post->ID);
?>

<!-- Slide -->
<div class="slide story-<?= $post->ID ?>" data-story-id="<?= $post->ID ?>" >

  <!-- Slide Header -->
  <div class="slide-article-header">

    <?php render_partial('article-intro', array("post" => $post)); ?>

  </div>
  <!-- //Slide Header -->


  <!-- Article Content -->
  <div class="slide-article-content">

    <div class="row" data-fade-in-up data-fadein>
      <div class="small-12 columns">

        <div class="lead-counter">
          <?= $fields['stats_section'] ?>
        </div>

        <div class="highlighted">
          <?= $fields['highlight_section'] ?>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 large-centered columns">

        <div class="share-container">
          <h2 data-fade-in-up data-fadein><?= $fields['cta'] ?></h2>

          <!-- STEP #1 -->
          <div class="help-box" data-fade-in-up data-fadein>
            <i class="icon print"></i>
            <span class="headline">Spread The Word</span>
            <p>Help your friends and family discover the ways that Norfolk is making a difference across the world</p>

            <div class="share-buttons">
              <?php wp_reset_postdata(); ?>
              <a href="<?= facebook_link() ?>" class="btn-social facebook" target="_blank" data-log-ga
              data-ga-category="facebook-button"
              data-ga-action="click"
              data-ga-label="Facebook"
              data-fb-event="CompleteAction"
              data-fb-event-name="Facebook"
              data-link-out="<?= facebook_link() ?>"><i></i> Facebook</a>

              <a href="<?= twitter_link() ?>" class="btn-social twitter" target="_blank" data-log-ga
              data-ga-category="twitter-button"
              data-ga-action="click"
              data-ga-label="Twitter"
              data-fb-event="CompleteAction"
              data-fb-event-name="Twitter"
              data-link-out="<?= twitter_link() ?>"><i></i> Twitter</a>

              <a href="<?= mailto_link() ?>" class="btn-social email" data-log-ga
              data-ga-category="email-button"
              data-ga-action="click"
              data-ga-label="Email"
              data-fb-event="CompleteAction"
              data-fb-event-name="Email"
              data-link-out="<?= mailto_link() ?>"><i></i> Email</a>
            </div>
          </div>
          <!-- STEP #1 -->


          <!-- STEP #2 -->
          <div class="help-box" data-fade-in-up data-fadein>
            <i class="icon pencil"></i>
            <span class="headline">Write To Your MP</span>
            <p>Let them know why you’re proud of Norfolk’s contribution to UK aid and why you want it protected. <a data-open="mpModal">Read here what you should tell them.</a></p>

            <div class="share-buttons text-left">
              <a href="https://www.writetothem.com/?gclid=EAIaIQobChMIl_jxgvGe3gIVg7TtCh1icQc9EAAYASAAEgKjQPD_BwE" class="btn-action" target="_blank" data-log-ga
              data-ga-category="email-mp-button"
              data-ga-action="click"
              data-ga-label="Email MP"
              data-fb-event="CompleteAction"
              data-fb-event-name="Email MP"
              data-link-out="https://www.writetothem.com/?gclid=EAIaIQobChMIl_jxgvGe3gIVg7TtCh1icQc9EAAYASAAEgKjQPD_BwE">Email your MP</a>
              <a href="https://ctt.ac/Scem8" class="btn-action" target="_blank" data-log-ga
              data-ga-category="tweet-mp-button"
              data-ga-action="click"
              data-ga-label="Tweet MP"
              data-fb-event="CompleteAction"
              data-fb-event-name="Tweet MP"
              data-link-out="https://ctt.ac/Scem8">Tweet your MP</a>
            </div>
          </div>
          <!-- STEP #2 -->


          <!-- STEP #3 -->
          <div class="help-box" data-fade-in-up data-fadein>
            <i class="icon conversation"></i>
            <span class="headline">Start a Conversation</span>
            <p>Download these Norfolk Counts posters to start conversations in your school, workplace or community</p>

            <div class="share-buttons text-left">
              <a href="<?= $download_url ?>" class="btn-action" data-log-ga
              data-ga-category="posters-button"
              data-ga-action="click"
              data-ga-label="Download posters"
              data-fb-event="CompleteAction"
              data-fb-event-name="Download posters"
              data-link-out="<?= $download_url ?>">Download the posters</a>
            </div>
          </div>
          <!-- STEP #3 -->


          <!-- STEP #4 -->
          <div class="help-box" data-fade-in-up data-fadein>
            <i class="icon group"></i>
            <span class="headline">Join A Local Group</span>
            <p>Join other like-minded folks in Norfolk who want to stand up for impact of UK aid</p>

            <div class="share-buttons text-left">
              <a href="https://www.facebook.com/groups/350244305544216/" class="btn-action" target="_blank" data-log-ga
              data-ga-category="fb-group-button"
              data-ga-action="click"
              data-ga-label="Join a local group"
              data-fb-event="CompleteAction"
              data-fb-event-name="Join a local group"
              data-link-out="https://www.facebook.com/groups/350244305544216/">Explore your local group</a>
            </div>
          </div>
          <!-- STEP #4 -->

          <div class="static-links" data-fade-in-up data-fadein>
            <a data-open="aboutModal" data-log-ga
            data-ga-category="about-us-button"
            data-ga-action="click"
            data-ga-label="About us">About us</a> /
            <a data-open="impactModal" data-log-ga
            data-ga-category="impact-button"
            data-ga-action="click"
            data-ga-label="How we know Norfolk's impact">How we know Norfolk’s impact?</a>
          </div>

        </div>

      </div>
    </div>

  </div>
  <!-- //Article Content -->

</div>
<!-- //Slide -->
