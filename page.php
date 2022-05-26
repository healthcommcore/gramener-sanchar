<?php get_header();?>
    <?php
				while ( have_posts () ) :
					the_post ();
					$pid = get_the_ID ();
					$category = get_the_category ( $pid );
					$categoryterm = $category [0]->term_id;
					$categoryname = $category [0]->cat_name;
					if ($categoryterm != "") {
						if ($categoryname == "About") {
							include (locate_template ( 'templates/pageabout.php', false, false ));
            }
						else if ($categoryname == "About Hindi") {
							include (locate_template ( 'templates/pageabouthindi.php', false, false ));
						} else if (get_the_title() == "Visualization Portal") {
							include (locate_template ( 'templates/page2column.php', false, false ));
						} else {
							include (locate_template ( 'templates/page2column.php', false, false ));
						}
					} else if (get_the_title () == "Sign Up") {
						include (locate_template ( 'templates/pagecontact.php', false, false ));
					} else {
						//include (locate_template ( 'templates/page1column.php', false, false ));
						include (locate_template ( 'templates/defaultpage.php', false, false ));
					}
					// echo $categoryname."___________________________________________________________________________".$categoryname;
				endwhile
				;
				// End of the loop.
				?> 
 
<?php get_footer();?>
