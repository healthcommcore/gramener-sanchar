<?php
/**
 * Template Name: Sanchar Briefs
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
		<div class="tab-pane bg-color5 " id="v-pills-briefs" role="tabpanel" aria-labelledby="v-pills-briefs-tab">
			<div class="card border-0 bg-transparent">
				<div class="bg-brief grad-image bg-no-repeat mb-2 position-relative py-2">
					<div class="w-100 px-0 ">
						<div class="custom-px-1">
							<div class="d-md-flex justify-content-between align-items-center py-0 py-md-1 py-lg-3 d-flex px-md-5">
								<h3 class="mb-0 font-chivo font-weight-bold text-white slider_title col-md-5 col-5 d-none d-md-block">SANCHAR Briefs</h3>
								<h6 class="mb-0 font-chivo font-weight-bold slider_title d-block d-md-none text-white f-18 col-md-5 col-5">SANCHAR Briefs</h6>
								<div class="d-flex flex-row col-7 col-md-7 col-lg-6">
									<div class="col-12 col-lg-7 col-md-7  px-0 mr-2 border-bottom d-none d-md-block d-lg-block">
										<div class="input-group round-0 my-0 w-auto input-group-sm">
											<input type="search" class="d-none d-md-block d-lg-block form-control text-white search no-border-radius bg-transparent rounded-0 border-0" placeholder="Search" aria-label="Search" data-search="@text" data-target=".sanchar_briefs .data-card" data-hide-class="d-none"
												data-search-name="sanchar_briefs_search">
											<div class="input-group-prepend round-0 ">
												<span class="input-group-text round-0 border-0 bg-transparent py-md-2"><img src="<?php echo get_template_directory_uri() ?>/images/search-white.svg" alt="search-white"></span>
											</div>
										</div>
									</div>
									<div class="pos-cr d-block d-md-none d-lg-none" id="mobSearchBrief">
										<img src="<?php echo get_template_directory_uri() ?>/images/search-white.svg" alt="search-white" class="p-2">
									</div>
									<div class="col-12 pr-md-0 pr-lg-0 col-lg-5 col-md-5">
										<select class="selectpicker w-100" data-size="5" data-style="p-14 border text-white border-top-0 border-right-0 border-left-0 br-2 rounded-0 ">
											<option class="p-11" value="a-z">Alphabetical (A-Z)</option>
											<option class="p-11" value="z-a">Alphabetical (Z-A)</option>
										</select>
									</div>
								</div>
								<div class="position-absolute w-100 bg-color2 d-none z-9" id="mobSearchBriefBar">
									<div class="d-flex py-1">
										<div class="align-self-center" id="mobSearchBriefback">
											<img src="<?php echo get_template_directory_uri() ?>/images/mobile_back_arrow.svg" alt="back button" class="px-2 w-100">
										</div>
										<input type="search" class="d-md-block d-lg-block form-control text-white search no-border-radius bg-transparent rounded-0 border-top-0 border-right-0 border-left-0" placeholder="Search" aria-label="Search" data-search="@text" data-target=".sanchar_briefs .data-card"
											data-hide-class="d-none" data-search-name="sanchar_briefs_search">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="px-xl-5 px-3">
  <div class="px-1 px-md-5 pt-4">
    <?php 
      // This fragment is to get the WordPress body content into this page
      $post = get_post($pid);
      $post_body = $post->post_content;
      echo apply_filters( 'the_content', get_post_field('post_content', $paged->ID) );
    ?>
  </div>
  <div class="no-sanchar-data-available d-none font-chivo font-weight-bold display-3 px-5">
    <span class="sm5 d-block">No Data Available</span>
  </div>
  <div class="row custom-px-1 sanchar_briefs pb-5 mb-5 px-1 px-md-5 search_sanchar_row">
    <!-- Loop starts here.. -->
    <?php the_content();?>
    <!-- Loop closes here.. -->
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
$('.selectpicker').on('changed.bs.select', function(e) {
	   

    var sortby = this.options[this.selectedIndex].value;
    sortbyfunc(".data-card",".search_sanchar_row", sortby )

    
  });
sortbyfunc(".data-card",".search_sanchar_row", "a-z" );
</script>
