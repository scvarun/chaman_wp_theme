<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unifato
 */

?>
	</div><!-- /.content-wrapper -->

  <?php
    /**
     * unifato_main_footer hook.
     *
     * @since 1.0.0
     */
    do_action( 'unifato_main_footer' );
  ?>
  </div><!-- /#scroll-wrapper -->
</div><!-- /.wrapper -->

<?php wp_footer(); ?>
</body>
</html>
