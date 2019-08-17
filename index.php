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

        <article class="post type-post has-post-thumbnail category-news" itemtype="https://schema.org/CreativeWork" itemscope>
          <div class="container-fluid p-0">
            <div class="row no-gutters">
              <div class="col entry-thumbnail-side" style="background-image: url(assets/demo/home/posts/post-1.jpg);">
                <a href="page-single-news.php" class="pos-0 opacity-0"></a>
              </div><!-- /.col -->

              <main class="col-lg-6">
                <figure class="d-block d-lg-none entry-thumbnail">
                  <img src="assets/demo/home/posts/post-1.jpg" alt="" />
                  <a href="page-single-news.php">This is a new story</a>
                </figure>

                <div class="post-content">
                  <h4 class="entry-title" itemprop="headline">
                    <a href="page-single-news.php" rel="bookmark" itemprop="url">This is a new story</a>
                  </h4>

                  <div class="entry-content" itemprop="text">
                    <p>For each student, we identify and nurture their potential to grow into someone who will make a difference in India and the world.</p>
                    <p>Through engaging learning experiences their leadership — skills will be developed and they will emerge as confident individuals with high self-esteem. In our leadership academy, we will invite role models from different sections of society to inspire students to develop their leadership skills.</p>
                  </div><!-- /.entry-content -->

                  <footer class="entry-footer">
                    <a href="page-single-news.php" class="btn btn-link read-more-link">Read more</a>
                  </footer>
                </div><!-- /.post-content -->
              </main><!-- /.col-md-6 -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </article><!-- /.post -->

      </main><!-- /.main-content -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

<?php
get_footer();