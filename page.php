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

  <?php
    /* Start the Loop */
    while ( have_posts() ) : the_post();
    ?>
      
      <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if (\Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID())): ?>
          <?php the_content( "" ); ?>
        <?php else: ?>
          <div class="container-fluid">
            <div class="row">
              <main class="col">
                <?php if( has_post_thumbnail() ): ?>
                <figure class="entry-thumbnail d-block d-sm-none">
                  <?php
                  the_post_thumbnail( 'unifato-archive' );
                  ?>
                </figure>
                <?php endif; ?>

                <h1 class="entry-title h3" itemprop="headline">
                  <?php the_title() ?>
                </h1>

                <div class="entry-content" itemprop="text">
                  <?php the_content() ?>      
                </div><!-- /.entry-content -->

              </main><!-- /.col -->

              <?php if( has_post_thumbnail() ): ?>
              <div class="col entry-thumbnail-side d-none d-sm-flex">
                <figure class="entry-thumbnail">
                  <?php
                  the_post_thumbnail( 'unifato-archive' );
                  ?>
                </figure>
              </div><!-- /.col -->
              <?php endif; ?>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        <?php endif; ?>
      </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile;
  ?>

<?php
get_footer();