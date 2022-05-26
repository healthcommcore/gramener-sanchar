<?php
require 'includes/gpe_widgets.php';
require 'includes/gpe_menu.php';
require 'includes/gpe_posttypes.php';
require 'includes/gpe_metaboxes.php';
require 'includes/gpe_curl.php';

/**
 * HCC ADDITION
 * 11/14/19
 */
wp_enqueue_style('hcc_styles', get_template_directory_uri() . '/css/hcc_styles.css');

function initializetheme() {
    register_taxonomy_for_object_type ( 'category', 'page' );
    register_nav_menu ( 'header-menu', __ ( 'Header Menu' ) );
    register_nav_menu ( 'sanchar-briefs-menu', __ ( 'SANCHAR briefs Menu' ) );
    create_taxonomies();
    create_customposts ();
}

function create_taxonomies(){
    $labels = array(
        'name' => _x( 'Experts Category', 'taxonomy general name' ),
        'singular_name' => _x( 'Experts Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Experts Category' ),
        'all_items' => __( 'All Experts Category' ),
        'parent_item' => __( 'Parent Experts Category' ),
        'parent_item_colon' => __( 'Parent Experts Category:' ),
        'edit_item' => __( 'Edit Experts Category' ),
        'update_item' => __( 'Update Experts Category' ),
        'add_new_item' => __( 'Add New Experts Category' ),
        'new_item_name' => __( 'New Type Experts Category' ),
        'menu_name' => __( 'Experts Category' ),
    );
    
    register_taxonomy('expertscategory',array('experts'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'expertcategory' ),
    ));
    
    
}

function get_posts_from_otherlinks() {
    // get posts from custom post type
    $otherargs = array (
        'post_type' => "otherlink",
        'order' => 'ASC',
        'numberposts' => '-1'
    );
    $otherlinksdata = get_posts ( $otherargs );
    // loop posts
    $output = "<div class='row'>";
    foreach ( $otherlinksdata as $data ) {
        $link = get_post_meta ( $data->ID, 'otherlink_meta_url', true );
        $output .= '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3 pr-xl-1">';
        $output .= '<div class="card py-3 border-0 shadow-sm h-100">';
        $output .= ' <div class="card-header bg-transparent border-0 px-3 py-0" style="height: 45px;">';
        $output .= '<div class="display-3 mb-0 font-weight-bold"><span class="sm5 d-block">';
        $output .= '<a href="' . $link . '" target="_blank" rel="noopener">' . $data->post_title . '</a>';
        $output .= '</span></div>';
        $output .= '</div>';
        $output .= '<div class="card-body px-3">';
        $output .= '<h3 class="mb-0"><span class="sm3 d-block">' . $data->post_excerpt . '</span></h3>';
        $output .= '                </div>';
        $output .= '<div class="card-footer bg-transparent border-0 px-3 pb-0 pt-2 h3 mb-0">';
        $output .= '</div>';
        $output .= '  </div>';
        $output .= '</div>';
    }
    $output .= '</div>';
    return $output;
}

function get_posts_from_people() {
    $peopleargs = array (
        'post_type' => "teammembers",
        'order' => 'ASC',
        'numberposts' => '-1'
    );
    $peopleargsdata = get_posts ( $peopleargs );
    $output = '';
    $output .= '<ul class="nav d-flex flex-column">';
    foreach ( $peopleargsdata as $pep ) {
        $designation = get_post_meta ( $pep->ID, 'team_member_designation', true );
        $thumb = wp_get_attachment_image_src ( get_post_thumbnail_id ( $pep->ID ), 'post' );
        $link = get_the_permalink ( $pep->ID );
        if ($thumb [0]) {
            // echo '<img src="'.$thumb[0].'" alt="about-sanchar" class="w-100 d-none d-md-block d-lg-block">';
        }
        $output .= '<li class="nav-item border-top py-5 people_item">';
        $output .= '<div class="row ">';
        $output .= '<div class="col-6 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3 pb-md-0 order-0">';
        $output .= '<figure class="mb-0">';
        $output .= '<a href="' . $link . '">';
        $output .= '      <img src="' . $thumb [0] . '" alt="person-image" class="img-fluid">';
        $output .= '</a>';
        $output .= '</figure>';
        $output .= '</div>';
        $output .= '<div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 order-2 order-md-1 order-lg-1">';
        $output .= '<div class="card h-100 border-0 bg-transparent">';
        $output .= '<div class="card-header py-0 px-0 pb-3 bg-transparent border-0">';
        $output .= '<div class="display-2 text-color6 font-weight-bold">';
        $output .= '<a class="sm5 d-block f-20" href="' . $link . '">' . $pep->post_title . '</a>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="card-body p-0 ">';
        $output .= '<ul class="nav flex-column">';
        $output .= '<li class="nav-item h3 mb-1"><span class="sm3 d-block font-weight-bold f-14">' . $designation . '</span>';
        $output .= '</li>';
        $output .= '</ul>';
        $output .= '<ul class="nav flex-column">';
        $output .= '<li class="nav-item h3 mb-3 mt-2"><span class="sm3 d-block f-14">' . $pep->post_excerpt . '</span></li>';
        $output .= '</ul>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="col-6 col-sm-12 col-md-1 col-lg-1 col-xl-1 align-self-center order-1 text-right order-md-2 order-lg-2 text-md-left text-lg-left">';
        $output .= '<a class="people-name cursor-pointer"  href="' . $link . '">';
        $output .= '<img src="' . get_template_directory_uri () . '/images/arrow-people.svg" alt="arrow-people"></a>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</li>';
    }
    $output .= '</ul>';
    return $output;
}
function debug($data) {
    echo "<pre>";
    print_r ( $data );
    echo "</pre>";
}
if (! (function_exists ( 'wp_get_attachment_by_post_name' ))) {
    function wp_get_attachment_by_post_name($post_name) {
        $args = array (
            'posts_per_page' => 1,
            'post_type' => 'attachment',
            'name' => trim ( $post_name )
        );
        $get_attachment = new WP_Query ( $args );
        if (! $get_attachment || ! isset ( $get_attachment->posts, $get_attachment->posts [0] )) {
            return false;
        }
        return $get_attachment->posts [0];
    }
}

// SANCHAR Briefs
function get_curl_briefs() {
    $output = ''; $upload_dir = wp_upload_dir ();
    $params = [ ];
    $curldata = getcurldata ( "indicator_names", $params );
    // debug($curldata);
    foreach ( $curldata as $indicator ) {
        $indicator = ( array ) $indicator;
        // debug($indicator);
        $output .= '<div class="data-card col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 pb-3 pr-xl-1">';
        $output .= '<div class="card pt-3 border-0 shadow-sm h-100">';
        $output .= '<div class="card-header bg-transparent border-0 px-3 pt-0">';
        $output .= '<div class="mb-4 text-color9 font-weight-bold font-chivo display-3">';
        $output .= '<span class="sm5 d-block f-16">' . $indicator ['Variable Name'] . '</span>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="card-body p-0"></div>';
        $output .= '<div class="card-footer  bgcolor10 border-0 px-3 h3 pb-2 pt-3 mb-0">';
        $output .= '<a class="text-center sm4 py-1 download-data px-md-0" href="' . $upload_dir ['baseurl'] . '/data/' . trim ( $indicator ['PDF'] ) . '.pdf" target="_blank" rel="noopener">';
        $output .= '<img src="/wp-content/uploads/2019/11/download.svg" alt="open-in-new-arrow" class="d-block mx-auto" /> <span class="d-block pt-1 text-color6 f-10">DOWNLOAD</span>';
        $output .= '</a>';
    /** OLD
        $output .= '<a class="bg-color10 d-flex justify-content-around sm3 nav-link text-primary  font-weight-bold justify-content-center  align-items-center" href="' . $upload_dir ['baseurl'] . '/data/' . trim ( $indicator ['PDF'] ) . '.pdf" target="_blank" rel="noopener">';
        $output .= '<img src="' . get_template_directory_uri () . '/images/download-arrow.svg" alt="download-arrow" /> <span class="f-14">Download SANCHAR Brief PDF</span>';
        $output .= '</a>';
    **/
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    }
    return $output;
}
function get_curldata_healththemes() {
    $params = [ ];
    $curldata = getcurldata ( "health_theme_names", $params );
    $dbkeys = array_keys ( ( array ) $curldata [0] );
    $output = '';
    $output .= '<div class="pb-4 ">';
    $output .= '<div class="row">';
    $output .= '<div class="col-md-6 col-lg-4 col-10 mx-auto ml-md-0 pb-3 pr-xl-1">';
    $output .= '<div class="round bg-white border h3 mb-0 pl-2 px-0 d-flex align-items-center pl-md-2">';
    $output .= '<div class="sm3 text-color6">DATABASE :</div>';
    $output .= '<div class="flex-fill">';
    $output .= '<select class="selectpicker sm3 w-100" data-size="5" data-style="border br-2 p-14 border-0 text-color16">';
    foreach ( $dbkeys as $key ) {
        $output .= '<option class="p-11 updatehealthdb" keyval="' . $key . '" >' . $key . '</option>';
    }
    $output .= '</select>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $detailslink = get_permalink(251);
    foreach ( $curldata [0] as $healthcard ) {
        if( count($healthcard) != 4 ) {
          $healthcard[] = "Nutrition";
        }
        $output .= '<div class="row">';
        foreach ( $healthcard as $hcard ) {
            $appender = "?";
            if (strpos( $detailslink, '?')) {
                $appender = "&";
            }
            
            //$pdetailslink = $detailslink.$appender."indicator=".$hcard;
            $pathname = str_replace ( ' ', '-', strtolower ( $hcard ) );
            $imgname = str_replace ( ' ', '_', strtolower ( $hcard ) );
            $pdetailslink = "/sanchar-briefs/" . $pathname;
            $imgurl = wp_get_attachment_by_post_name ( $imgname );
            $relative_url = str_replace('http://localhost/sanchar', '', $imgurl->guid);
            $output .= '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3 pr-xl-1 selected_program cursor-pointer" data-area-name="' . $hcard . '">';
            $output .= '<a href="'.$pdetailslink.'""><div class="card p-1 border-0 shadow h-100">';
            $output .= '<img src="' . $relative_url . '" class="card-img-top" alt="' . $imgname . '">';
            $output .= '<div class="card-body px-3 py-2">';
            $output .= '     <p class="card-text mb-0 font-weight-bold font-chivo text-capitalize f-18">' . $hcard . '</p>';
            $output .= '</div>';
            $output .= ' </div></a>';
            $output .= '</div>';
        }
        $output .= '</div>';
    }
    return $output;
}
function add_file_types_to_uploads($file_types) {
    $new_filetypes = array ();
    $new_filetypes ['svg'] = 'image/svg+xml';
    $file_types = array_merge ( $file_types, $new_filetypes );
    return $file_types;
}
function sanchar_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo ( 'stylesheet_directory' ) . '/admin.css" />';
}
add_theme_support ( 'custom-logo', array (
    'height' => 40,
    'width' => 850,
    'flex-width' => true,
    'flex-height' => true
) );
add_theme_support ( 'post-thumbnails' );
function visualization_portal() {
    $output .= '<div class="">';
    
    // Visualization Wrapper
   /*  $output .= '<a class="nav-item text-decoration-none" href="https://projectsanchar.org/odp/?tab=chart" target="_blank" rel="noopener">';
    $output .= '<div class="bg-white px-4 pb-4 pt-3 d-flex  justify-content-md-between align-items-center border-custom rounded-sm">';
    $output .= '<div class="">';
    $output .= ' <h3 class="text-danger f-18 font-chivo font-weight-bold">Go to Visualization Portal</h3>';
    $output .= '<h3 class="mb-0 display-3"><span class="d-block text-color7 opacity-70 sm5 f-14">Explore Metrics &amp;
    Topics
    through
    Interactive Visualization Module</span></h3>';
    $output .= '</div>';
    $output .= ' <ul class="nav">';
    $output .= '  <li class="nav-item">';
    $output .= '  <figure class="mb-0"><img src="' . get_template_directory_uri () . '/images/arrow-link.svg" alt="arrow-link"></figure>';
    $output .= ' </li>';
    $output .= '</ul>';
    $output .= ' </div>';
    $output .= ' </a>'; */
    $output .= ' <div class="d-flex justify-content-between pb-3 mt-5">';
    $output .= '  <ul class="nav align-items-center">';
    $output .= ' <li class="nav-item pr-3">';
    $output .= ' <figure class="mb-0"><img src="' . get_template_directory_uri () . '/images/youtube.png" alt="youtube"></figure>';
    $output .= ' </li>';
    $output .= ' <li class="nav-item">';
    $output .= ' <div class="display-2 text-color6 font-weight-bold">';
    $output .= ' <span class="sm5 d-block font-chivo">How to Use</span>';
    $output .= '</div>';
    $output .= '</li>';
    $output .= '</ul>';
    $output .= '<div class="">';
    $output .= ' <h3 class="mb-0 opacity-50"> <span class="sm3 f-14 lh-1 ls-n3">9 minutes 14 seconds</span></h3>';
    $output .= '</div>';
    $output .= ' </div>';
    $output .= '<div class="pb-5 mb-5 w-100">';
    $output .= '<video class="w-100" controls="true" poster="' . get_template_directory_uri () . '/images/map.png">';
    $output .= '<source src="' . get_template_directory_uri () . '/images/Sanchar.mp4" type="video/mp4">';
    $output .= '<source src="assets/img/Sanchar.ogv" type="video/ogg; codecs=theora, vorbis">';
    $output .= '  </video>';
    $output .= '   </div>';
    $output .= '</div>';
    return $output;
}
function about_datasets() {
    $aboutargs = array (
        'post_type' => "aboutdatasets",
        'order' => 'ASC',
        'numberposts' => '-1'
    );
    $aboutargsdata = get_posts ( $aboutargs );
    $output .= '<div class="row pb-3 pt-xl-2">';
    foreach ( $aboutargsdata as $about ) {
        $thumb = wp_get_attachment_image_src ( get_post_thumbnail_id ( $about->ID ), 'post' );
        $link = get_the_permalink ( $about->ID );
        if ($thumb [0]) {

        }
        $output .= '<div class="col-6 col-sm-12 col-md-3 col-lg-3 col-xl-3 pb-3 pb-md-0">';
        $output .= '<figure class="mb-0 bg-color12 text-center pt-2">';
        $output .= '<img src="' . $thumb [0] . '" alt="nhfs" class="img-fluid">';
        $output .= '</figure>';
        $output .= '</div>';
        $output .= '<div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 text-color9">';
        $output .= ' <div class="card h-100 border-0 bg-transparent">';
        $output .= '  <div class="card-header py-0 px-0 pb-3 bg-transparent border-0">';
        $output .= '<div class="display-2 font-weight-bold font-chivo">';
        $output .= '<span class="sm5 d-block f-18">' . $about->post_title . '</span>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= ' <div class="card-body p-0">';
        $output .= ' <ul class="nav flex-column pb-3">';
        $output .= '<li class="nav-item h3 mb-1 lh-3"><span class="sm3 d-block f-14"> ' . $about->post_content . '</span> </li>';
        $output .= '</ul>';
        $output .= '</div>';
        $output .= ' </div>';
        $output .= '</div>';
    }
    $output .= ' </div>';
    //$output .= dynamic_sidebar ( 'About Datasets' );
    /* $output = '';
    
    $output .= '<a class="nav-item text-decoration-none" href="http://rchiips.org/nfhs/" target="_blank" rel="noopener">';
    $output .= '<div class="bg-white mb-md-5 px-4 pb-4 pt-3 border-0 d-flex  justify-content-between align-items-center box-1">';
    $output .= '<div class="">';
    $output .= '<h4 class="text-danger font-chivo font-weight-bold f-16">NFHS - 4</h4>';
    $output .= '<h3 class="mb-0 display-3"><span class="d-block text-color7 opacity-70 sm5 f-14">http://rchiips.org/nfhs/</span>';
    $output .= '</h3>';
    $output .= '</div>';
    $output .= '<ul class="nav">';
    $output .= '<li class="nav-item">';
    $output .= '<figure class="mb-0"><img src="assets/img/link-arrow.svg" alt="arrow-link"></figure>';
    $output .= '</li>';
    $output .= '</ul>';
    $output .= '</div>';
    $output .= '</a>';
    $output = '------------------';
    $output .= get_sidebar( 'about-datasets' );
    $output .= '------------------';
    $output .= '<a class="nav-item text-decoration-none" href="http://rchiips.org/nfhs/" target="_blank" rel="noopener">';
    $output .= '<div class="bg-white mb-md-5 px-4 pb-4 pt-3 border-0 d-flex  justify-content-between align-items-center box-1">';
    $output .= dynamic_sidebar ( 'About Datasets' );
    $output .= '</div>';
    $output .= '</a>'; */ 
    //
    return $output;
}

function get_posts_from_experts(){
    $output = '';
    
    $experts = array (
        'post_type' => "experts",
        'order' => 'ASC',
        'numberposts' => '-1'
    );
    $expertsdata = get_posts ( $experts);
    foreach ( $expertsdata as $expert ) {
        $expertdesign = get_post_meta ( $expert->ID, 'experts_meta_designation', true );
        $expertemail = get_post_meta ( $expert->ID, 'experts_meta_email', true );
        $expertphone = get_post_meta ( $expert->ID, 'experts_meta_phone', true );
        $thumb = wp_get_attachment_image_src ( get_post_thumbnail_id ( $expert->ID ), 'post' );
        $terms = get_the_terms($expert->ID, "expertscategory");
        $pillaria = $terms[0]->slug;
        
        
        $output .= '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pb-3 pr-xl-1 pillcontent '.$pillaria.'" role="tabpanel" aria-labelledby="'.$pillaria.'">
      <div class="card h-100 border-0 shadow text-color9 d-flex flex-column">
        <div class="card-header px-3 border-0 bg-transparent pb-0 d-flex " style="height: 103px;">
          <ul class="nav d-flex align-items-start w-100 flex-row">
            <li class="nav-item w-100">
              <div class="h-100">
                <div class="mb-0 rectangle"><img src="' . $thumb[0].'" alt="profile" class="float-left mr-1 expert-'.$expert->ID.'-profileimg" width="80" height="80">
                  <p class="mb-0 font-chivo font-weight-bold lh-4 text-wrap res-name expert-'.$expert->ID.'-name">
                    '.$expert->post_title.'
                  </p>
                  <h1 class="mb-0  font-chivo">
                    <span class="sm5 d-block designation font-weight-bold font-chivo expert-'.$expert->ID.'-design"> '.$expertdesign.' </span>
                  </h1>
                </div>
              </div>
            </li>
                        
          </ul>
        </div>
<div class="expert-'.$expert->ID.'-desc" style="display:none">'.$expert->post_content.'</div>
        <div class="card-body pb-4 px-3 d-flex">
          <h3 class="mb-2 pb-3 lh-3">
            <span class="sm3 d-block text-truncates">
             '.$expert->post_excerpt.'...
              <button class="read-more sm1 p-0 m-0 btn btn-link readmoreexpert" expertid="expert-'.$expert->ID.'" data-value="1" data-toggle="modal" data-target="#resource_profile_model">Read
                more</button>
            </span>
          </h3>
        </div>
        <div class="card-footer px-3 bg-color10 pb-4 border-0">
          <ul class="nav d-flex justify-content-center mt-n4">
            <li class="h3 mb-0 text-center  nav-item">
              <a class="nav-link bg-white text-primary font-weight-bold d-block border-color16 py-1 border round sm3 expert-'.$expert->ID.'-termname" href="">
                '.$terms[0]->name.'
              </a>
            </li>
          </ul>
          <ul class="nav d-flex flex-column pt-3 h3 mb-0 text-center">
            <li class="nav-item mb-1">
              <a class="nav-link sm3 text-color9 p-0 expert-'.$expert->ID.'-phone" href="telto:9811103305">
                '.$expertphone.' </a>
            </li>
            <li class="nav-item">
              <a class="nav-link sm3 text-color9 p-0  expert-'.$expert->ID.'-email" href="mailto:'.$expertemail.'">
                '.$expertemail.' </a>
            </li>
          </ul>
        </div>
      </div>
    </div>';
        
        
        
    }
    
    
    
    return $output;
}

function figure_chart() {
    $output .= '<div class="row">';
    $figuresargs = array (
        'post_type' => "figuresandcharts",
        'order' => 'ASC',
        'numberposts' => '-1'
    );
    $figuresandcharts = get_posts ( $figuresargs );
    foreach ( $figuresandcharts as $fc ) {
        $catname = get_post_meta ( $fc->ID, 'figuresurl_meta_cat', true );
        $fcurl = get_post_meta ( $fc->ID, 'figuresurl_meta_url', true );
        $thumb = wp_get_attachment_image_src ( get_post_thumbnail_id ( $fc->ID ), 'post' );
        $link = get_the_permalink ( $fc->ID );
        $output .= '<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pb-3 pr-xl-1 ">';
        $output .= '<div class="card p-1 border-0 shadow h-100">';
        $output .= '<div class="card-header bg-transparent border-0 px-3 py-0">';
        $output .= ' <figure class="mb-0">';
        $output .= ' <img src="' . $thumb[0].'" class="card-img-top" alt="child-health">';
        $output .= '</figure>';
        $output .= '</div>';
        $output .= '<div class="card-body p-0 m-0">';
        $output .= '<div class="card-title display-3 mb-1 pt-2 font-weight-bold px-2 font-chivo">';
        $output .= '<a class="text-primary cursor-pointer" href="'.$fcurl.'" target="_blank" rel="noopener">';
        $output .= '<span class="sm5 d-block text-color6 f-18">'.$fc->post_title.'</span>';
        $output .= '</a>';
        $output .= '</div>';
        $output .= '<p class="card-text mb-0 pb-2 px-2 text-color9 opacity-50">'.$fc->post_excerpt.'</p>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    }
    $output .= '</div>';
    return $output;
}
/* Actions ********************* */
add_action ( 'init', 'initializetheme' );
add_action ( 'add_meta_boxes', 'homeslide_metabox' );
add_action ( 'save_post', 'homeslide_savemetabox' );
add_action ( 'upload_mimes', 'add_file_types_to_uploads' );
add_action ( 'widgets_init', function () {
    register_widget ( 'Social_Widget' );
} );
    add_action ( 'widgets_init', function () {
        register_widget ( 'Registrtion_Widget' );
    } );
        add_action ( 'login_head', 'sanchar_login' );
        /**
         * ShortCodes *************
         */
        add_shortcode ( 'display_team', 'get_posts_from_people' );
        add_shortcode ( "displayotherlinks", "get_posts_from_otherlinks" );
        add_shortcode ( "displaypeople", "get_posts_from_people" );
        add_shortcode ( "displayhealththemes", "get_curldata_healththemes" );
        add_shortcode ( "displaybriefs", "get_curl_briefs" );
        add_shortcode ( 'visualization_portal', 'visualization_portal' );
        add_shortcode ( "about_datasets", "about_datasets" );
        add_shortcode ( "figure_chart", "figure_chart" );
        add_shortcode ( "displayexperts", "get_posts_from_experts" );
        /**
         * Metaboxes ***********
         */
        add_action ( 'add_meta_boxes', 'team_add_meta_box' );
        add_action ( 'save_post', 'team_save_meta_box' );
        add_action ( 'add_meta_boxes', 'otherlinks_metabox' );
        add_action ( 'save_post', 'otherlinks_savemetabox' );
        add_action ( 'add_meta_boxes', 'figures_metabox' );
        add_action ( 'save_post', 'figures_savemetabox' );
        
        add_action ( 'add_meta_boxes', 'experts_metabox' );
        add_action ( 'save_post', 'experts_savemetabox' );
        add_image_size ( 'banner-image', 1900 );
        // add_action('wp_head', 'show_template');
        function show_template() {
            global $template;
            echo basename ( $template ) . "_______________";
        }
        ?>
