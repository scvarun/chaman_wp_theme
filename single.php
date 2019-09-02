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
            <div class="row">
              <div class="col entry-thumbnail-side d-none d-sm-flex">
                <figure class="entry-thumbnail">
                  <?php
                    the_post_thumbnail( 'unifato-archive' );
                  ?>
                </figure>
              </div><!-- /.col -->

              <main class="col-sm-6">
                <figure class="entry-thumbnail d-block d-sm-none">
                  <?php
                    the_post_thumbnail( 'unifato-archive' );
                  ?>
                </figure>

                <?php 
                if( !in_category( 'Uncategorized' ) ) {
                  $categories_list = get_the_category_list();
                  if ( $categories_list ) {
                    echo '<ul class="post-categories h6">' . $categories_list . '</ul>';
                  }
                } ?>

                <h1 class="entry-title h3" itemprop="headline">
                  <?php the_title() ?>
                </h1>

                <div class="entry-content" itemprop="text">
                  <?php the_content() ?>      
                </div><!-- /.entry-content -->

              </main><!-- /.col-sm-6 -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </article><!-- /.post -->
        <?php endwhile; 
        endif;?>

        <footer>
          <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-outline-white back-to-posts-btn">Back to stories</a>
        </footer><!-- /.d-flex -->

      </main><!-- /.main-content -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

<?php
get_footer();