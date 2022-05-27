
<?php
get_header ();
?>
<main class="border-bottom pb-2"  style="padding-top: 105px;">

<!-- Home carousel -->	
		<div class="home-carousel">
			<?php  dynamic_sidebar('Home carousel') ; ?>
		</div>
 
<?php //get_template_part('covid', 'dashboard'); ?>
	
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
