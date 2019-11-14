
<?php
get_header ();
?>
<main class="border-bottom pb-2"  style="padding-top: 105px;">

<!-- Home widgets -->	
		<div class="home-hero-image">
			<?php  dynamic_sidebar('Home hero image') ; ?>
		</div>
 
	
<div class="container py-2 py-md-5 py-lg-5">
<!-- Home text -->	
		<div class="row py-4">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<?php  dynamic_sidebar('Home Text') ; ?>
			</div>
		</div>

<!-- Home widgets -->	
		<div class="row">
			<?php  dynamic_sidebar('Home Widgets') ; ?>
		</div>
		
<!-- Home signup -->	
		<div class="bg-3 mb-5 px-3 p-md-4 border-custom rounded">
			
				<?php  //dynamic_sidebar('Social Widget') ; ?>
				<div class="d-flex  justify-content-between align-items-center px-xl-3 py-xl-2">
					<?php  dynamic_sidebar('Home Signup') ; ?>
				</div>
				
			
		</div>
	</div>
	
	</main>
	<?php get_footer();?>
