<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

  <?php get_template_part('partials/global/head'); ?>

  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', '3tone'); ?>
      </div>
    <![endif]-->



    <main id="content">
      <div id="barba-wrapper">
        <div class="barba-container">

          <?php if(WP_ENV !== 'production'){ ?><!-- template_path: <?= Wrapper\template_path(); ?> --><?php } ?>

          <?php
          get_template_part('partials/global/header');

           include Wrapper\template_path();

          // do_action('get_footer');
          get_template_part('partials/global/footer');
          ?>

        </div> <!-- / .barba-container -->
      </div> <!-- / #barba-wrapper -->
    </main> <!-- / #content -->


    <?php wp_footer(); ?>
  </body>
</html>
