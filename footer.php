<footer class="bg-white  py-4 w-100 box-1 position-fixed d-none z-9">
	<div class="container my-2">
		<div class="row">
			<div class="col">
				<div class="d-md-flex justify-content-md-between justify-content-start align-items-center">
					<ul class="nav d-block d-md-flex text-uppercase text-color8 h3 mb-0  text-md-left">
						<li class="nav-item sm3 pb-2 pb-md-0">2019</li>
						<li class="nav-item sm3 px-2 d-none d-md-block">|</li>
						<li class="nav-item   pb-2 pb-md-0 sm3"><?php  dynamic_sidebar('Footer Text') ; ?></li>
					</ul>
					<ul class="nav text-uppercase text-color8 justify-content-start justify-content-md-end">
							<?php  dynamic_sidebar('Social Widget') ; ?>
						</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<style>
.noty_effects_close {
	display: none !important;
}
</style>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/bootstrap-select.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/g1.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/lodash.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/noty.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/sticky-header.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/helper.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/data_portal.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/common.js"></script>
<?php wp_footer();?>
<style>
.textwidget p {
	margin: 0px !important;
}
</style>
<script>
	$( document ).ready(function() {
		 var url = new URL(window.location.href);
		$('[data-spy="scroll"]').each(function (i,spy) {
			  $(spy).scrollspy('refresh');

			 
				var view = url.searchParams.get("view");
				if (window.screen.availWidth < 768) {
					$('main').animate({
				        scrollTop: $("#"+view)[0].offsetTop - $('.navbar-nav-scroll').height()
				      }, 500);
				}else{
					$('main').animate({
				        scrollTop: $("#"+view)[0].offsetTop
				      }, 500);
				}
				$(".nav-pills a").removeClass('active')
			    $(".nav-pills ."+view).addClass('active')
		    });
		
	    /* url.update({
	      view: view.replace(/#/g, '')
	    }) */
	    
	    
	});
	
	$(".close-frm").on("click", function(){
		$(".response-frm-submit").hide();
		});

	$(document)
	  .on('click', 'a[href^="#"]', function (event) {
	    event.preventDefault()
	    if (window.screen.availWidth < 768) {
	      $('main').animate({
	        scrollTop: $($.attr(this, 'href'))[0].offsetTop - $('.navbar-nav-scroll').height()
	      }, 500)
	    } else {
	      $('main').animate({
	        scrollTop: $($.attr(this, 'href'))[0].offsetTop
	      }, 500)
	    }
	    $(".nav-pills a").removeClass('active')
	    $(".nav-pills a[href='" + $.attr(this, 'href') + "']").addClass('active')
	    url.update({
	      view: $(this).attr('href').replace(/#/g, '')
	    })
	    history.pushState({}, '', url.toString())
	  })
	  
	  
	  

	</script>
</body>
</html>
