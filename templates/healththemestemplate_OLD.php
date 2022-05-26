<?php
/**
 * Template Name: Sanchar Health Themes OLD
 */
?> 
<?php
get_header ();
$upload_dir = wp_upload_dir ();
while ( have_posts () ) :
	the_post ();
	$pid = 33;
	$category = get_the_category ( $pid );
	$categoryterm = "4";
	$categoryname = "Health Themes";
	?>
<main class="two border-bottom data_portal-no vh-100 overflow-auto " style="padding-top: 110px;">
<div class="d-xl-flex position-relative h-100">
	<div class="  left-panel bg-color4  navbar-nav-scroll col-md-3 px-0 ml-lg-0 col-lg-3 overflow-auto" style="padding-top: 110px;">
		<!-- add the extra class in the ul -->
		<ul class="nav-pills theme-pills ml-md-auto ml-lg-auto font-chivo py-md-4 nav d-md-flex flex-md-column py-0 mx-0 flex-nowrap align-items-end col-9 pr-0 col-md-12 col-lg-8 page-top">
			<?php
	$args = array (
			'post_type' => 'page',
			'order' => 'ASC',
			'category' => $categoryterm 
	);
	$menulist = get_posts ( $args );
	$backlink = "/sanchar-briefs";
	foreach ( $menulist as $menu ) {
		$link = get_permalink ( $menu );
		$active = ($pid == $menu->ID) ? "active" : "";
		echo '<li class="nav-item text-nowrap px-0 px-md-0 px-lg-0 col-md-12 p-0 text-center text-md-left">';
		echo '<a class="nav-link px-3 text-color9 p-0 mr-md-4 mr-xl-0 my-xl-2 py-2 py-lg-0 text-center text-md-left col-lg-12 col-md-12 ' . $active . '" href="' . $link . '">';
		echo '<span class="opacity-50 f-14">' . $menu->post_title . '</span></a></li>';
	}
	$getparams = $_GET;
	$params = [ 
			'Area' => $getparams ['indicator'],
			'Data%20Source' => 'NFHS-4' 
	];
	$curldata = getcurldata ( "indicator_names", $params );
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
											<h3 class="mb-1">
												<span class="sm3 d-block f-14">Health Themes</span>
											</h3>
											<h2 class="mb-0 font-chivo font-weight-bold slider_title d-none d-md-block"><?php echo $getparams['indicator'] ; ?> Indicators</h2>
										</div>
									</div>
									<div class="d-flex flex-row col-7 col-md-7 col-lg-6">
										<div class="col-12 col-lg-7 col-md-7  px-0 mr-2 border-bottom d-none d-md-block d-lg-block">
											<div class="input-group round-0 my-0 w-auto input-group-sm">
												<input type="search" class="form-control text-white search no-border-radius bg-transparent round-0 border-0 border-left-0 border-right-0 border-top-0 d-md-block rounded-0 d-none" placeholder="Search" aria-label="Search" data-search="@text" data-target=".each_category"
													data-hide-class="d-none" data-search-name="heath_themes_search">
												<div class="input-group-prepend round-0 ">
													<span class="input-group-text round-0 border-0 bg-transparent py-md-2"><img src="<?php echo get_template_directory_uri() ?>/images/search-white.svg" alt="search-white"></span>
												</div>
											</div>
										</div>
										<div class="pos-cr d-block d-md-none d-lg-none">
											<img src="assets/img/search-white.svg" alt="search-white" id="mobSearch" class="p-2">
										</div>
										<div class="col-12 pr-md-0 pr-lg-0 col-lg-5 col-md-5">
											<select class="selectpicker w-100" data-size="5" data-style="p-14 border text-white border-top-0 border-right-0 border-left-0 br-2 rounded-0 ">
												<option class="p-11" value="a-z">Alphabetical (A-Z)</option>
												<option class="p-11" value="z-a">Alphabetical (Z-A)</option>
											</select>
										</div>
									</div>
									<div class="position-absolute w-100 bg-color2 d-none z-9" id="mobSearchBar">
										<div class="d-flex py-1">
											<div class="align-self-center">
												<img src="assets/img/mobile_back_arrow.svg" alt="back button" class="px-2 w-100" id="mobSearchback">
											</div>
											<input type="search" class="form-control text-white search no-border-radius bg-transparent round-0 border-0
                      border-left-0 border-right-0 border-top-0 d-md-block rounded-0" placeholder="Search" aria-label="Search" data-search="@text" data-target=".each_category"
												data-hide-class="d-none" data-search-name="heath_themes_search">
										</div>
									</div>
								</div>
								<h6 class="mb-0 font-chivo font-weight-bold slider_title d-block d-md-none  f-18 text-center"><%- selected_area %> Indicators</h6>
							</div>
						</div>
						<!--filter start-->
						<div class="  px-xl-5 pl-md-3 px-3 select-fix position-absolute mt-n3 w-100">
							<div class="pb-4 px-lg-5">
								<div class="row">
									<div class="col-md-6 col-lg-4 col-10 mx-auto ml-md-0 pb-3 pr-xl-1">
										<div class="round bg-white border h3 mb-0 pl-2 px-0 d-flex align-items-center pl-md-2">
											<div class="sm3">DATABASE :</div>
											<div class="flex-fill">
												<select class="selectpicker sm3 w-100 " data-size="5" data-style="border br-2 p-14 border-0 text-color16">
													<option class="p-11">NFHS - 4</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--filter end-->
					</div>
					<!--slider end-->
				</div>
				<!--fixed end-->
			</div>
			<div class="px-xl-5 px-3 py-5 mb-5 bg-color5">
				<div class="no-health-data-available d-none font-chivo font-weight-bold display-3 px-5">
					<span class="sm5 d-block">No Data Available</span>
				</div>
				<div class="row px-lg-5 search_heath_row">
					<?php
	// debug($curldata);

	foreach ( $curldata as $indicator ) {
		$indicator = ( array ) $indicator;
		?>
					
					
					<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pb-3 pr-xl-1 each_category">
						<div class="card pt-3 border-0 shadow-sm h-100">
							<div class="card-header bg-transparent border-0 px-3 py-0">
								<div class="mb-0 font-weight-bold display-3 font-chivo text-color9">
									<span class="sm5 d-block f-18"><?php echo $indicator['Variable Name']?></span>
								</div>
							</div>
							<div class="card-body p-0 m-0"></div>
							<div class="card-footer bg-transparent border-0 p-0 h1 mb-0">
								<div class="px-3 py-2"></div>
              <!--
									<a class="text-color16 h1 mb-0" href="<?php echo $upload_dir ['baseurl'] ; ?>/data/<?php echo trim($indicator['PDF']); ?>.pdf" target="_blank" rel="noopener"><span class="sm5 d-block f-10">Download SANCHAR Brief PDFs</span></a>
              -->
								<ul class="nav justify-content-between py-2 bg-color10 nav-fill d-flex flex-row">
                <!--
                  Remove this old link that downloads a CSV of data. This can be done on Visualization component

									<li class="nav-item text-center"><a class="text-center sm5 nav-link py-1 download-data cursor-pointer px-md-0" data-qid="<?php //echo $indicator['QID']?>" data-datset="<?php //echo $indicator['DataSet']?>" data-variablename="<?php //echo $indicator['Variable Name']?>"> <img src="<?php //echo get_template_directory_uri() ?>/images/download.svg"
                -->
									<li class="nav-item text-center">
                    <a class="text-center sm5 nav-link py-1 download-data cursor-pointer px-md-0" target="_blank" rel="noopener noreferrer" href="<?php echo $upload_dir ['baseurl'] ; ?>/data/<?php echo trim($indicator['PDF']); ?>.pdf">
                      <img src="<?php echo get_template_directory_uri() ?>/images/download.svg" alt="open-in-new-arrow" class="d-block mx-auto"><span class="d-block pt-1 text-color6 f-10" />DOWNLOAD BRIEF</span>
                    </a>
                  </li>
                <!--
                  Remove "view" button because this data is available within visualization component and not needed here

                  <li class="nav-item text-center"><a class="text-center sm5 nav-link border-right border-left  py-1 view-data cursor-pointer px-md-0" data-qid="<?php //echo $indicator['QID']?>" data-datset="<?php //echo $indicator['DataSet']?>" data-variablename="<?php //echo $indicator['Variable Name']?>" > <img
											src="<?php //echo get_template_directory_uri() ?>/images/view.svg" alt="open-in-new-arrow" class="d-block mx-auto"><span class="d-block pt-1 text-color6 f-10">VIEW</span>
									</a></li>
                -->
									<li class="nav-item text-center"><a class="text-center sm5  nav-link  py-1 cursor-pointer px-md-0"
										href="https://projectsanchar.org/odp/?tab=chart&chart=india_map&qid=<?php echo $indicator['QID']?>&dataset=<?php echo $indicator['DataSet']?>&program_area=<?php echo $indicator['Area']?>" target="_blank" rel="noopener"> <img
											src="<?php echo get_template_directory_uri() ?>/images/visualisation.svg" alt="open-in-new-arrow" class="d-block mx-auto"><span class="d-block pt-1 text-color6 f-10">VISUALISATION</span>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
					<?php
	}
	?>
				</div>
			</div>
		</div>
	</div>
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
endwhile
;
?>

<?php
get_footer ();
?>
<script>
	$(".readmoreexpert").on("click", function(){
		var expertid = $(this).attr("expertid"); 
		var name = $("."+expertid+"-name").html();
		var design = $("."+expertid+"-design").html();
		var term = $("."+expertid+"-termname").html();
		var phone = $("."+expertid+"-phone").html();
		var email = $("."+expertid+"-email").html();
		var desc = $("."+expertid+"-desc").html();
		var profileimg = $("."+expertid+"-profileimg").attr("src");


		$("#resource_profile_model .profileimg").attr("src", profileimg);
		$("#resource_profile_model .res-name").html(name);
		$("	#resource_profile_model .designation").html(design);
		$("#resource_profile_model .text-truncates").html(desc);
		$("#resource_profile_model .phone").html(phone);
		$("#resource_profile_model .email").html(email);
		$("#resource_profile_model .term").html(term);

		
	});
	$(".pillclick").on("click", function(){
			//pillcontent
			var selectedpill = $(this).attr("data-pill");
			$(".pillcontent").hide();
			if(selectedpill == "all"){
				$(".pillcontent").show();
			}else{
				$(".pillcontent."+selectedpill).show();
				}
	});

	$('.selectpicker').selectpicker();

	$('.selectpicker').on('changed.bs.select', function(e) {
	   

	    var sortby = this.options[this.selectedIndex].value;
	    sortbyfunc(".each_category",".search_heath_row", sortby )

        
	  });
	sortbyfunc(".each_category",".search_heath_row", "a-z" );

	  
</script>
