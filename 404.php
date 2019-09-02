<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unifato
 */

get_header();
?>

  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <main id="main" class="main-content">

          <div class="text-center">
            <h3>404, Content not found</h3>
            <h6>It seems the content you're looking for doesn't exist.</h6>

            <footer>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-outline-white back-to-posts-btn">Back to home</a>
            </footer><!-- /.d-flex -->
          </div>

        </main><!-- /.main-content -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

<?php
get_footer();