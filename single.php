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

  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col">
        <main id="main" class="main-content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="page-title">
            <h5 class="h5">
              <?php
                $alternate_title = get_post_meta( get_the_ID(), '__content_posts__alternate_title', true ); 
                if( $alternate_title !== '' ) {
                  echo $alternate_title;
                } else if( !in_category( 'Uncategorized' ) ) {
                  $categories_list = get_the_category_list(',');
                  if ( $categories_list ) {
                    echo $categories_list;
                  }
                } ?>
            </h5>
          </div>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php unifato_the_microdata( 'article' ); ?>>
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-7 zi-1">
                  <figure class="entry-thumbnail d-block d-sm-none" itemprop="image">
                    <?php
                      the_post_thumbnail( 'unifato-archive' );
                    ?>
                  </figure>

                  

                  <h1 class="entry-title h3" itemprop="headline">
                    <?php the_title() ?>
                  </h1>
                </div><!-- /.col -->
              </div>

              <div class="row d-none d-sm-flex">
                <div class="col-sm-8 ml-auto entry-thumbnail-side">
                  <figure class="entry-thumbnail" itemprop="image">
                    <?php
                      the_post_thumbnail( 'unifato-archive' );
                    ?>
                  </figure>
                </div><!-- /.col-sm-8 -->
              </div><!-- /.row -->

              <div class="row">
                <div class="col">
                  <div class="entry-content" itemprop="text">
                    <?php the_content() ?>
                  </div><!-- /.entry-content -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </article><!-- /.post -->
          <?php endwhile; 
          endif;?>

          <footer>
            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-outline-white back-to-posts-btn">
              Take me back
            </a>
            <?php 
            // Disabled this block
            if( 0 && !in_category( 'Uncategorized' ) ) {
              $categories = get_the_category();
              foreach($categories as $category) {
                switch($category->slug) {
                  case 'news':
                  case 'career':
                    ?>
                    <a href="<?php echo get_category_link( $category->cat_ID ); ?>" class="btn btn-outline-white back-to-posts-btn">
                      Back to <?php echo strtolower($category->slug); ?>
                    </a>
                    <?php
                    break;
                  case 'stories':
                    ?>
                    <a href="<?php echo get_category_link( $category->cat_ID ); ?>" class="btn btn-outline-white back-to-posts-btn">
                      Take me back
                    </a>
                    <?php
                    break;
                  default:
                    ?>
                    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="btn btn-outline-white back-to-posts-btn">
                      Take me back
                    </a>
                    <?php
                }
              }
            } ?>
          </footer><!-- /.d-flex -->

        </main><!-- /.main-content -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

<?php
get_footer();
