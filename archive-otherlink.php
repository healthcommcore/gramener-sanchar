<?php
get_header();
?>

<main class="border-bottom pb-2"  style="padding-top: 110px;">
	<div class="container">
	<div class="container products-res listing-data">
	
	<?php
        $blogargs = array (
          'post_type' => "otherlink",
         'numberposts' =>  54,
           // 'post_type'=> 'services',
            'order' => 'ASC'
        );
        $otherlinks = get_posts ( $blogargs );
    ?>
		    	<ul class="notes-img">
			<?php
			$i = 0;
			foreach ( $otherlinks as $otherlink ) {
				$class = "";
				if ($i == 0) {
					$class = "active";
				}
				
				?>
				<li>
			
				<h5><?php echo $otherlink->post_title; ?></h5></a>
			<p><?php echo wp_trim_words( $otherlink->post_content, 9 ) ;?></p>
				
			
	</li>
				<?php
				$i ++;
			}
			?>		 				
			</ul>
</div>
	

    
    </div>
    </main>
   
<?php get_footer();?>


