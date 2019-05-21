
<section class="section-action">

  <div class="row">

    <div class="small-12 columns">
      <h1>Leeds Needs You</h1>
    </div>

    <div class="small-12 medium-4 columns text-center action-highlight">
      <p>Leeds protected
      <span>475</span>
      girls from non-consensual marriages.</p>
    </div>
    <div class="small-12 medium-4 columns text-center action-highlight">
      <p>Leeds ensured
      <span>632</span>
      new mothers in Bangladesh receive proper maternal healthcare.</p>
    </div>
    <div class="small-12 medium-4 columns text-center action-highlight">
      <p>Leeds saved
      <span>48</span>
      children’s lives by funding critical vaccinations.</p>
    </div>

    <div class="small-12 columns text-center">
      <div class="block-content">
        <p>With their contribution to UK aid, Leeds has helped people all around the world. It’s essential this work is allowed to continue.</p>
        <p>Leeds counts and so do you. Make your voice heard and protect UK aid against its opponents.</p>
      </div>
    </div>

    <div class="small-12 columns text-center">
      <div class="row">

        <div class="small-6 medium-6 large-3 columns">
          <div class="action-box-image spread"></div>
          <a  href="<?=facebook_link();?>" class="button btn-social facebook" target="_blank"
            data-log-ga
            data-ga-category="action-fb-button"
            data-ga-action="click"
            data-ga-label="Facebook Share Action Page"
            data-fb-event="TakeAction"
            data-fb-event-name="Facebook"
            data-link-out="<?=facebook_link();?>">Spread The Word</a>
        </div>
        <div class="small-6 medium-6 large-3 columns">
          <div class="action-box-image pencil"></div>
          <a class="button" data-open="mpActionModal">Write To Your MP</a>
        </div>
        <div class="small-6 medium-6 large-3 columns">
          <div class="action-box-image conversation"></div>
          <?php
          $frontpage_id = get_option( 'page_on_front' );
          $download_url = get_field('download_the_posters', $frontpage_id);
          ?>
          <a href="<?= $download_url; ?>" class="button"
          data-log-ga
          data-ga-category="action-posters-button"
          data-ga-action="click"
          data-ga-label="Download Posters Action Page"
          data-fb-event="TakeAction"
          data-fb-event-name="Download Posters Action Page"
          data-link-out="<?= $download_url; ?>">Start a Conversation</a>
        </div>
        <div class="small-6 medium-6 large-3 columns">
          <div class="action-box-image group"></div>
          <a href="https://www.facebook.com/groups/350244305544216/" target="_blank" class="button"
          data-log-ga
          data-ga-category="action-fb-group-button"
          data-ga-action="click"
          data-ga-label="Facebook Group Action Page"
          data-fb-event="CompleteAction"
          data-fb-event-name="Facebook Group Action Page"
          data-link-out="https://www.facebook.com/groups/350244305544216/">
          Join a Local Group</a>
        </div>

      </div>
    </div>

    <div class="small-12 columns text-center">
      <p class="footer"><a data-open="aboutModal"
        data-log-ga
        data-ga-category="action-about-us-button"
        data-ga-action="click"
        data-ga-label="About us Action Page">About us</a> / <a data-open="impactModal"
        data-log-ga
        data-ga-category="action-impact-button"
        data-ga-action="click"
        data-ga-label="How we know Leeds' impact Action Page">How we know Leeds’ impact?</a></p>
    </div>

  </div>

</section>




<div class="reveal" id="mpActionModal" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">
  <a class="close-button" data-close>Close</a>

    <h1>What should you tell them?</h1>
    <p>• You are proud of Leeds' contribution to international development.<br>
       • You support the government spending 0.7% or more of GNI on international aid.<br>
       • Your MP's decision to support international aid could influence your vote in the next election</p>

    <div class="text-center">
      <a href="https://www.writetothem.com/?gclid=EAIaIQobChMIl_jxgvGe3gIVg7TtCh1icQc9EAAYASAAEgKjQPD_BwE"
        class="button"
        target="_blank"
        data-log-ga
        data-ga-category="action-email-mp-button"
        data-ga-action="click"
        data-ga-label="Email MP Action Page"
        data-fb-event="TakeAction"
        data-fb-event-name="Email MP Action Page"
        data-link-out="https://www.writetothem.com/?gclid=EAIaIQobChMIl_jxgvGe3gIVg7TtCh1icQc9EAAYASAAEgKjQPD_BwE">Write To Your MP</a>&nbsp;&nbsp;
      <a class="button" data-close>Close Window</a>
    </div>
</div>
