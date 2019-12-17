<?php
/**
 * Template Name: Sanchar Health Themes
 */
?> 
<?php
get_header ();
	?>
<main class="two border-bottom data_portal-no vh-100 overflow-auto " style="padding-top: 110px;">
<div class="d-xl-flex position-relative h-100">
<div class="  left-panel bg-color4  navbar-nav-scroll col-md-3 px-0 ml-lg-0 col-lg-3 overflow-auto" style="padding-top: 110px;">
		<!-- add the extra class in the ul -->
		<ul class="nav-pills theme-pills ml-md-auto ml-lg-auto font-chivo py-md-4 nav d-md-flex flex-md-column py-0 mx-0 flex-nowrap align-items-end col-9 pr-0 col-md-12 col-lg-8 page-top">
			<?php
	$categoryname = "Health Themes";
	$args = array (
			'post_type' => 'page',
			'order' => 'ASC',
			'category' => $categoryterm 
	);
	$menulist = get_posts ( $args );
	$backlink = "/health-themes";
	foreach ( $menulist as $menu ) {
		$link = get_permalink ( $menu );
		$active = ($pid == $menu->ID) ? "active" : "";
		echo '<li class="nav-item text-nowrap px-0 px-md-0 px-lg-0 col-md-12 p-0 text-center text-md-left">';
		echo '<a class="nav-link px-3 text-color9 p-0 mr-md-4 mr-xl-0 my-xl-2 py-2 py-lg-0 text-center text-md-left col-lg-12 col-md-12 ' . $active . '" href="' . $link . '">';
		echo '<span class="opacity-50 f-14">' . $menu->post_title . '</span></a></li>';
	}		
  ?>
  </ul>
	</div>
	<div class="col-md-9 ml-md-auto px-0 pl-md-0 pb-5 mb-5 col-lg-9">
		<div class="card border-0 bg-transparent  health_theme_indicators_cls">
			<div class="w-100 data_portal_slider">
				<!--fixed-->
				<div class=" header">
					<!--slider start-->
					<div class="bd-example h-100">
						<div class="position-relative h-100">
							<div class="themeImages h-100 overflow-hidden grad-image">
								<img src="<?php echo get_template_directory_uri() ?>/images/slider_maternal_health.png" class="d-lg-block d-md-block d-none w-100" alt="carousel-1"> <img src="<?php echo get_template_directory_uri() ?>/images/mob_slider_.png" class="d-block d-md-none d-lg-none w-100" alt="carousel-1">
							</div>
							<div class="carousel-caption px-4 text-left  font-weight-bold px-md-5 px-lg-5">
								<div class="d-md-flex justify-content-between align-items-center pb-3 pb-lg-4 pb-md-0 flex-row row px-lg-5">
									<div class="d-flex align-items-center text-white pt-2 pt-md-0 col-5 col-md-5 col-lg-6 pr-md-0 px-lg-4">
										<a class="carousel-control-prev position-relative w-auto ml-n3 opacity-90 back-to-health-themes cursor-pointer" href="<?php echo $backlink;?>"><img src="<?php echo get_template_directory_uri() ?>/images/back-button.svg" alt="back-button"></a>
										<div class="ml-2 ml-md-0">
											<h2 class="mb-0 font-chivo font-weight-bold slider_title d-none d-md-block"><?php echo the_title(); ?></h2>
										</div>
									</div>
							</div>
						</div>
					</div>
					<!--slider end-->
				</div>
				<!--fixed end-->
			</div>

					
					
					<div class="col-12">
            <div class="px-md-5 bg-color5">
              <div class="px-4 px-md-5 pb-5 mb-5">
              <?php echo the_content(); ?>
              </div>
            </div>

<!--col 12-->
					</div>
<!--header-->
				</div>
<!--data portal slider-->
			</div>
<!--card border-->
		</div>
<!--col-md-9-->
	</div>
<!--flex-->
</div>
</main>
<div class="modal fade health_data_view_height" id="health_data_view_modal" tabindex="-1" role="dialog" aria-labelledby="health_data_view_modal_title" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="health_data_view_modal_title"></h5>
				<button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="map-formhandler-table table-responsive"></div>
			</div>
		</div>
	</div>
</div>


<?php
get_footer ();
?>

