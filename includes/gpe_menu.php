<?php
class bootstrap_4_walker_nav_menu extends Walker_Nav_menu {
	function start_lvl(&$output, $depth = 0, $args = array()) { // ul
		$indent = str_repeat ( "\t", $depth ); // indents the outputted HTML
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) { // li a span
		$indent = ($depth) ? str_repeat ( "\t", $depth ) : '';
		$li_attributes = '';
		$active = "";
		
		if(in_array("current-menu-parent", $item->classes)){
			$active = "active";
		}
		
		
		$class_names = $value = '';
		$classes = empty ( $item->classes ) ? array () : ( array ) $item->classes;
		
		$classes [] = ($args->walker->has_children) ? 'dropdown' : '';
		if($item->current || $item->current_item_anchestor){
			$classes [] =   'active' ;
			$active = "active";
		}else{
			$classes [] =  '';
		}
		
		$classes [] = " ".$active." ";
		$classes [] = 'nav-item mr-lg-3 ';
		$classes [] = 'nav-item-' . $item->ID;
		if ($depth && $args->walker->has_children) {
			$classes [] = 'dropdown-menu shadow-sm border-0 mt-2 rounded-0 font-chivo';
		}
		$class_names = join ( ' ', apply_filters ( 'nav_menu_css_class', array_filter ( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr ( $class_names ) . '"';
		$id = apply_filters ( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = strlen ( $id ) ? ' id="' . esc_attr ( $id ) . '"' : '';
		$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
		$attributes = ! empty ( $item->attr_title ) ? ' title="' . esc_attr ( $item->attr_title ) . '"' : '';
		$attributes .= ! empty ( $item->target ) ? ' target="' . esc_attr ( $item->target ) . '"' : '';
		$attributes .= ! empty ( $item->xfn ) ? ' rel="' . esc_attr ( $item->xfn ) . '"' : '';
		$attributes .= ! empty ( $item->url ) ? ' href="' . esc_attr ( $item->url ) . '"' : '';
		//$attributes .= ($args->walker->has_children) ? ' class="nav-link dropdown-toggle sm5 main-menu-color" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link sm5 main-menu-color"';
		
		if($args->walker->has_children){
			$attributes .= ' class="nav-link dropdown-toggle sm5 ';
			if($active == "active"){
				$attributes .= ' text-danger ';
			}else{
				$attributes .= 'main-menu-color ';
			}
			
			$attributes .= '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
		}else{
			$attributes .= ' class="nav-link sm5 ';
			if($active == "active"){
				$attributes .= ' text-danger ';
			}else{
				$attributes .= ' main-menu-color ';
			}
			//$attributes .= 'main-menu-color ';
			$attributes .= '"';
		}
		
	  $has_dropdown_menu = preg_match('/(dropdown-menu)/', $class_names);	
		$item_output = $args->before;
		$item_output .= ($depth > 0 && !$has_dropdown_menu) ? '<a class="dropdown-item main-menu-color font-weight-bold py-2"' . $attributes . '>' : '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters ( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
