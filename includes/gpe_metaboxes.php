<?php
function homeslide_metabox() {
	add_meta_box ( 'homeslider_meta_sectionid', __ ( 'Home Slider URL', 'layerswp' ), 'homeslider_metabox_callback', "homeslider", 'normal', 'high' );
}
function homeslider_metabox_callback($post) {
	wp_nonce_field ( 'homeslider_metabox', 'homeslider_metabox_nonce' );
	$homesliderurl = get_post_meta ( $post->ID, 'homesliderurl', true );
	echo '<input type="text" size="100" name="homesliderurl" id="homesliderurl" class=""  value="' . $homesliderurl . '">';
}
function homeslide_savemetabox() {
	global $post;
	$post_id = $post->ID;
isset($POST['homesliderurl']) && update_post_meta ( $post_id, 'homesliderurl', sanitize_text_field ( $_POST ['homesliderurl'] ) );
}
function otherlinks_metabox() {
	add_meta_box ( 'otherlink_meta_url', __ ( 'Other Link URL', 'layerswp' ), 'otherlink_metabox_callback', "otherlink", 'normal', 'high' );
}
function otherlink_metabox_callback($post) {
	wp_nonce_field ( 'otherlinks_metabox', 'otherlink_metabox_nonce' );
	$otherlink_meta_url = get_post_meta ( $post->ID, 'otherlink_meta_url', true );
	echo '<input type="text" size="100" name="otherlink_meta_url" id="otherlink_meta_url" class=""  value="' . $otherlink_meta_url . '">';
}
function otherlinks_savemetabox() {
	global $post;
	$post_id = $post->ID;
	isset($POST['otherlink_meta_url']) && update_post_meta ( $post_id, 'otherlink_meta_url', sanitize_text_field ( $_POST ['otherlink_meta_url'] ) );
}
function figures_metabox() {
	add_meta_box ( 'figuresurl_meta_url', __ ( 'URL', 'layerswp' ), 'figures_metabox_callback', "figuresandcharts", 'normal', 'high' );
}
function figures_metabox_callback($post) {
	wp_nonce_field ( 'figures_metabox', 'figures_metabox_nonce' );
	$figuresurl_meta_url = get_post_meta ( $post->ID, 'figuresurl_meta_url', true );
	$figuresurl_meta_cat= get_post_meta ( $post->ID, 'figuresurl_meta_cat', true );
	?>
<div class="meta-container">
	<div class="row">
		<div class="wrapper-content-inner">
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="figuresurl_meta_url">Figures and Chart URL</label></th>
						<td><input name="figuresurl_meta_url" type="text" id="figuresurl_meta_url" value="<?php echo  $figuresurl_meta_url; ?>" class="regular-text"></td>
					</tr>
					<tr>
						<th scope="row"><label for="team_twitter_link">Category for Figures & Charts</label></th>
						<td><input name="figuresurl_meta_cat" type="text" id="figuresurl_meta_cat" value="<?php echo  $figuresurl_meta_cat; ?>" class="regular-text"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
function figures_savemetabox() {
	global $post;
	$post_id = $post->ID;
	isset($POST['figuresurl_meta_url']) && update_post_meta ( $post_id, 'figuresurl_meta_url', sanitize_text_field ( $_POST ['figuresurl_meta_url'] ) );
	isset($POST['figuresurl_meta_cat']) && update_post_meta ( $post_id, 'figuresurl_meta_cat', sanitize_text_field ( $_POST ['figuresurl_meta_cat'] ) );
	
}


function experts_metabox() {
	add_meta_box ( 'experts_meta', __ ( 'More  about an Expert', 'layerswp' ), 'experts_metabox_callback', "experts", 'normal', 'high' );
}
function experts_metabox_callback($post) {
	wp_nonce_field ( 'experts_metabox', 'experts_metabox_nonce' );
	$experts_meta_designation= get_post_meta ( $post->ID, 'experts_meta_designation', true );
	$experts_meta_phone= get_post_meta ( $post->ID, 'experts_meta_phone', true );
	$experts_meta_email= get_post_meta ( $post->ID, 'experts_meta_email', true );
	
	?>
<div class="meta-container">
	<div class="row">
		<div class="wrapper-content-inner">
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="experts_meta_designation">Designation</label></th>
						<td><input name="experts_meta_designation" type="text" id="experts_meta_designation" value="<?php echo  $experts_meta_designation; ?>" class="regular-text"></td>
					</tr>
					<tr>
						<th scope="row"><label for="experts_meta_phone">Phone</label></th>
						<td><input name="experts_meta_phone" type="text" id="experts_meta_phone" value="<?php echo  $experts_meta_phone; ?>" class="regular-text"></td>
					</tr>
					<tr>
						<th scope="row"><label for="experts_meta_email">Email</label></th>
						<td><input name="experts_meta_email" type="text" id="experts_meta_email" value="<?php echo  $experts_meta_email; ?>" class="regular-text"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
function experts_savemetabox() {
	global $post;
	$post_id = $post->ID;
	isset($POST['experts_meta_designation']) && update_post_meta ( $post_id, 'experts_meta_designation', sanitize_text_field ( $_POST ['experts_meta_designation'] ) );
	isset($POST['experts_meta_email']) && update_post_meta ( $post_id, 'experts_meta_email', sanitize_text_field ( $_POST ['experts_meta_email'] ) );
	isset($POST['experts_meta_phone']) && update_post_meta ( $post_id, 'experts_meta_phone', sanitize_text_field ( $_POST ['experts_meta_phone'] ) );
	
}



function team_add_meta_box() {
	add_meta_box ( 'team_meta_sectionid', __ ( 'Team Member Options', 'layerswp' ), 'team_meta_box_callback', "teammembers", 'normal', 'high' );
}
function team_save_meta_box() {
	global $post;
	if ($post_id = $post->ID) {
    // isset($POST['']) && update_post_meta($post_id, 'team_member_name', sanitize_text_field( $_POST['team_member_name']));
    // isset($POST['']) && update_post_meta($post_id, 'team_member_institute', sanitize_text_field( $_POST['team_member_institute']));
    // isset($POST['']) && update_post_meta($post_id, 'team_member_description', sanitize_text_field( $_POST['team_member_description']));
    isset($POST['team_member_designation']) && update_post_meta ( $post_id, 'team_member_designation', sanitize_text_field ( $_POST ['team_member_designation'] ) );
    isset($POST['team_twitter_link']) && update_post_meta ( $post_id, 'team_twitter_link', sanitize_text_field ( $_POST ['team_twitter_link'] ) );
    isset($POST['team_linkedin_link']) && update_post_meta ( $post_id, 'team_linkedin_link', sanitize_text_field ( $_POST ['team_linkedin_link'] ) );
    isset($POST['team_facebook_link']) && update_post_meta ( $post_id, 'team_facebook_link', sanitize_text_field ( $_POST ['team_facebook_link'] ) );
  }
}
function team_meta_box_callback($post) {
	wp_nonce_field ( 'team_meta_box', 'team_meta_box_nonce' );
	?>
<div class="meta-container">
	<div class="row">
		<div class="wrapper-content-inner">
					
					<?php
	/*
	 * $teammembername= get_post_meta ( $post->ID, 'team_member_name', true );
	 *
	 * $teammemberinstitute = get_post_meta ( $post->ID, 'team_member_institute', true );
	 * $teammemberdescription = get_post_meta ( $post->ID, 'team_member_description', true );
	 */
	$teammemberdesignation = get_post_meta ( $post->ID, 'team_member_designation', true );
	$teamtwitterlink = get_post_meta ( $post->ID, 'team_twitter_link', true );
	$teamlinkedinlink = get_post_meta ( $post->ID, 'team_linkedin_link', true );
	$teamfacebooklink = get_post_meta ( $post->ID, 'team_facebook_link', true );
	// $teammemberdescription = get_post_meta ( $post->ID, 'team_member_description', true );
	?>
						<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="team_member_designation">Team Member Designation</label></th>
						<td><textarea name="team_member_designation"  id="team_member_designation"  class="regular-text"><?php echo  $teammemberdesignation; ?></textarea></td>
					</tr>
					<tr>
						<th scope="row"><label for="team_twitter_link">Team Member Twitter Link</label></th>
						<td><input name="team_twitter_link" type="text" id="team_twitter_link" value="<?php echo  $teamtwitterlink; ?>" class="regular-text"></td>
					</tr>
					<tr>
						<th scope="row"><label for="team_linkedin_link">Team Member Linkedin Link</label></th>
						<td><input name="team_linkedin_link" type="text" id="team_linkedin_link" value="<?php echo  $teamlinkedinlink; ?>" class="regular-text"></td>
					</tr>
					<tr>
						<th scope="row"><label for="team_facebook_link">Team Member Facebook Link</label></th>
						<td><input name="team_facebook_link" type="text" id="team_facebook_link" value="<?php echo  $teamfacebooklink; ?>" class="regular-text"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
}
?>
