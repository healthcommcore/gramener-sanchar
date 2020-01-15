<?php
if (function_exists ( 'register_sidebar' )) {
    register_sidebar ( array (
        'name' => 'Banner Widgets',
        'id' => 'banner-widgets',
        'description' => 'Widget Area',
        'before_widget' => '<div class="banner-widget">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
    ) );
    register_sidebar ( array (
        'name' => 'Home Widgets',
        'id' => 'home-widgets',
        'description' => 'Widget Area',
        'before_widget' => '<div class="card border-muted rounded-0">',
        'after_widget' => '</div></div></div>',
        'before_title' => '<div class="card-header bg-transparent border-warning rounded-0"><h4 class="card-title">',
        'after_title' => '</h4></div><div class="card-body"><div class="card-text">'
    ) );
    register_sidebar ( array (
        'name' => 'Social Widget',
        'id' => 'social-widget',
        'description' => 'Widget for displaying social icons',
        'before_widget' => '<li class="nav-item pl-md-3">',
        'after_widget' => '</li>',
        'before_title' => '',
        'after_title' => ''
    ) );
    register_sidebar ( array (
        'name' => 'Home carousel',
        'id' => 'home-carousel',
        'description' => 'Put homepage carousel in this widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''
    ) );
    register_sidebar ( array (
        'name' => 'Home Text',
        'id' => 'home-text',
        'description' => 'Widget for displaying Home Text',
        'before_widget' => '<h3 class="mb-0 lh-1 f-14 home-text-widget">',
        'after_widget' => '</h3>',
        'before_title' => '',
        'after_title' => ''
    ) );
    register_sidebar ( array (
        'name' => 'Visualization action',
        'id' => 'visualization-action',
        'description' => 'Title and button to go to visualization portal',
        'before_widget' => '<div class="bg-white px-4 pb-4 pt-3">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="mb-3">',
        'after_title' => '</h5>'
    ) );

    register_sidebar ( array (
        'name' => 'Home Signup',
        'id' => 'home-signup',
        'description' => 'Signup Widget Area',
        'before_widget' => '<div class="bg-white px-4 pb-4 pt-3">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="mb-3">',
        'after_title' => '</h5>'
    ) );
    register_sidebar ( array (
        'name' => 'Footer Text',
        'id' => 'footer-text',
        'description' => 'Footer text',
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '',
        'after_widget' => ''
        
    ) );
    register_sidebar ( array (
        'name' => 'Get in Touch',
        'id' => 'getintouch',
        'description' => 'Get in Touch widget to display in contact us page',
        'before_title' => '<h4 class="font-chivo font-weight-bold mb-0 get-in-touch-heading">',
        'after_title' => '</h4>',
        'before_widget' => '<div class="pt-4">',
        'after_widget' => '</div>'
        
    ) );
    register_sidebar ( array (
        'name' => 'Address',
        'id' => 'addresswidget',
        'description' => 'Address widget to display in contact us page',
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '<div class="mt-2">',
        'after_widget' => '</div>'
        
    ) );
    register_sidebar ( array (
        'name' => 'About Datasets',
        'id' => 'about-datasets',
        'description' => 'Widget for displaying about datasets',
        'before_widget' => '<a class="nav-item text-decoration-none" href="http://rchiips.org/nfhs/" target="_blank" rel="noopener"> ',
        'after_widget' => '</a>',
        'before_title' => '',
        'after_title' => '<h3 class="mb-0 display-3"><span class="d-block text-color7 opacity-70 sm5 f-14">http://rchiips.org/nfhs/</span>'
    ) );
    
}
class Social_Widget extends WP_Widget {
    public function __construct() {
        $widget_ops = array (
            'classname' => 'social_widget',
            'description' => 'A Widget for Social icons'
        );
        parent::__construct ( 'social_widget', 'Social Widget', $widget_ops );
    }
    public function widget($args, $instance) {
        echo $args['before_widget'];
        $title =  $instance['title'];
        $url =  $instance['url'];
        $imgpath =  $instance['imgpath'];
        echo '<a class="nav-link p-0" href="'.$url.'" target="_blank" rel="noopener">';
        echo '<figure class="mb-0 d-block">';
        echo '<img src="'.get_template_directory_uri().'/images/'.$imgpath.'" alt="'.$title.'">';
        echo '</figure>';
        echo '</a>';
        echo $args['after_widget'];
    }
    public function form($instance) {
        $title = ! empty ( $instance ['title'] ) ? $instance ['title'] : esc_html__ ( '', 'text_domain' );
        $imgpath = ! empty ( $instance ['imgpath'] ) ? $instance ['imgpath'] : esc_html__ ( '', 'text_domain' );
        $url = ! empty ( $instance ['url'] ) ? $instance ['url'] : esc_html__ ( '', 'text_domain' );
        echo '<p><label for="';
        echo esc_attr( $this->get_field_id( 'title' ) );
        echo '">';
        echo esc_attr_e( "Title:", "text_domain" );
        echo '</label>';
        echo '<input class="widefat" id="'. esc_attr( $this->get_field_id( 'title' ) ).'" name="'. esc_attr( $this->get_field_name( 'title' ) ).'"	type="text" value="'.esc_attr( $title ).'">';
        echo '</p>';
        
        
        echo '<p><label for="';
        echo esc_attr( $this->get_field_id( 'url' ) );
        echo '">';
        echo esc_attr_e( "URL:", "text_domain" );
        echo '</label>';
        echo '<input class="widefat" id="'. esc_attr( $this->get_field_id( 'url' ) ).'" name="'. esc_attr( $this->get_field_name( 'url' ) ).'"	type="text" value="'.esc_attr( $url ).'">';
        echo '</p>';
        
        echo '<p><label for="';
        echo esc_attr( $this->get_field_id( 'imgpath' ) );
        echo '">';
        echo esc_attr_e( "Image Path:", "text_domain" );
        echo '</label>';
        echo '<input class="widefat" id="'. esc_attr( $this->get_field_id( 'imgpath' ) ).'" name="'. esc_attr( $this->get_field_name( 'imgpath' ) ).'"	type="text" value="'.esc_attr( $imgpath).'">';
        echo '</p>';
    }
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
        $instance['imgpath'] = ( ! empty( $new_instance['imgpath'] ) ) ? strip_tags( $new_instance['imgpath'] ) : '';
        
        return $instance;
    }
}
class Registrtion_Widget extends WP_Widget {
    public function __construct() {
        $widget_ops = array (
            'classname' => 'registrtion_widget',
            'description' => 'A Widget for Registrtion'
        );
        parent::__construct ( 'registrtion_widget', 'Registrtion Widget', $widget_ops );
    }
    public function widget($args, $instance) {
        echo $args['before_widget'];
        $title =  $instance['title'];
        $description =  $instance['description'];
        $url =  $instance['url'];
        $imgpath =  $instance['imgpath'];
       
       // echo '<a class="nav-link p-0" href="'.$url.'" target="_blank" rel="noopener">';
        echo '<div class="">';
        echo '<h3 class="text-danger font-chivo">';
        echo $args['before_title'] . $title . $args['after_title'];
        echo '</h3>';
        echo '<h3 class="mb-0 d-none display-3 d-md-block d-lg-block"><span class="d-block text-color7 opacity-70 sm5 f-18">';
        echo $args['before_description'] . $description . $args['after_description'];
        echo '</h3></span>';
        echo '</div>';
        echo '<ul class="nav align-self-start">';
        echo '<li class="nav-item">';
        echo '<a class="nav-link p-0" href="'.$url.'" target="_blank" rel="noopener">';
        echo '<figure class="mb-0">';
        echo '<img src="'.get_template_directory_uri().'/images/'.$imgpath.'" alt="'.$title.'">';
        echo '</figure>';
        echo '</li>';
        echo '</ul>';
        echo '</a>';
        
        echo $args['after_widget'];
    }
    public function form($instance) {
        $title = ! empty ( $instance ['title'] ) ? $instance ['title'] : esc_html__ ( '', 'text_domain' );
        $description = ! empty ( $instance ['description'] ) ? $instance ['description'] : esc_html__ ( '', 'text_domain' );
        $imgpath = ! empty ( $instance ['imgpath'] ) ? $instance ['imgpath'] : esc_html__ ( '', 'text_domain' );
        $url = ! empty ( $instance ['url'] ) ? $instance ['url'] : esc_html__ ( '', 'text_domain' );
        
        echo '<p><label for="';
        echo esc_attr( $this->get_field_id( 'title' ) );
        echo '">';
        echo esc_attr_e( "Title:", "text_domain" );
        echo '</label>';
        echo '<input class="widefat" id="'. esc_attr( $this->get_field_id( 'title' ) ).'" name="'. esc_attr( $this->get_field_name( 'title' ) ).'"	type="text" value="'.esc_attr( $title ).'">';
        echo '</p>';
        
        
        echo '<p><label for="';
        echo esc_attr( $this->get_field_id( 'discription' ) );
        echo '">';
        echo esc_attr_e( "Description:", "text_domain" );
        echo '</label>';
        echo '<input class="widefat" id="'. esc_attr( $this->get_field_id( 'description' ) ).'" name="'. esc_attr( $this->get_field_name( 'description' ) ).'"	type="text" value="'.esc_attr( $description ).'">';
        echo '</p>';
        
        
        echo '<p><label for="';
        echo esc_attr( $this->get_field_id( 'url' ) );
        echo '">';
        echo esc_attr_e( "URL:", "text_domain" );
        echo '</label>';
        echo '<input class="widefat" id="'. esc_attr( $this->get_field_id( 'url' ) ).'" name="'. esc_attr( $this->get_field_name( 'url' ) ).'"	type="text" value="'.esc_attr( $url ).'">';
        echo '</p>';
        
        echo '<p><label for="';
        echo esc_attr( $this->get_field_id( 'imgpath' ) );
        echo '">';
        echo esc_attr_e( "Image Path:", "text_domain" );
        echo '</label>';
        echo '<input class="widefat" id="'. esc_attr( $this->get_field_id( 'imgpath' ) ).'" name="'. esc_attr( $this->get_field_name( 'imgpath' ) ).'"	type="text" value="'.esc_attr( $imgpath).'">';
        echo '</p>';
    }
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
        $instance['imgpath'] = ( ! empty( $new_instance['imgpath'] ) ) ? strip_tags( $new_instance['imgpath'] ) : '';
        
        return $instance;
    }
}
