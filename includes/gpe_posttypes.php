<?php
function create_customposts() {
	register_post_type ( 'homeslider', array (
			'labels' => array (
					'name' => __ ( 'Home Slider', 'gsanchar' ),
					'slug' => 'slider',
					'singular_name' => __ ( 'Home Slider', 'gsanchar' ),
					'add_new_item' => __ ( 'Add New Slider', 'gsanchar' ),
					'edit' => __ ( 'Edit', 'gsanchar' ),
					'edit_item' => __ ( 'Edit Slider', 'gsanchar' ),
					'new_item' => __ ( 'New Slider', 'gsanchar' ),
					'view' => __ ( 'View Sliders', 'gsanchar' ),
					'view_item' => __ ( 'View Slider', 'gsanchar' ),
					'search_items' => __ ( 'Search Slider', 'gsanchar' ),
					'not_found' => __ ( 'No Sliders found', 'gsanchar' ),
					'not_found_in_trash' => __ ( 'No Sliders found in Trash', 'gsanchar' ) 
			),
			'public' => true,
			'publicly_queryable' => false,
			'show_in_nav_menus' => false,
			'show_ui' => true,
			'exclude_from_search' => true,
			'hierarchical' => false,
			'rewrite' => false,
			'query_var' => true,
			'supports' => array (
					'title',
					'thumbnail' 
			) 
	) );
	register_post_type ( 'teammembers', array (
			'labels' => array (
					'name' => __ ( 'Team Members', 'gsanchar' ),
					'slug' => 'teammembers',
					'singular_name' => __ ( 'Team Member', 'gsanchar' ),
					'add_new_item' => __ ( 'Add New Member', 'gsanchar' ),
					'edit' => __ ( 'Edit', 'gsanchar' ),
					'edit_item' => __ ( 'Edit Member', 'gsanchar' ),
					'new_item' => __ ( 'New Member', 'gsanchar' ),
					'view' => __ ( 'View Members', 'gsanchar' ),
					'view_item' => __ ( 'View Member', 'gsanchar' ),
					'search_items' => __ ( 'Search Member', 'gsanchar' ),
					'not_found' => __ ( 'No Members found', 'gsanchar' ),
					'not_found_in_trash' => __ ( 'No Members found in Trash', 'gsanchar' ) 
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => false,
			'show_ui' => true,
			'exclude_from_search' => false,
			'hierarchical' => false,
			'rewrite' => false,
			'query_var' => true,
			'supports' => array (
					'title',
					'editor',
					'thumbnail',
					'excerpt' 
			) 
	) );
	register_post_type ( 'otherlink', array (
			'labels' => array (
					'name' => __ ( 'OtherLinks', 'gsanchar' ),
					'slug' => 'otherlink',
					'singular_name' => __ ( 'Team Otherlink', 'gsanchar' ),
					'add_new_item' => __ ( 'Add New Otherlink', 'gsanchar' ),
					'edit' => __ ( 'Edit', 'gsanchar' ),
					'edit_item' => __ ( 'Edit Otherlink', 'gsanchar' ),
					'new_item' => __ ( 'New Otherlink', 'gsanchar' ),
					'view' => __ ( 'View Otherlink', 'gsanchar' ),
					'view_item' => __ ( 'View Otherlink', 'gsanchar' ),
					'search_items' => __ ( 'Search Otherlink', 'gsanchar' ),
					'not_found' => __ ( 'No Otherlinks found', 'gsanchar' ),
					'not_found_in_trash' => __ ( 'No Otherlinks found in Trash', 'gsanchar' ) 
			),
			'public' => true,
			'publicly_queryable' => false,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'hierarchical' => false,
			'has_archive' => true,
			'rewrite' => false,
			'query_var' => true,
			'supports' => array (
					'title',
					'thumbnail',
					'excerpt' 
			) 
	) );
	register_post_type ( 'aboutdatasets', array (
			'labels' => array (
					'name' => __ ( 'About Datasets', 'gsanchar' ),
					'slug' => 'aboutdatasets',
					'singular_name' => __ ( 'About Datasets', 'gsanchar' ),
					'add_new_item' => __ ( 'Add New About Datasets', 'gsanchar' ),
					'edit' => __ ( 'Edit', 'gsanchar' ),
					'edit_item' => __ ( 'Edit About Dataset', 'gsanchar' ),
					'new_item' => __ ( 'New About Dataset', 'gsanchar' ),
					'view' => __ ( 'View About Datasets', 'gsanchar' ),
					'view_item' => __ ( 'View About Dataset', 'gsanchar' ),
					'search_items' => __ ( 'Search About Dataset', 'gsanchar' ),
					'not_found' => __ ( 'No About Datasets found', 'gsanchar' ),
					'not_found_in_trash' => __ ( 'No About Datasets found in Trash', 'gsanchar' ) 
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => false,
			'show_ui' => true,
			'exclude_from_search' => false,
			'hierarchical' => false,
			'rewrite' => false,
			'query_var' => true,
			'supports' => array (
					'title',
					'editor',
					'thumbnail',
					'excerpt' 
			) 
	) );
	register_post_type ( 'figuresandcharts', array (
			'labels' => array (
					'name' => __ ( 'Figures and Charts', 'gsanchar' ),
					'slug' => 'figuresandcharts',
					'singular_name' => __ ( 'Figures and Chart', 'gsanchar' ),
					'add_new_item' => __ ( 'Add New Figures and Chart', 'gsanchar' ),
					'edit' => __ ( 'Edit', 'gsanchar' ),
					'edit_item' => __ ( 'Edit Figures and Chart', 'gsanchar' ),
					'new_item' => __ ( 'New Figures and Chart', 'gsanchar' ),
					'view' => __ ( 'View Figures and Charts', 'gsanchar' ),
					'view_item' => __ ( 'ViewFigures and Chart', 'gsanchar' ),
					'search_items' => __ ( 'Search Figures and Chart', 'gsanchar' ),
					'not_found' => __ ( 'No Figures and Charts found', 'gsanchar' ),
					'not_found_in_trash' => __ ( 'No Figures and Charts found in Trash', 'gsanchar' ) 
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => false,
			'show_ui' => true,
			'exclude_from_search' => false,
			'hierarchical' => false,
			'rewrite' => false,
			'query_var' => true,
			'supports' => array (
					'title',
					'thumbnail',
					'excerpt' 
			) 
	) );
	
	register_post_type ( 'experts', array (
			'labels' => array (
					'name' => __ ( 'Experts', 'gsanchar' ),
					'slug' => 'experts',
					'singular_name' => __ ( 'Expert', 'gsanchar' ),
					'add_new_item' => __ ( 'Add New Expert', 'gsanchar' ),
					'edit' => __ ( 'Edit', 'gsanchar' ),
					'edit_item' => __ ( 'Edit Expert', 'gsanchar' ),
					'new_item' => __ ( 'New Expert', 'gsanchar' ),
					'view' => __ ( 'View Experts', 'gsanchar' ),
					'view_item' => __ ( 'View Experts', 'gsanchar' ),
					'search_items' => __ ( 'Search Experts', 'gsanchar' ),
					'not_found' => __ ( 'No Expert found', 'gsanchar' ),
					'not_found_in_trash' => __ ( 'No Expert found in Trash', 'gsanchar' )
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => false,
			'show_ui' => true,
			'exclude_from_search' => false,
			'hierarchical' => false,
			'rewrite' => false,
			'query_var' => true,
			'supports' => array (
					'title',
					'thumbnail',
					'excerpt',
					'editor'
			)
	) );
}
