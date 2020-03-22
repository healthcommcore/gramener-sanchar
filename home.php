
<?php
get_header ();
?>
<main class="border-bottom pb-2"  style="padding-top: 105px;">

<!-- Home carousel -->	
		<div class="home-carousel">
			<?php  dynamic_sidebar('Home carousel') ; ?>
		</div>
 
<style>
  iframe {
    border: none;
  }
  .covid-dashboard {
    width: 100%;
    height: 700px;
  }

  @media (min-width: 768px) and (max-width: 991px) {
    .covid-dashboard {
      height: 1000px;
    }
  }
  @media (min-width: 376px) and (max-width: 767px) {
    .covid-dashboard {
      height: 1700px;
    }
  }
  @media (max-width: 375px) {
    .covid-dashboard {
      height: 1900px;
    }
  }
</style>
<?php 
  $url = $_SERVER['SERVER_NAME']; 
  $path = $_SERVER['REQUEST_URI']; 
?>
<iframe 
    class="covid-dashboard py-3" 
    src="http://covid-dashboard.hccstaging.com?current_site=<?php echo $url; ?>&current_path=<?php echo $path; ?>">
</iframe>
	
<div class="container py-2 py-md-5 py-lg-4">
<!-- Home text -->	
		<div class="row py-4">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<?php  dynamic_sidebar('Home Text') ; ?>
			</div>
		</div>

<!-- Home widgets -->	
		<div class="card-deck mb-4">
			<?php  dynamic_sidebar('Home Widgets') ; ?>
		</div>
		
<!-- Home signup -->	
  <div class="row">
		<div class="call-to-action col-md-4 my-3">
        <?php  dynamic_sidebar('Home Signup') ; ?>
		</div>
  </div>

<!-- end row -->
	</div>
	
	</main>
	<?php get_footer();?>
