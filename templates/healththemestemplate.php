<?php
/**
 * Template Name: Sanchar Health Themes
 */
?> 
<?php
  get_header ();
  while ( have_posts () ) :
    the_post();
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
								<div class="pb-2 py-lg-2 pb-md-0 px-lg-5">
									<div class="d-flex align-items-center text-white pt-2 pt-md-0 col-5 col-md-5 col-lg-6 pr-md-0">
										<a class="carousel-control-prev position-relative w-auto ml-n3 opacity-90 back-to-health-themes cursor-pointer" href="<?php echo $backlink;?>"><img src="<?php echo get_template_directory_uri() ?>/images/back-button.svg" alt="back-button"></a>
                    <a class="d-block text-white backlink" href="<?php echo $backlink;?>">Back to SANCHAR briefs</a>
									</div>
                  <div class="ml-3 mt-2 ml-md-0">
                    <h2 class="mb-0 font-chivo font-weight-bold slider_title d-md-block"><?php echo the_title(); ?></h2>
										</div>
							</div>
						</div>
					</div>
					<!--slider end-->
				</div>
				<!--fixed end-->
			</div>

      <div class="px-xl-5 px-3">
        <div class="px-1 px-md-5 pt-4">
          <div id="sanchar-briefs-menu" class="pt-2 pb-4 sanchar-briefs-menu">
            <ul class="nav">
              <?php
              if (has_nav_menu ( 'sanchar-briefs-menu' )) {
                echo wp_nav_menu ( array (
                    'theme_location' => 'sanchar-briefs-menu',
                    'container' => false,
                    'menu_class' => 'navbar-nav nav-item',
                    'fallback_cb' => '__return_false',
                    'items_wrap' => '%3$s',
                    'depth' => 0
                ) );
              }
              ?>
            </ul>
          </div>
					
          <?php echo the_content(); ?>
        </div>
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

<?php
endwhile;
get_footer ();
?>
<script src="<?php echo get_template_directory_uri() ?>/js/data_portal.js"></script>

