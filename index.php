<?php
include_once 'lib/init.php';
include_once 'lib/functions.php';

$config = array(
  'title' => 'Home | Chaman Bharatiya',
);

get_header($config);
?>

<div class="content-wrapper">
  <section id="home__hero" class="d-flex align-items-stretch" style="background: url('assets/demo/home/hero.jpg'); background-size: cover; min-height: 100vh;">
    <div class="container-fluid flex-1">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-center" style="height: 400px;">
          <figure style="height: 100vh; max-height: 400px; margin-bottom: 0">
            <svg style="height: 400px" id="CHAMAN_LOGO_SVG" xmlns="http://www.w3.org/2000/svg" width="1536" height="854.312" viewBox="0 0 1536 854.312">
              <g id="Group_8" data-name="Group 8" transform="translate(-120.001 -41.796)">
                <g id="Group_9" data-name="Group 9" transform="translate(120.001 41.796)">
                  <rect id="Rectangle_17" data-name="Rectangle 17" width="255.187" height="838.285" transform="translate(866.603 9.865)" fill="#eda297"/>
                  <path id="Path_1" data-name="Path 1" d="M142.642,368.514a450.382,450.382,0,0,1,51.16-123.89A401.451,401.451,0,0,1,279.478,144.15q51.162-43.143,121.429-65.337V929.426q-70.266-22.189-121.429-65.337A401.4,401.4,0,0,1,193.8,763.619a450.446,450.446,0,0,1-51.16-123.895,560.835,560.835,0,0,1,0-271.21" transform="translate(-126.001 -75.114)" fill="#ec633c"/>
                  <path id="Path_2" data-name="Path 2" d="M876.21,318.272a182.143,182.143,0,0,1-36.985,55.472,167.779,167.779,0,0,1-55.477,37.6,172.224,172.224,0,0,1-67.8,13.56q-36.986,0-69.035-13.56a174.751,174.751,0,0,1-56.092-37.6,176.684,176.684,0,0,1-37.6-55.472,167.812,167.812,0,0,1-13.561-67.187q0-36.984,13.561-69.035a174.36,174.36,0,0,1,93.691-93.69Q678.963,74.8,715.949,74.8a172.228,172.228,0,0,1,67.8,13.564,167.791,167.791,0,0,1,55.477,37.6A180.068,180.068,0,0,1,876.21,182.05q13.56,32.052,13.56,69.035a167.812,167.812,0,0,1-13.56,67.187" transform="translate(-158.737 -74.796)" fill="#755c4e"/>
                  <path id="Path_3" data-name="Path 3" d="M1755.833,355.995q-16.028,36.37-48.7,64.106t-80.747,44.993q-48.076,17.261-112.183,17.259V84.167q64.106,0,112.183,17.259t80.747,45q32.669,27.736,48.7,63.488t16.025,72.735q0,36.979-16.025,73.349" transform="translate(-235.858 -75.538)" fill="#ec633c"/>
                  <path id="Path_4" data-name="Path 4" d="M876.21,318.272a182.143,182.143,0,0,1-36.985,55.472,167.779,167.779,0,0,1-55.477,37.6,172.224,172.224,0,0,1-67.8,13.56q-36.986,0-69.035-13.56a174.751,174.751,0,0,1-56.092-37.6,176.684,176.684,0,0,1-37.6-55.472,167.812,167.812,0,0,1-13.561-67.187q0-36.984,13.561-69.035a174.36,174.36,0,0,1,93.691-93.69Q678.963,74.8,715.949,74.8a172.228,172.228,0,0,1,67.8,13.564,167.791,167.791,0,0,1,55.477,37.6A180.068,180.068,0,0,1,876.21,182.05q13.56,32.052,13.56,69.035a167.812,167.812,0,0,1-13.56,67.187" transform="translate(-158.736 423.056)" fill="#eda297"/>
                  <path id="Path_5" data-name="Path 5" d="M1755.833,355.995q-16.028,36.37-48.7,64.106t-80.747,44.993q-48.076,17.261-112.183,17.259V84.167q64.106,0,112.183,17.259t80.747,45q32.669,27.736,48.7,63.488t16.025,72.735q0,36.979-16.025,73.349" transform="translate(-235.858 365.776)" fill="#755c4e"/>
                </g>
              </g>
            </svg>
          </figure>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section><!-- #home__hero -->

  <section id="home__about" style="padding: 80px 0;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4">
          <h6>Chaman Bhartiya is a private primary school in Bhartiya City in Bengaluru, India. We open in autumn 2020 - <a href="page-admissions.php">admissions</a> open now!</h6>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section  id="home__skull-parallax">
    <div class="container-fluid">
      <div class="row justify-content-end">
        <div class="col-lg-7" style="z-index: 10;">
          <h2>&quot;We teach children how to think not what to think&quot;</h2>
        </div><!-- /.col-lg-7 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section  id="home__skull" style="margin-top: -175px;">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-7">
          <figure>
            <img src="assets/demo/home/skeleton.jpg" alt="" />
          </figure>
        </div><!-- /.col-lg-7 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section id="home__philosophy" style="padding: 50px 0 6.8%">
    <div class="container-fluid">
      <div class="row justify-content-end">
        <div class="col-lg-7">
          <p style="margin-bottom: 80px; font-size: 30px; line-height: 40px; font-weight: 500;">At Chaman Bhartiya School, Leadership is a broad and deep concept. It is  a quality, a principal value that a huuman being actively and deliberately cultivates to lead a meaningful and purpose-filled life.</p>

          <h6 class="text-uppercase" style="margin-bottom: 20px">It's all in the Philosophy</h6>
          <p style="font-size: 30px; line-height: 40px; font-weight: 500;">It is about enhancing one's own personal ability to give direction to one's own life on a meaningful path. We have zoned in on these 5 major elements that contribute towards realizing the leadership potential in each child.</p>
        </div><!-- /.col-md-7 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section id="home__leadership" style="padding-bottom: 9.415%">
    <div class="container-fluid" style="padding: 0">
      <div class="row no-gutters">
        <div class="col-lg-6" style="margin: 0 5.2305%;">
          <figure class="d-block d-lg-none mb-0">
            <img src="assets/demo/home/bubble.jpg" alt="" />
          </figure>
          <div style="background: #ed633c; padding: 70px 7.35% 80px;">
            <h4 style="color: #e5e5e5; margin-bottom: 25px;">Leadership</h4>
            <p style="color: #e5e5e5;">For each student, we identify and nurture their potential to grow into someone who will make a difference in India and the world.</p>
            <p style="color: #e5e5e5; margin-bottom: 55px">Through engaging learning experiences their leadership - skills will be developed and they will emerge as confident individuals with high self-esteem. In our deadership academy, we will invite role models from different sections of society to inspire students to develop thier leadership skills.</p>
            <a href="#" class="btn btn-link" style="color: #e5e5e5; font-weight: bold; text-decoration: underline;">Read more about leadership</a>
          </div>
        </div><!-- /.col-md-7 -->

        <div class="col" style="padding: 0; background-image: url(assets/demo/home/bubble.jpg); background-repeat: no-repeat; background-size: cover;">
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section id="home__leadership" style="padding-bottom: 9.415%">
    <div class="container-fluid" style="padding: 0">
      <div class="row no-gutters">
        <div class="col" style="padding: 0; background-image: url(assets/demo/home/woman.jpg); background-repeat: no-repeat; background-size: cover;">
        </div><!-- /.col -->

        <div class="col-lg-6" style="margin: 0 5.2305%;">
          <figure class="d-block d-lg-none mb-0">
            <img src="assets/demo/home/woman.jpg" alt="" />
          </figure>
          <div style="background: #20234c; padding: 70px 7.35% 80px;">
            <h4 style="color: #e5e5e5; margin-bottom: 25px;">Teachers as facilitators</h4>
            <p style="color: #e5e5e5">Duis ut tellus aliquam augue dapibus interdum eget iaculis eros. Nam sed tincidunt lectus, eget porta enim. Sed vehicula port lacinia. Nam quis purus dapibus quam venenatis pellentesque sit amet at mauris.</p>
            <p style="color: #e5e5e5; margin-bottom: 55px">In a rhoncus enim. Nulla purus nisi, posuere ac felis id, dapibus consectetur velit. Donec erat mauris, hendrerit vitae pulvinar sit amet, viverra id enim. Pelletesque habitant morbi tristique senectus et netus et malesuada.</p>
            <a href="#" class="btn btn-link text-white" style="color: #e5e5e5; font-weight: bold; text-decoration: underline;">Discover our Team</a>
          </div>
        </div><!-- /.col-md-6 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section id="home__latest-news" style="background: #765c4f; padding-top: 120px; padding-bottom: 130px">
    <div class="container-fluid" style="margin-bottom: 50px">
      <div class="row">
        <div class="col-lg-7">
          <h6 class="text-uppercase" style="color: #e5e5e5; margin-bottom: 20px">Latest News</h6>
          <h2 style="color: #e5e5e5; margin-bottom: 50px">What's happening</h2>
        </div><!-- /.col-lg-7 -->
        <div class="col-lg-5 d-block d-lg-flex justify-content-end align-items-center">
          <a href="#blogpost-thumbs-1" class="slider-arrow-next">
            <img src="assets/demo/home/slider-arrow.png" alt="" />
          </a>
        </div><!-- /.col-lg-5 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div id="blogpost-thumbs-1" class="blogpost-thumbs row text-white">
            <?php for($i=1; $i<=3; $i++): ?>
            <div class="col-lg-4">
              <article id="post-1" class="post has-post-thumbnail">
                <figure class="entry-thumbnail">
                  <img src="assets/demo/home/posts/post-1.jpg" alt="Skills for the 21st century" />
                  <a href="page-single-blog.php" class="">Skills for the 21st century</a>
                </figure>
                <div class="entry-content">
                  <h5 class="entry-title h4">
                    <a href="page-single-blog.php">Skills of the 21st Century</a>
                  </h5>
                  <p>Suspendisse potenti. Proin at lectus condimentum, aliquam justo ac, suscipit urna. Proin at ligula porta lacus tempus ullamcorper. Nunc lacus neque, temper vitae risus eget, porta fringilla nibh.</p>
                </div>
              </article>
            </div><!-- /.col-lg-4 -->

            <div class="col-lg-4">
              <article id="post-2" class="post has-post-thumbnail">
                <figure class="entry-thumbnail">
                  <img src="assets/demo/home/posts/post-2.jpg" alt="Skills for the 21st century" />
                  <a href="page-single-blog.php" class="">Leadership Pedagogy</a>
                </figure>
                <div class="entry-content">
                  <h5 class="entry-title h4">
                    <a href="page-single-blog.php">Leadership Pedagogy</a>
                  </h5>
                  <p>Suspendisse potenti. Proin at lectus condimentum, aliquam justo ac, suscipit urna. Proin at ligula porta lacus tempus ullamcorper. Nunc lacus neque, temper vitae risus eget, porta fringilla nibh.</p>
                </div>
              </article>
            </div><!-- /.col-lg-4 -->

            <div class="col-lg-4">
              <article id="post-3" class="post has-post-thumbnail">
                <figure class="entry-thumbnail">
                  <img src="assets/demo/home/posts/post-3.jpg" alt="New Teachers" />
                  <a href="page-single-blog.php" class="">New Teachers</a>
                </figure>
                <div class="entry-content">
                  <h5 class="entry-title h4">
                    <a href="page-single-blog.php">New Teachers</a>
                  </h5>
                  <p>Suspendisse potenti. Proin at lectus condimentum, aliquam justo ac, suscipit urna. Proin at ligula porta lacus tempus ullamcorper. Nunc lacus neque, temper vitae risus eget, porta fringilla nibh.</p>
                </div>
              </article>
            </div><!-- /.col-lg-4 -->
            <?php endfor; ?>
          </div><!-- /.blogpost-thumbs -->
        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row">
        <div class="col d-flex justify-content-center">
          <a href="page-stories.php" class="btn btn-outline-white" style="font-weight: 500; border-radius: 0; border-width: 3px; padding: 20px 8.5134%; font-size: 30px">See more stories...</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section id="home__testimonials" style="background: #eca297; padding: 110px 0 150px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h6 class="text-uppercase" style="margin-bottom: 20px">What people say</h6>
          <blockquote class="row testimonial" style="margin-bottom: 8.279%">
            <div class="col-lg-7">
              <h3 class="testimonial-title">"I love starting my day with a history class, it's the best"</h3>
              <h6 class="testimonial-user-info">
                <span class="testimonial-user-name">Sofia</span> --
                <span class="testimonial-user-title">Year 5 Student</span>
              </h6>
              <p>Suspendisse potenti. Proin at lectus condimentum, aliquam justo ac, suscipit urna. Proin at ligula porta lacus tempus ullamcorper. Nunc lacus neque, tempor vitae risus eget, porta frigilla nibh.</p>
            </div><!-- /.col-lg-7 -->

            <div class="col-lg-5">
              <figure>
                <img src="assets/demo/home/testimonial-1.jpg" alt="Sofia - Year 5 Student" />
              </figure>
            </div><!-- /.col-lg-5 -->
          </blockquote><!-- /.testimonial -->

          <blockquote class="row testimonial testimonial-right">
            <div class="col-lg-7">
              <h3 class="testimonial-title">"What I love about my job is triggering curiosity"</h3>
              <h6 class="testimonial-user-info">
                <span class="testimonial-user-name">Albert White</span> --
                <span class="testimonial-user-title">Music Teacher</span>
              </h6>
              <p>Suspendisse potenti. Proin at lectus condimentum, aliquam justo ac, suscipit urna. Proin at ligula porta lacus tempus ullamcorper. Nunc lacus neque, tempor vitae risus eget, porta frigilla nibh.</p>
            </div><!-- /.col-lg-7 -->

            <div class="col-lg-5">
              <figure>
                <img src="assets/demo/home/testimonial-2.jpg" alt=">Albert White - Music Teacher" />
              </figure>
            </div><!-- /.col-lg-5 -->
          </blockquote><!-- /.testimonial -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section id="home__admissions" style="background: #ed633c; padding-top: 120px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h6 class="text-uppercase" style="margin-bottom: 20px; color: #e5e5e5">Become a leader</h6>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row justify-content-center">
        <div class="col-lg-8 d-flex flex-column align-items-center justify-content-center">
          <h2 style="z-index: 10; text-align: center; color: #e5e5e5; margin-top: 10.216%; margin-bottom: 17.027%; font-size: 125px; line-height: .85">Admissions for 2020 are now open!</h2>
          <a href="javascript:void(0);" class="btn btn-outline-white text-center" style="z-index: 10; border-radius: 0; border-width: 3px; padding: 20px 8.5134%; font-size: 30px">Secure your place now!</a>
        </div>
      </div><!-- /.row -->

      <div class="row justify-content-center">
        <div class="col d-flex flex-column align-items-center">
          <figure style="width: 50%; margin-top: -28%; margin-bottom: -10%; display: inline-block;">
            <img src="assets/demo/home/ellipse.png" alt="" />
          </figure>
        </div><!-- /.col-6 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  
</div>

<?php get_footer();