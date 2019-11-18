
<?php
get_header ();
?>
<main class="border-bottom pb-2"  style="padding-top: 105px;">

<!-- Home carousel -->	
		<div class="home-carousel">
			<?php  dynamic_sidebar('Home carousel') ; ?>
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
		<div class="bg-3 mb-5 px-3 p-md-4 border-custom rounded mt-5">
				<?php  //dynamic_sidebar('Social Widget') ; ?>
				<a class="signup-link text-decoration-none" href="/contact-us">
					<?php  dynamic_sidebar('Home Signup') ; ?>
				</a>
		</div>

<!-- end row -->
	</div>
	
	</main>
	<?php get_footer();?>
