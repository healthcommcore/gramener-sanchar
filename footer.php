<footer class="bg-white py-4 w-100 box-1">
<!--<footer class="bg-white py-4 w-100 box-1 position-fixed z-9">-->
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
<script src="<?php echo get_template_directory_uri() ?>/js/common.js"></script>
<?php wp_footer();?>
</body>
</html>
