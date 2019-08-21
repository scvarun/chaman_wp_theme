<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Unifato
 */

get_header();
?>

  <div class="container-fluid">
    <div class="row">
      <main id="main" class="main-content">

      <?php 
      if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php unifato_the_microdata( 'article' ); ?>>
          <div class="container-fluid">
            <div class="row no-gutters">
              <?php if( has_post_thumbnail() ) : ?>
                <div class="col entry-thumbnail-side" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'unifato-archive'); ?>);">
                  <a href="<?php the_permalink() ?>" class="pos-0 opacity-0"></a>
                </div><!-- /.col -->
              <?php endif; ?>

              <main class="col-md-7">
                <?php if( has_post_thumbnail() ) : ?>
                  <figure class="d-block d-md-none entry-thumbnail">
                    <?php
                      the_post_thumbnail( 'full' );
                    ?>
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                  </figure>
                <?php endif; ?>

                <div class="post-content">
                  <h5 class="entry-title" itemprop="headline">
                    <a href="<?php the_permalink() ?>" rel="bookmark" itemprop="url"><?php the_title() ?></a>
                  </h5>

                  <div class="entry-content" itemprop="text">
                    <?php 
                      if ( has_excerpt() ) {
                        the_excerpt();
                      } else {
                        the_content( "" );
                      }
                    ?>
                  </div><!-- /.entry-content -->

                  <footer class="entry-footer">
                    <p>
                      <a href="<?php the_permalink() ?>" class="read-more-link">Read more</a>
                    </p>
                  </footer>

                </div><!-- /.post-content -->

              </main><!-- /.col-md-6 -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </article><!-- /.post -->
        <?php 
        endwhile;
        unifato_paging_nav();
      else :
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>

      </main><!-- /.main-content -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

<?php
get_footer();