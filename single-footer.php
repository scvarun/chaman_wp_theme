<?php

if(!is_user_logged_in()) {
  wp_redirect(get_site_url());
}

get_header();
?>

  </div><!-- /.content-wrapper -->
  <?php the_content(); ?>
</div><!-- /.wrapper -->

<?php
get_footer('for-footer-single');
