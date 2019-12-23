<?php
/**
 * Template Name: Sanchar Experts
 */
?> 
<?php
get_header ();
while ( have_posts () ) :
	the_post ();
	$pid = get_the_ID ();
	$category = get_the_category ( $pid );
	$categoryterm = $category [0]->term_id;
	$categoryname = $category [0]->cat_name;
	?>
<div class="modal" id="resource_profile_model" aria-modal="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Expert Profile</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div class="card h-100 border-0 shadow text-color9 d-flex flex-column">
					<div class="card-header px-3 border-0 bg-transparent pb-0 d-flex ">
						<ul class="nav d-flex align-items-start w-100 flex-row">
							<li class="nav-item pr-3">
								<div class="h-100">
									<figure class="mb-0 rectangle">
										<img class="profileimg" height="80" width="80" src="" alt="profile">
									</figure>
								</div>
							</li>
							<li class="nav-item w-50">
								<div class="d-flex flex-column">
									<p class="mb-0 font-chivo font-weight-bold lh-4 text-wrap res-name"></p>
									<h1 class="mb-0  font-chivo">
										<span class="sm5 d-block designation font-weight-bold font-chivo"> </span>
									</h1>
								</div>
							</li>
						</ul>
					</div>
					<div class="card-body pb-4 px-3 d-flex">
						<h3 class="mb-2 pb-3 lh-3">
							<span class="sm3 d-block text-truncates"> </span>
						</h3>
					</div>
					<div class="card-footer px-3 bg-color10 pb-4 border-0">
						<ul class="nav d-flex justify-content-center mt-n4">
							<li class="h3  mb-0 text-center  nav-item"><a class="nav-link bg-white text-color16 font-weight-bold d-block border-color16 py-1 border round sm3 term" href=""> </a></li>
						</ul>
						<ul class="nav d-flex flex-column pt-3 h3 mb-0 text-center">
							<li class="nav-item mb-1"><a class="nav-link sm3 text-color9 p-0 phone"> Phone </a></li>
							<li class="nav-item"><a class="nav-link sm3 text-color9 p-0  email" href="mailto:email"> Email </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
		<div class="bg-color5">
			<div class="tab-content bg-color5 h-100" id="v-pills-tabContent">
				<div class="tab-pane fade active show" id="v-pills-experts" role="tabpanel" aria-labelledby="v-pills-experts-tab">
					<div class="card border-0 bg-transparent pb-xl-4">
						<div class="bg-resources bg-no-repeat mb-3">
							<div class="bg-2   px-xl-5 px-3 py-4">
								<div class="px-lg-5">
									<h3 class="font-weight-bold mb-3 pb-3 font-chivo text-color14"><?php the_title();?></h3>
									<ul class="nav nav-pills resources mb-0 font-chivo font-weight-bold display-3 mb-0" id="pills-tab" role="tablist">
                        <?php
	$terms = get_terms ( 'expertscategory', array (
			'hide_empty' => false 
	) );
	echo '<li class="nav-item mr-2 pr-1 pb-1 mb-2">';
	echo '<a class="nav-link bg-white sm5 border round text-color11 pillclick active" data-pill="all"  id="pills-home-tab-res1" data-toggle="pill" href="#all" role="tab" aria-controls="pills-home" aria-selected="true">All Experts</a>';
	echo '</li>';
	foreach ( $terms as $term ) {
		echo '<li class="nav-item mr-2 pr-1 pb-1 mb-2">';
		echo '<a class="nav-link bg-white sm5 border round text-color11 pillclick" data-pill="' . $term->slug . '" id="' . $term->slug . '" data-toggle="pill" href="#' . $term->slug . '" role="tab" aria-controls="pills-home" aria-selected="false">' . $term->name . '</a>';
		echo '</li>';
	}
	?>
  </ul>
								</div>
							</div>
						</div>
						<div class="px-xl-5 px-3 pt-0 pb-5 mb-5">
							<div class="tab-content px-md-5 resources-color" id="pills-tabContent">
								<div class="row">
										<?php
	echo the_content ();
	?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</main>
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
</script>
