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
        <?php if(\Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID())): ?>

          <?php
            // Show page title 
            if(get_post_meta(get_the_ID(), '__content__page-title-hidden', 1) !== 'yes'): 
          ?>
            <?php $color = get_post_meta(get_the_ID(), '__content__page-title-color', 1); ?>
            <div 
              class="page-title" 
              itemprop="headline" 
              <?php if($color) echo 'style="color: '. $color .';"'; ?> >
              <h1 class="h5 entry-title"><?php the_title(); ?></h1>
            </div>
          <?php endif; ?>
          <?php the_content( "" ); ?>
        <?php else: ?>
          <div class="container-fluid">
            <div class="row">
              <main class="col">
                <?php if( has_post_thumbnail() ): ?>
                <figure class="entry-thumbnail d-block d-sm-none" itemprop="image">
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
              <div class="col entry-thumbnail-side d-none d-sm-flex" itemprop="image">
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