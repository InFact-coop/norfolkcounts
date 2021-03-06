<?php require get_stylesheet_directory() .
  '/partials/global/mobile-menu.php'; ?>

<!-- HEADER -->
<header>
  <div class="row">
    <div class="small-12 columns">

      <a href="/" class="logo" data-log-ga
      data-ga-category="<?= is_page('action')
        ? "action-home"
        : "home" ?>"
      data-ga-action="click"
      data-ga-label="<?= is_page('action')
        ? "Direct to Tool"
        : "Restart tool" ?>"></a>

      <a href="<?= facebook_link() ?>" class="share" data-log-ga
      data-ga-category="<?= is_page('action')
        ? "action-"
        : "" ?>share-with-friends-button"
      data-ga-action="click"
      data-ga-label="Share with friends<?= is_page('action')
        ? " Action Page"
        : "" ?>"
      data-fb-event="<?= is_page('action') ? "TakeAction" : "CompleteAction" ?>"
      data-fb-event-name="Share with friends<?= is_page('action')
        ? " Action Page"
        : "" ?>"
      data-link-out="<?= facebook_link() ?>"></a>

    </div>
  </div>
</header>
<!-- //HEADER -->
