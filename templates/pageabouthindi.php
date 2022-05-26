<!-- HINDI ABOUT -->
<main class="two border-bottom data_portal-no vh-100 overflow-auto">
<div class="d-xl-flex position-relative h-100">
	<div class="  left-panel bg-color4  navbar-nav-scroll col-md-3 px-0 overflow-auto col-lg-3 ">
	</div>
	<div class="col-md-9 ml-md-auto px-0 pl-md-0 pb-5 mb-5 col-lg-9">
		<div class="px-md-5 bg-color5">
			<div class="px-4 px-md-5 pb-5 mb-5" style="position: relative;">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php get_the_title(); ?>
        <?php 
          if( has_post_thumbnail() ) {
            the_post_thumbnail('full');
          }
        ?>
        <?php echo the_content(); ?>
      </div>
		</div>
	</div>
</div>
</main>

<script>
	
	
	
</script>
