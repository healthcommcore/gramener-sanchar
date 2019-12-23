<?php
get_header ();
$categoryname = '';
$categoryterm = '';
while ( have_posts () ) :
	the_post ();
	$pid = get_the_ID ();
	$category = get_the_category ( $pid );
	$categoryterm = $category [0]->term_id;
	$categoryname = $category [0]->cat_name;
	
	$designation = get_post_meta ( $pid, 'team_member_designation', true );
	$twitterurl = get_post_meta ( $pid, 'team_twitter_link', true );
	$linkedinurl = get_post_meta ( $pid, 'team_linkedin_link', true );
	$facebookurl = get_post_meta ( $pid, 'team_facebook_link', true );
	
	
	
	// End of the loop.
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
	$backlink = "";
	foreach ( $menulist as $menu ) {
		$link = get_permalink ( $menu );
		$active = "";
		$link = $link . "#" . $menu->post_name;
		if ("People" == $menu->post_title) {
			$active = "active";
			$backlink = $link;
		}
		echo '<li class="nav-item text-nowrap px-0 px-md-0 px-lg-0 col-md-12 p-0 text-center text-md-left">';
		echo '<a class="' . $active . ' nav-link px-3 text-color9 p-0 mr-md-4 mr-xl-0 my-xl-2 py-2 py-lg-0 text-center text-md-left col-lg-12 col-md-12 "';
		echo ' href="' . $link . '"><span class="opacity-50 f-14" >' . $menu->post_title . '</span></a>';
		echo '</li>';
	}
	
	?>
		
		</ul>
	</div>
	<div class="col-md-10 ml-md-auto px-0 pl-md-5">
		<div class="px-md-5 bg-color5">
			<div class="px-4 px-md-5">
				<div class="card border-0 bg-transparent people-details">
					<div class="pb-4 text-color6">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 align-self-center d-flex p-0">
							<a class="arrow-people-reverse cursor-pointer" href="<?php echo $backlink;?>"><img src="<?php echo get_template_directory_uri() ?>/images/arrow-people-reverse.svg" alt="arrow-people-reverse" width="19" height="19"></a>
							<h3 class="font-weight-bold font-chivo mb-3 mb-md-4 pl-3">People</h3>
						</div>
						<ul class="nav d-flex flex-column h3 mb-0 align-items-center">
							<li class="nav-item pt-4 w-100">
								<div class="row">
									<div class="col-6 col-sm-12 col-md-3 col-lg-3 col-xl-3  pb-3 pb-md-0 order-0 order-md-0 order-lg-0">
										<figure class="mb-0">
											<?php echo the_post_thumbnail ();?>
										
											<!-- <img src="assets/img/people_images/Kvish.png" alt="person-image" class="img-fluid"> -->
										</figure>
									</div>
									<div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 order-2 order-md-1 order-lg-1">
										<div class="card h-100 border-0 bg-transparent">
											<div class="card-header py-0 px-0 pb-3 bg-transparent border-0">
												<div class="display-2 text-color6 font-weight-bold">
													<span class="sm5 d-block"><?php  
													
													
													the_title();?></span>
												</div>
											</div>
											<div class="card-body p-0">
												<ul class="nav flex-column pb-3">
													<li class="nav-item h3 mb-1"><span class="sm3 d-block"><?php echo nl2br($designation);?></span></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-6 col-sm-12 col-md-2 col-lg-2 col-xl-2 order-1 order-md-2 order-lg-2 align-items-end align-items-md-start align-items-lg-start d-flex pb-3">
										<ul class="nav align-items-center">
											<?php 
											if($twitterurl != ""){
											?>
											<li class="nav-item pr-3"><a class="nav-link p-0" href="<?php echo $twitterurl; ?>" target="_blank" rel="noopener">
													<figure class="mb-0">
														<img src="<?php echo get_template_directory_uri() ?>/images/twitter-blue.png" alt="twitter-blue">
													</figure>
											</a></li>
											<?php 
											}
											if($linkedinurl != ""){	
											?>
											<li class="nav-item"><a class="nav-link p-0" href="<?php echo $linkedinurl; ?>" target="_blank" rel="noopener">
													<figure class="mb-0">
														<img src="<?php echo get_template_directory_uri() ?>/images/linkedin-blue.png" alt="linkedin-blue">
													</figure>
											</a></li>
											<?php 
											}
											?>
										</ul>
									</div>
								</div>
							</li>
						</ul>
						<h5 class="pt-4 lh-1 pb-lg-5 pb-md-5 mb-lg-3"><?php the_content();?></h5>
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
get_footer ();
?>
