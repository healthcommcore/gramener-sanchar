<main class="min-vh-90 two-1  border-bottom pb-md-0 pb-lg-0 " style="padding-top: 110px;">
<div class=" min-vh-90 px-0 px-md-0 ">
      <div class="d-md-flex ">
        <div class="bg-color5 min-vh-90  pb-5 pt-4 px-0 px-md-0 col-lg-5">
          <div class="h-100 col-12 ml-auto col-lg-10">
            <div class="pb-md-4">
              <h3 class="font-weight-bold mb-1 font-chivo text-color14 f-28">Get in Touch</h3>
              <h3 class="mb-0"><span class="sm3 d-block text-color9 f-14">For Queries Regarding Training</span></h3>
            </div>
            
            <?php 
            dynamic_sidebar('Get in Touch') ;
            ?>
            
            
            <div class="my-4 underline w-75"></div>
            <h1 class="mb-0 opacity-50 font-chivo text-color9"><span class="sm5 d-block f-10">ADDRESS</span></h1>
            <div class="h3 mb-0 nav d-flex lh-3 flex-column sm1 text-color9 f-14">
               <?php 
            dynamic_sidebar('Address') ;
            ?>
            </div>
          </div>
        </div>
       <div class=" bg-white min-vh-90 px-3 px-md-5 pt-4 mb-0 mb-md-0 col-lg-7 text-color9 mb-3">
       	<div class="response-frm-submit" style ="position: absolute; left:0px; right:0px; top:0px; bottom:0px; background-color:rgba(255,255,255,0.95);z-index:9999; padding:20px;display:none;">
        		<div class="close-frm" style="text-align:right;"><a href="#">X</a></div>
        		<h3 class="font-chivo font-weight-bold text-center">Thank you for signing up.
                <a href="javascript:void(0)">
                  <figure class="mb-0 pt-4"><img src="<?php echo get_template_directory_uri() ?>/images/check.svg" alt="check" style="width:60px; height: auto;"></figure>
                </a></h3>
        	</div>
          <div class="card h-100 px-lg-5 border-0">
            <div class="card border-0 bg-transparent pb-md-5 pb-4 h-25">
              <h3 class="font-weight-bold mb-md-1 mb-2 font-chivo f-22">Sign Up </h3>
              <h3 class="mb-0"><span class="sm3 d-block f-14">Get updates on new datasets and new visuals from
                  SANCHAR</span></h3>
            </div>
            <div class="h-75 d-flex flex-column align-items-center w-100 contact_form">
              <div class="form-group pb-md-3 pb-3 w-100 text-color9">
                <label for="user_name" class="h3 mb-0 pb-3"><span class="sm3 d-block f-14">NAME</span></label>
                <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" id="user_name" aria-describedby="emailHelp" placeholder="Enter Name" required="">
              </div>
              <div class="form-group   w-100 mb-1">
                <label for="user_email" class="h3 mb-0 pb-3"><span class="sm3 d-block f-14">EMAIL</span></label>
                <input type="email" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" id="user_email" placeholder="Enter Email" required="">
              </div>
              <div class="error pb-md-5 pb-3 text-color13 text-left w-100 font-chivo font-weight-bold invisible">*
                Invalid email address. Please try again</div>
              <div class="form-group form-check text-center pl-0  w-100">
                <button type="submit" class="submit-btn btn border border-color9 border-2 font-chivo font-weight-bold round mx-auto  col-6 col-sm-6 col-md-8 col-lg-6 col-xl-4 py-2 bg-white">SIGN
                  UP</button>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    </main>
