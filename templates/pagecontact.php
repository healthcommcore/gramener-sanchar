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
        <div class="items-full pt-0 pt-md-4">
           <h3 class="font-weight-bold mb-md-1 mb-2 font-chivo f-22">
            <?php echo the_title(); ?>
          </h3>
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
