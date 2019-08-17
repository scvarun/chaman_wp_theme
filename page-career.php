<?php
include_once 'lib/init.php';
include_once 'lib/functions.php';

$config = array(
  'title' => 'Stories | Chaman Bharatiya',
  'body_class' => $GLOBALS['body_class'] . ' header-overlay blog',
);

get_header($config);
?>

<div class="content-wrapper">

  <section>
    <div class="container-fluid d-none d-lg-block" style="padding: 0; margin-bottom: -35%;">
      <div class="row no-gutters justify-content-end">
        <div class="col-lg-7" style="z-index: 0">
          <figure>
            <img src="assets/demo/careers/people.jpg" alt="" />
          </figure>
        </div><!-- /.col-lg-7 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7" style="z-index: 1">
          <h6 style="margin-bottom: 12.805%; text-transform: uppercase; color: #20234c">Join Us</h6>
          <h2 style="color: #20234c">Do you wish to join a progressive team of leadership</h2>
        </div><!-- /.col-lg-7 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  <section>

  <section style="padding-top: 12.03%;">
    <div class="container-fluid">
      <div class="row justify-content-end">
        <div class="col-lg-6">
          <h6 style="color: #20234c; text-transform: uppercase; margin-bottom: 20px;">Working at Chaman Bhartiya</h6>
          <p style="color: #20234c; font-size: 30px; line-height: 40px">Suspendisse potenti. Proin at lectus condimentum, aliquam justo ac, suscipit urna. Proin at ligula porta lacus tempus ullamcorper. Nunc lacus neque, tempor vitae risus eget, porta fringilla nibh.</p>
        </div><!-- /.col-lg-7 -->

        <div class="col-lg-1">
        </div><!-- /.col-lg-1 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section style="padding-top: 150px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7">
          <h2 style="color: #20234c">We are currently looking for...</h2>
        </div><!-- /.col-lg-7 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section style="padding-top: 190px">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7" style="color: #20234c;">
          <div class="job-listings">
            <article class="post category-job-listing">
              <h4>Communication Manager (closes Sep 2020)</h4>
              <p><a href="page-job-listings.png">Read More</a></p>
            </article>
            <article class="post category-job-listing">
              <h4>HR supervisor (closes Sep 2020)</h4>
              <p><a href="page-job-listings.png">Read More</a></p>
            </article>
            <article class="post category-job-listing">
              <h4>Event representative (closes Sep 2020)</h4>
              <p><a href="page-job-listings.png">Read More</a></p>
            </article>
            <article class="post category-job-listing">
              <h4>Communication Manager (closes Sep 2020)</h4>
              <p><a href="page-job-listings.png">Read More</a></p>
            </article>
            <article class="post category-job-listing">
              <h4>HR supervisor (closes Sep 2020)</h4>
              <p><a href="page-job-listings.png">Read More</a></p>
            </article>
            <article class="post category-job-listing">
              <h4>Event representative (closes Sep 2020)</h4>
              <p><a href="page-job-listings.png">Read More</a></p>
            </article>
          </div><!-- /.job-listings -->
        </div><!-- /.col-lg-7 -->
        <div class="col-lg-5">
          <p style="color: #20234c;">For unsolicated applications, please send an email to careers@chamanbhartiya.com</p>
        </div><!-- /.col-lg-5 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

</div>

<?php get_footer();