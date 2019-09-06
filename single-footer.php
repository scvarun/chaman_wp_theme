<?php

if(!is_user_logged_in()) {
  wp_redirect(get_site_url());
}

get_header('for-footer-single');
?>

    <div style="height: 50vh"></div>

  </div><!-- /.content-wrapper -->
  <?php the_content('none'); ?>
</div><!-- /.wrapper -->

<?php
get_footer('for-footer-single');
