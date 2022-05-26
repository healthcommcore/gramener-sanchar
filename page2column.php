<main class="two border-bottom data_portal-no vh-100 overflow-auto " style="padding-top: 110px;">
<div class="d-xl-flex position-relative">
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
		<div class="px-md-5 bg-color5">
			<div class="px-4 px-md-5 pb-5 mb-5">
				<div id="about" class="items-full pt-0 pt-md-4">
					<div class="card border-0 bg-transparent pb-4 text-color6">
						<h3 class="font-weight-bold font-chivo text-color14 mb-4 pt-2 pt-md-0 pt-lg-0"><?php echo the_title(); ?> </h3>
                		<?php
																		if (has_post_thumbnail ()) {
																			echo '<figure class="mb-4 ">';
																			the_post_thumbnail ();
																			echo '</figure>';
																		}
                    ?>
						
						
						<?php echo the_content(); 
						
						
						if(trim(get_the_title()) == "About Datasets"){
							echo '<div style="padding:0px !important;" class="d-flex  justify-content-between align-items-center px-xl-3 py-xl-2">';
							echo '<div class="bg-white mb-md-5 px-4 pb-4 pt-3 border-0 d-flex  justify-content-between align-items-center box-1" style="width:100%;">';
							dynamic_sidebar('About Datasets') ;
							echo '</div>';
							echo '</div>';
						}
						?>
						<?php 
							
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</main>

