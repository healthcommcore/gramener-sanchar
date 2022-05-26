
<?php
get_header ();
$blogargs = array (
		'post_type' => "homeslider" ,
        'order' => 'ASC'
);
$homeslider = get_posts ( $blogargs );

?>
<main class="border-bottom pb-2"  style="padding-top: 105px;">
<div class="homeslider" style="">
   <div class="extra-homeslider">
	   
	  <div id="homeslider" class="carousel slide" data-ride="carousel">
	  
		<div class="carousel-inner">
			<?php
			$i = 0;
			foreach ( $homeslider as $slide ) {
				
				$class = "";
				if ($i == 0) {
					$class = "active";
				}
				?>
			<div class="carousel-item <?php echo $class; ?>">
				<div class="imageHolder grad-image">
				<img src="<?php echo get_the_post_thumbnail_url($slide->ID, 'slider-big'); ?>" alt="<?php echo $slide->post_title; ?>" class="d-md-block d-lg-block d-none w-100">
				</div>
				<div class="carousel-caption  text-left  container ">
							<h3 class="mb-0 lh-4 font-chivo f-28 font-weight-bold">
					<span class="mb-0 d-block"><?php 
					$title = explode( " ",$slide->post_title,2);
					
						
					echo $title[0]."<br/>".$title[1]; 
					
					?></span></h3>
					<a class="nav-link text-warning px-0 py-0 py-md-1 font-weight-bold" href="<?php  echo  get_post_meta ( $slide->ID, 'homesliderurl', true )?>">read more</a>
				</div>
			</div>
				<?php
				$i ++;
			}
			?>
			
		</div>
		
		<ol class="carousel-indicators">
    			<?php
    			$i = 0;
    			
    			foreach ( $homeslider as $slide ) {
    				$class = "";
    				if ($i == 0) {
    					$class = "active";
    				}
    				echo '<li data-target="#homeslider" data-slide-to="' . $i . '" class="' . $class . '"></li>';
    				$i ++;
    			}
    			?>
    			
    	</ol>
   </div>
 </div>
 
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
