<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php wp_title(' ', true, 'right'); ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="shortcut icon" type="<?php echo get_template_directory_uri() ?>/image/png" href="<?php echo get_template_directory_uri() ?>/images/favicon.png"/>

<link href="https://fonts.googleapis.com/css?family=Chivo:400,700&display=swap" rel="stylesheet">
<link href="<?php echo get_template_directory_uri() ?>/css/bootstraptheme.css" rel="stylesheet" />
<link href="<?php echo get_template_directory_uri() ?>/css/all.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap-select.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/noty.css">
<link href="<?php echo get_stylesheet_uri();?>" rel="stylesheet" />


<?php wp_head();?>
</head>
<body class="h-100 bg-2">
	<header class="bg-danger position-fixed z-9 w-100">
		<div class="container px-md-3 px-0 py-2">
      <div class="row">
        <div class="col-md-4">
          <figure class=" mt-3 d-block">
          <?php
          $custom_logo_id = get_theme_mod ( 'custom_logo' );
          $logo = wp_get_attachment_image_src ( $custom_logo_id, 'full' );
          $mainlogo = get_template_directory_uri () . "/images/sanchar_logo.svg";
          $india_center_logo = get_template_directory_uri () . "/images/india_center_logo.svg";
          if (has_custom_logo ()) {
            $mainlogo = esc_url ( $logo [0] );
          }
          ?>
            <a href="/"> <img src="<?php echo $mainlogo; ?>" alt="logo" class="img-fluid d-none d-md-block"> <img src="<?php echo $mainlogo; ?>" alt="Project Sanchar logo" class="img-fluid d-md-none">
            </a>
          </figure>
        </div>
        <div class="col-md-3 offset-md-5">
				<?php dynamic_sidebar('Banner Widgets'); ?>
          <!--
          <a class="india-center-logo float-right" href="https://www.hsph.harvard.edu/india-center/" target="_blank" rel="noopener noreferrer">
            <img src="<?php //echo $india_center_logo; ?>" alt="Harvard TH Chan India Center logo" class="img-fluid" />
          </a>
          -->
        </div>
      </div>
		</div>
		<div class="w-100 z-9 bg-white " id="nav">
			<div class="d-flex justify-content-between align-items-center d-md-none position-relative py-3 mobile-menu-container">
				<div class="position-absolute ">
					<div id="mobile-menu" class="d-md-none px-3 py-3">
						<img src="<?php echo get_template_directory_uri() ?>/images/menu.svg" alt="menu" />
					</div>
				</div>
				<div class="flex-grow-1 text-center">
					<!--<p class="mb-0 font-weight-bold font-chivo text-danger text-capitalize f-18"><?php //the_title();?></p>-->
					<p class="mb-0 font-weight-bold font-chivo text-danger text-capitalize f-18">Main menu</p>
				</div>
			</div>
			<div id="mySidenav" class="sidenav display-3 mb-0">
				<ul class="nav d-block d-md-flex text-center font-chivo w-100 justify-content-center mx-auto px-3 px-md-0 font-weight-bold bg-white shadow py-2">
					<?php
					if (has_nav_menu ( 'header-menu' )) {
						echo wp_nav_menu ( array (
								'theme_location' => 'header-menu',
								'container' => false,
								'menu_class' => 'navbar-nav nav-item',
								'fallback_cb' => '__return_false',
								'items_wrap' => '%3$s',
								'depth' => 0,
								'walker' => new bootstrap_4_walker_nav_menu () 
						) );
					}
					?>
				</ul>
			</div>
		</div>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-145103114-1"></script>
		<script>
// This script for tracking cut/copy/paste in Google Analytics is provided as it is, and was put together by Eivind Savio January 2013. Happy tracking!
// Script from Motyar
  function getSelected() {
    if(window.getSelection) {return window.getSelection();}
      else if(document.getSelection) {return document.getSelection();}
    else {
    var selection = document.selection && document.selection.createRange();
    if(selection.text) { return selection.text; }
    return false;
    }
  return false;
  }
// End script from Motyar

    /* global dataLayer */
    window.dataLayer = window.dataLayer || []
    function gtag(){dataLayer.push(arguments)}
    gtag('js', new Date())
    gtag('config', 'UA-145103114-1')
// Cut/copy/paste main script
  jQuery(document).ready(function() {
    jQuery('body').on('copy cut paste', function(ccp) { // Track cut, copy or paste with jQuery.
    var selection = getSelected();
    var maxLength = 150; // Up to 150 Characters from your text will be tracked. Change this number if you want to track more or less text.
      if(selection && (selection = new String(selection).replace(/^\s+|\s+$/g,''))) {
      var textLength = selection.length; // How many characters was copied/cutted/pasted.
        if (selection.length > maxLength) {
          selection = selection.substr(0, maxLength) + "..."} // If the text is longer than maxLength, add ... to the end of the text
        else { 
          selection = selection; // If the text is shorter than maxLength, just track the text as it is.
        }
// I'm using the event's value in the "action" param to make it quicker/easier to find in GA
    gtag('event', selection, { 'event_category' : 'Cut/copy/paste' }); 
// Track copied/cutted/pasted data in Google Analytics as Events
      }
    });// body.on
  }); //document.ready

  </script>
<script>

</script>

	</header>
	<!-- TODO: Filter bars -->
