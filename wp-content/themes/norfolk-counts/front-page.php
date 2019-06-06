<?php the_post();
$fields = get_fields();
$stories = get_all_stories();
?>
<!-- STEPS CONTENT -->
<section class="steps-container">

  <!-- Step #0 -->
  <div class="step step-0">
    <div class="row">
      <div class="small-12 columns text-center">

        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-windmill.svg" alt="" class="img-house">
        <h1><?= get_bloginfo('name') ?></h1>
        <?php the_content(); ?>

        <a href="#"
        data-log-ga
        data-ga-category="find-out-button"
        data-ga-action="click"
        data-ga-label="Find out what"
        class="btn-action active uppercase begin" data-go-step="1"><?= $fields[
          'step_1_cta'
        ] ?></a>


      </div>
    </div>
  </div>
  <!-- Step #0 -->


  <!-- Step #1 -->
  <div class="step step-1">
    <div class="row">
      <div class="small-12 columns text-center">

        <span class="progress incomplete">Step 1/2</span>

        <h2><?= $fields['step_1']['step_1_question'] ?></h2>
        <p><?= $fields['step_1']['step_1_text'] ?></p>

        <a href="#" class="btn-action light" data-log-ga
        data-ga-category="live-in-norfolk-button"
        data-ga-action="click"
        data-ga-label="Yes - Lives in Norfolk"
        data-go-step="2">Yes</a>
        <a href="#" class="btn-action light" data-log-ga
        data-ga-category="not-in-norfolk-button"
        data-ga-action="click"
        data-ga-label="No - doesn't live in Norfolk"
        data-go-step="1-no">No</a>

      </div>
    </div>
  </div>
  <!-- Step #1 -->



  <!-- Step #1 -->
  <div class="step step-1-no">
    <div class="row">
      <div class="small-12 columns text-center">

        <span class="progress incomplete">Step 1/2</span>

        <h2><?= $fields['step_1']['no_answer_text'] ?></h2>
        <p><a href="<?= $fields['step_1']['no_answer_link'][
          'url'
        ] ?>" data-log-ga
        data-ga-category="metro-link"
        data-ga-action="click"
        data-ga-label="Clicked 'reasons to move'"
        data-link-out="<?= $fields['step_1']['no_answer_link']['url'] ?>"
          target="_blank"><?= $fields['step_1']['no_answer_link'][
            'title'
          ] ?></a><br />And, if you need yet another reason...</p>

        <a href="#" class="btn-action light large" data-log-ga
        data-ga-category="norfolk-is-proud"
        data-ga-action="click"
        data-ga-label="Clicked 'why norfolk is proud'"
        data-go-step="2"><?= $fields['step_1']['no_answer_cta'] ?></a>

      </div>
    </div>
  </div>
  <!-- Step #1 -->


  <!-- Step #2 -->
  <div class="step step-2">
    <div class="row">
      <div class="small-12 columns text-center">

        <span class="progress complete">Step 2/2</span>

        <h2><?= $fields['step_2']['step_2_main_text'] ?></h2>
        <p><?= $fields['step_2']['step_2_sub_text'] ?></p>

        <ul class="option-list">
          <?php foreach ($stories as $post): ?>
          <li><a href="#" data-log-ga
          data-ga-category="stories"
          data-ga-action="view"
          data-ga-label="<?= esc_attr($post->post_title) ?>"
          data-fb-event="ViewContent"
          data-fb-event-name="<?= esc_attr($post->post_title) ?>"
            class="btn-action" data-go-step="transition" data-first-story="<?= $post->ID ?>"><?= $post->post_title ?></a></li>
          <?php endforeach; ?>
        </ul>

      </div>
    </div>
  </div>
  <!-- Step #2 -->

</section>
<!-- STEPS CONTENT -->


<!-- TRANSITIONS LAYERS -->
<section class="transition-container">
  <div class="loading-message">
    <div class="row">
      <div class="small-12 columns text-center">

        <div class="rotator-icon"></div>
        <div class="messages">
          <?php foreach ($fields['preloader'] as $row): ?>
            <p><?= $row['loader_text'] ?></p>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- TRANSITIONS LAYERS -->



<!-- LANDING PAGE -->
<section class="landing">

  <!-- Carousel Nav -->
  <div class="navigation-slider">

    <a href="#" class="btn-arrow btn-prev"></a>

    <div id="slider-nav" class="bullet-slider">
    </div>

    <a href="#" class="btn-arrow btn-next"></a>

  </div>
  <!-- //Carousel Nav -->


  <!-- Slider -->
  <div class="landing-slider">
    <div class="row expanded collapse">
      <div class="small-12 columns">

        <div id="slider" class="header-slider">
        </div>

      </div>
    </div>
  </div>
  <!-- //Slider -->



  <!-- Slider -->
  <div class="landing-slider">
    <div class="row expanded collapse">
      <div class="small-12 columns">

        <div id="other-stories" class="header-slider">
        </div>

      </div>
    </div>
  </div>
  <!-- //Slider -->


</section>
<!-- LANDING PAGE -->
