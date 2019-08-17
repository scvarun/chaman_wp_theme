<?php
include_once 'lib/init.php';
include_once 'lib/functions.php';

$config = array(
  'title' => 'Stories | Chaman Bharatiya',
  'body_class' => $GLOBALS['body_class'] . ' header-overlay single single-post category-leadership-philosphy',
);

get_header($config);
?>

<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <main id="main" class="main-content">

        <article class="post type-post has-post-thumbnail category-leadership-philosphy" itemtype="https://schema.org/CreativeWork" itemscope>
          <div class="container-fluid">
            <div class="row">
              <div class="col entry-thumbnail-side d-none d-lg-flex">
                <figure class="entry-thumbnail">
                  <img src="assets/demo/home/posts/post-3.jpg" alt="" />
                </figure>
              </div><!-- /.col -->

              <main class="col-lg-6">
                <figure class="entry-thumbnail d-block d-lg-none">
                  <img src="assets/demo/home/posts/post-3.jpg" alt="" />
                </figure>

                <ul class="post-categories">
                  <li><a href="#" rel="category tag">Leadership Philosophy</a></li>
                </ul>

                <h1 class="entry-title h2" itemprop="headline">
                  This is a random story
                </h1>

                <div class="entry-content" itemprop="text">
                  <p>At Chaman Bhartiya School, Leadership is a broad and deep concept. It is a quality, a principal value that a human being actively and deliberately cultivates to lead a meaningful and purpose-filled life.</p>

                  <h5>Sub Heading</h5>
                  <p>It is about enhancing one’s own personal ability to give direction to one’s own life on a meaningful path. We have zoned in on these 5 major elements that contribute towards realizing the leadership potential in each child.</p>

                  <h5>Sub Heading</h5>
                  <p>It is about enhancing one’s own personal ability to give direction to one’s own life on a meaningful path. We have zoned in on these 5 major elements that contribute towards realizing the leadership potential in each child.</p>

                  <h5>Sub Heading</h5>
                  <p>It is about enhancing one’s own personal ability to give direction to one’s own life on a meaningful path. We have zoned in on these 5 major elements that contribute towards realizing the leadership potential in each child.</p>

                  <ol class="large-list h4">
                    <li>List, list. Connections between different subjects</li>
                    <li>Deep learning and subject mastery Match the learner’s profile readiness & interest</li>
                    <li>In-depth understanding of the relevance and application of the subject</li>
                    <li>We empower learners to be self-directed individuals and emerge as changemakers</li>
                  </ol>           
                </div><!-- /.entry-content -->

              </main><!-- /.col-md-6 -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </article><!-- /.post -->

        <footer>
          <a href="page-stories.php" class="btn btn-outline-white back-to-posts-btn">Take me back</a>
        </footer><!-- /.d-flex -->

      </main><!-- /.main-content -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

  
</div>

<?php get_footer();