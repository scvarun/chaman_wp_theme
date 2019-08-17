<?php
include_once 'lib/init.php';
include_once 'lib/functions.php';

$config = array(
  'title' => 'Admissions | Chaman Bharatiya',
  'body_class' => $GLOBALS['body_class'] . ' header-overlay',
);

get_header($config);
?>

<div class="content-wrapper" style="background: #ed633c">
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7">
          <h6 style="text-transform: uppercase; color: #e5e5e5; margin-bottom: 40px">Become a leader</h6>
          <h2 style="color: #e5e5e5; margin-bottom: 110px">Unfold the leadership potential in every child</h2>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <div class="row">
        <div class="col d-flex flex-column align-items-center">
          <a href="javascript:void(0);" class="btn btn-outline-white text-center" style="z-index: 10; border-radius: 0; border-width: 3px; padding: 20px 5%; font-size: 30px">Become a partner today</a>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <form id="admission-form" class="form" method="post" action="javascript:void(0);">
            <div class="form-tabs">
              <a href="#your-details" class="no-scroll" data-open="true">1. Your Details</a>
              <a href="#attachments" class="no-scroll" data-open="false">2. Attachments</a>
              <a href="#check-send" class="no-scroll" data-open="false">3. Check & Send</a>
            </div><!-- /.form-tabs -->
            <div class="form-tabs-content">
              <div id="your-details" data-open="true">
                <h5>Child's Information</h5>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" name="first-name" class="form-control" />
                    </div><!-- /.form-group -->
                  </div><!-- /.col-lg-6 -->

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" name="last-name" class="form-control" />
                    </div><!-- /.form-group -->
                  </div><!-- /.col-lg-6 -->

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="datetime" name="date-of-birth" class="form-control" />
                    </div><!-- /.form-group -->
                  </div><!-- /.col-lg-6 -->

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Nationality</label>
                      <select class="form-control" name="first-name">
                        <option value="indian">Indian</option>
                        <option value="australian">Australian</option>
                        <option value="american">American</option>
                      </select>
                    </div><!-- /.form-group -->
                  </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
              </div><!-- /#your-details -->

              <div id="attachments" data-open="false">
              </div><!-- /#attachments -->

              <div id="check-send" data-open="false">
              </div><!-- /#check-send -->
            </div><!-- /.form-tabs-content -->
          </form>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>

<?php get_footer();