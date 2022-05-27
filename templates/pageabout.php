<main class="two border-bottom data_portal-no vh-100 overflow-auto" data-spy="scroll" data-target="#myScrollspy">
<div class="d-xl-flex position-relative h-100">
	<div class="  left-panel bg-color4  navbar-nav-scroll col-md-3 px-0 overflow-auto col-lg-3 ">
		<ul class="nav-pills theme-pills ml-md-auto ml-lg-auto font-chivo py-md-4 nav d-md-flex flex-md-column py-0 mx-0
          flex-nowrap align-items-end col-9 pr-0 col-md-12 col-lg-8" id="myScrollspy">
          
          <?php
          								$args = array (
												'post_type' => 'page',
												'order' => 'ASC',
												'category' => $categoryterm 
										);
										$menulist = get_posts ( $args );
										
                    // This no longer works
										//$currentp = $_GET['view'];
										//debug($currentp);
                    $currentp = get_the_title();
										$urld = get_the_permalink(get_the_ID());
										
										foreach ( $menulist as $menu ) {
											$link = "#" . $menu->post_name;
											//$link = $urld."#".$menu->post_name;
											$active = ($currentp == $menu->post_name) ? "active" : "";
											echo '<li class="nav-item text-nowrap px-0 px-md-0 px-lg-0 col-md-12 p-0 text-center text-md-left">';
											echo '<a class=" '.$active.' nav-link px-3 text-color9 p-0 mr-md-4 mr-xl-0 my-xl-2 py-2 py-lg-0 text-center text-md-left col-lg-12 col-md-12 '.$menu->post_name.'" ';
											echo ' href="' . $link . '"><span class="opacity-50 f-14">' . $menu->post_title . '</span></a>';
											echo '</li>';
										}
										?>
        </ul>
	</div>
	<div class="col-md-9 ml-md-auto px-0 pl-md-0 pb-5 mb-5 col-lg-9">
		<div class="px-md-5 bg-color5">
			<div class="px-4 px-md-5 pb-5 mb-5" style="position: relative;">
          	<?php
					foreach ( $menulist as $paged ) {
			?>
					
					<div id="<?php echo $paged->post_name; ?>" class="items-full pt-0 pt-md-4">
					<div class="card border-0 bg-transparent pb-4 text-color6">
						<h3 class="font-weight-bold font-chivo text-color14 mb-4 pt-2 pt-md-0 pt-lg-0"><?php echo $paged->post_title;?> </h3>
						<figure class="mb-4 ">
							<?php 
								$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($paged->ID), 'post');
								if( !empty($thumb) && is_string($thumb[0]) ){
									echo '<img src="'.$thumb[0].'" alt="about-sanchar" class="w-100 d-none d-md-block d-lg-block">';
								}
							?>
                  			<!-- <img src="assets/img/mob_about.png" alt="about-sanchar" class="w-100 d-block d-md-none d-lg-none"> -->
						</figure>
						<?php 
						echo apply_filters( 'the_content', get_post_field('post_content', $paged->ID) );
						//echo $paged->post_content;
						?>
					</div>
				</div>
					<?php
											}
											?>
          </div>
		</div>
	</div>
</div>
</main>
<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri() ?>/js/about_us.js"></script>
	
