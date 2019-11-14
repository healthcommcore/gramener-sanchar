<main class="border-bottom" style="padding-top: 110px;">
<div class="container  p-md-4">
      <h3 class="font-weight-bold mb-0 py-4 font-chivo  text-color14"><?php the_title();?></h3>
      <figure class="mb-4 position-relative">	<?php the_post_thumbnail('banner-image'); ?>
     <!--  <img src="<?php echo get_template_directory_uri() ?>/assets/img/training-2.png" alt="training-2" class="w-100 d-none d-md-block d-lg-block">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/mob_training.png" alt="training-2" class="w-100 d-block d-md-none d-lg-none">
        <div class="bg-3 position-absolute w-100"></div> --> 
      </figure>
      <div class="row pb-4 mb-xl-5 text-color6">
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 mb-3 mb-lg-0">
          <h5 class="mb-0 lh-1 f-16"> <?php echo the_content(); ?></h5>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7 text-color9">
        	<div class="response-frm-submit" style ="position: absolute; left:0px; right:0px; top:0px; bottom:0px; background-color:rgba(255,255,255,0.95);z-index:9999; padding:20px;display:none;">
        		<div class="close-frm" style="text-align:right;"><a href="#">X</a></div>
        		<h3 class="font-chivo font-weight-bold text-center">Thank you for signing up for  SANCHAR trainings
                <a href="javascript:void(0)">
                  <figure class="mb-0 pt-4"><img src="<?php echo get_template_directory_uri() ?>/images/check.svg" alt="check" style="width:60px; height: auto;"></figure>
                </a></h3>
        	</div>
          <div class="card h-100 py-4 px-xl-5 px-3 border-0">
            <div class="card border-0 bg-transparent pb-3">
              <div class="font-weight-bold mb-0 font-chivo display-3"><span class="sm5 d-block f-22">Sign Up for
                  Training Updates</span></div>
            </div>
            <div class="d-md-flex flex-column align-items-center w-100 training_form">
              <div class="form-group pb-3  w-100">
                <label for="user_name" class="h3 mb-0 pb-1"><span class="sm3 d-block f-14">NAME</span></label>
                <input type="text" name="name" class="form-control border-color9 border-top-0 border-left-0 border-right-0 rounded-0" required="" id="user_name" placeholder="">
              </div>
              <div class="error text-color13 text-left w-100 font-chivo font-weight-bold invisible">*
                Invalid username. Please try again</div>
              <div class="row w-100 mx-0">
                <div class="form-group pb-3 col-12 col-sm-12  col-md-6 w-100 px-0 pr-md-3 pl-md-0">
                  <label for="user_email" class="h3 mb-0 pb-1"><span class="sm3 d-block f-14">EMAIL</span></label>
                  <input type="email" name="email" class="form-control border-color9 border-top-0 border-left-0 border-right-0 rounded-0" required="" id="user_email" placeholder="">
                </div>
                <div class="form-group pb-3 col-12 col-sm-12 col-md-6 w-100 px-0 pl-md-3 pr-md-0">
                  <label for="user_ph" class="h3 mb-0 pb-1"><span class="sm3 d-block f-14">Phone</span></label>
                  <input type="tel" maxlength="20" class="form-control border-color9 border-top-0 border-left-0 border-right-0 rounded-0" required="" id="user_ph" placeholder="">
                </div>
              </div>
              <div class="form-group mb-0 pl-0  form-check text-center w-100">
                <button type="submit" name="phno" class="submit btn border border-color9 border-2 font-chivo font-weight-bold round mx-auto px-5 col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 py-2 bg-white text-uppercase">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </main>