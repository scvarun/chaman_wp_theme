<?php
/**
* Template Name: Admission
*
*/

get_header();
?>

  <?php
    /* Start the Loop */
    while ( have_posts() ) : the_post();
    ?>
      
      <?php the_content( "" ); ?>

      <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <form id="admission-form" class="form" method="post" action="javascript:void(0);">
                <div class="form-tabs">
                  <a href="#your-details" class="no-scroll" data-open="true">1. Your Details</a>
                  <a href="#attachments" class="no-scroll" data-open="false">2. Attachments</a>
                  <a href="#check-send" class="no-scroll" data-open="false">3. Check &amp; Send</a>
                </div><!-- /.form-tabs -->
                <div class="form-tabs-content">
                  <div id="your-details" data-open="true">
                    <h5>Child's Information</h5>
                    <div class="row">
                      <div class="col-lg-5">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="first-name" class="form-control">
                        </div><!-- /.form-group -->
                      </div><!-- /.col-lg-6 -->

                      <div class="col-lg-5 offset-lg-1">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="last-name" class="form-control">
                        </div><!-- /.form-group -->
                      </div><!-- /.col-lg-6 -->

                      <div class="col-lg-5">
                        <div class="form-group">
                          <label>Date of Birth</label>
                          <input type="datetime" name="date-of-birth" class="form-control">
                        </div><!-- /.form-group -->
                      </div><!-- /.col-lg-6 -->

                      <div class="col-lg-5 offset-lg-1">
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

    <?php endwhile;
  ?>

<?php
get_footer();