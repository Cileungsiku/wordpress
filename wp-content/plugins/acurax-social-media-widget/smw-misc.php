<?php 
if(ISSET($_POST['acurax_social_widget_icon_hidden']))
{
	$acurax_social_widget_icon_hidden = $_POST['acurax_social_widget_icon_hidden'];
}
else
{
	$acurax_social_widget_icon_hidden = '';
}

if($acurax_social_widget_icon_hidden == 'Y') 
{	//Form data sent

if (!isset($_POST['acx_si_misc_submit'])) die("<br><br>Unknown Error Occurred, Try Again... <a href=''>Click Here</a>");
if (!wp_verify_nonce($_POST['acx_si_misc_submit'],'acx_si_misc_submit')) die("<br><br>Unknown Error Occurred, Try Again... <a href=''>Click Here</a>");
if(!current_user_can('manage_options')) die("<br><br>Sorry, You have no permission to do this action...</a>");

$acx_si_smw_theme_warning_ignore = sanitize_text_field($_POST['acx_si_smw_theme_warning_ignore']);
update_option('acx_si_smw_theme_warning_ignore', $acx_si_smw_theme_warning_ignore);
$acx_si_smw_acx_service_banners = sanitize_text_field($_POST['acx_si_smw_acx_service_banners']);
update_option('acx_si_smw_acx_service_banners', $acx_si_smw_acx_service_banners);
$acx_si_smw_float_fix = sanitize_text_field($_POST['acx_si_smw_float_fix']);
update_option('acx_si_smw_float_fix', $acx_si_smw_float_fix);
$acx_si_smw_hide_advert = sanitize_text_field($_POST['acx_si_smw_hide_advert']);
update_option('acx_si_smw_hide_advert', $acx_si_smw_hide_advert);
$acx_si_asmw_hide_expert_support_menu = sanitize_text_field($_POST['acx_si_asmw_hide_expert_support_menu']);
update_option('acx_si_asmw_hide_expert_support_menu', $acx_si_asmw_hide_expert_support_menu);
?>
<div class="updated"><p><strong><?php _e('Acurax Widgets Misc Settings Saved!.' ); ?></strong></p></div>
<?php
}
else
{	//Normal page display
$acx_si_smw_theme_warning_ignore = get_option('acx_si_smw_theme_warning_ignore');
$acx_si_smw_acx_service_banners = get_option('acx_si_smw_acx_service_banners');
$acx_si_smw_float_fix = get_option('acx_si_smw_float_fix');
$acx_si_smw_hide_advert = get_option('acx_si_smw_hide_advert');
$acx_si_asmw_hide_expert_support_menu = get_option('acx_si_asmw_hide_expert_support_menu');
// Setting Defaults
if ($acx_si_smw_theme_warning_ignore == "") {	$acx_si_smw_theme_warning_ignore = "no"; }
if ($acx_si_smw_acx_service_banners == "") {	$acx_si_smw_acx_service_banners = "yes"; }
if ($acx_si_smw_float_fix == "") {	$acx_si_smw_float_fix = "no"; }
if ($acx_si_smw_hide_advert == "") {	$acx_si_smw_hide_advert = "no"; }
if ($acx_si_asmw_hide_expert_support_menu == "") {	$acx_si_asmw_hide_expert_support_menu = "no"; }
} //Main else
?>
<div class="wrap">
<div style='background: none repeat scroll 0% 0% white; height: 100%; display: inline-block; padding: 8px; margin-top: 5px; border-radius: 15px; min-height: 450px; width: 100%;'>
<?php if($acx_si_smw_hide_advert == "no")
{ ?>
<div id="acx_asmw_premium">
<a href="#compare" style="margin: 10px 0px 0px 10px; font-weight: bold; font-size: 14px; display: block;">Fully Featured - Acurax Social Media Widget is Available With Tons of Extra Features!</a><a href="http://clients.acurax.com/floating-socialmedia.php/?utm_source=asmw&utm_campaign=day_button" target="_blank" class="buy_now"></a></div> <!-- acx_fsmi_premium -->
<?php } ?>
<?php echo "<h2 class='acx_asmw_h2'>" . __( 'Acurax Social Widget Misc Settings', 'acx_si_config' ) . "</h2>"; ?>
<div class="acx_asmw_admin_left">
<form name="acurax_si_form" id="acurax_asmw_misc_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<input type="hidden" name="acurax_social_widget_icon_hidden" value="Y">







<div id="acx_asmw_admin_left_section">
<h4><?php _e("Acurax Theme Conflict Settings" ); ?></h4>
<div class="acx_asmw_admin_left_section_c">
<p class="field_label">Widget Icons Vertical <a style="cursor:pointer;" class="asmw_info_premium" lb_title="Icon Shows Vertical Instead of Horizontal" lb_content="If your social media icons is displaying vertically instead of horizontal, You can change this settings.">[?]</a></p>
<select name="acx_si_smw_float_fix">
<option value="yes"<?php if ($acx_si_smw_float_fix == "yes") { echo 'selected="selected"'; } ?>>Yes,Make My Vertical Icons Horizontal</option>
<option value="no"<?php if ($acx_si_smw_float_fix == "no") { echo 'selected="selected"'; } ?>>No, I Dont Have Any Issues</option>
</select>
<span class="field_sep"></span>
<p class="field_label"><?php _e("Ignore Theme Warning?" ); ?></p>
<select name="acx_si_smw_theme_warning_ignore">
<option value="yes"<?php if ($acx_si_smw_theme_warning_ignore == "yes") { echo 'selected="selected"'; } ?>>Yes, Everything is working fine and and i still see theme warning - Fix This</option>
<option value="no"<?php if ($acx_si_smw_theme_warning_ignore == "no") { echo 'selected="selected"'; } ?>>No, I Have No Issues </option>
</select>
<span class="field_sep"></span>
</div> <!-- acx_asmw_admin_left_section_c -->
</div> <!-- acx_asmw_admin_left_section -->







<div id="acx_asmw_admin_left_section">
<h4><?php _e("Acurax Service/Info Settings" ); ?></h4>
<div class="acx_asmw_admin_left_section_c">
<p class="field_label">Acurax Service Info</p>
<select name="acx_si_smw_acx_service_banners">
<option value="yes"<?php if ($acx_si_smw_acx_service_banners == "yes") { echo 'selected="selected"'; } ?>>Show Acurax Service Banner</option>
<option value="no"<?php if ($acx_si_smw_acx_service_banners == "no") { echo 'selected="selected"'; } ?>>Hide Acurax Service Banner</option>
</select>
<span class="field_sep"></span>
<p class="field_label">Premium Version Info</p>
<select name="acx_si_smw_hide_advert">
<option value="yes"<?php if ($acx_si_smw_hide_advert == "yes") { echo 'selected="selected"'; } ?>>Hide Premium Version Infos</option>
<option value="no"<?php if ($acx_si_smw_hide_advert == "no") { echo 'selected="selected"'; } ?>>Show Premium Version Infos</option>
</select>
<span class="field_sep"></span>

<p class="field_label"><?php _e("Expert Support Menu" ); ?></p>
<select name="acx_si_asmw_hide_expert_support_menu">
<option value="yes"<?php if ($acx_si_asmw_hide_expert_support_menu == "yes") { echo 'selected="selected"'; } ?>>Hide Expert Support Menu From Acurax </option>
<option value="no"<?php if ($acx_si_asmw_hide_expert_support_menu == "no") { echo 'selected="selected"'; } ?>>Show Expert Support Menu From Acurax</option>
</select>
<span class="field_sep"></span>
</div> <!-- acx_asmw_admin_left_section_c -->
</div> <!-- acx_asmw_admin_left_section -->





<input name="acx_si_misc_submit" type="hidden" value="<?php echo wp_create_nonce('acx_si_misc_submit'); ?>" />
<p class="submit">
<input type="submit" name="Submit" class="button" value="<?php _e('Save Settings', 'acx_si_config' ) ?>" />
</p>
</form>
<div id="acx_asmw_sidebar">
<?php acx_asmw_service_banners(); ?>
</div> <!-- acx_csma_sidebar -->
</div> <!-- acx_asmw_admin_left -->
<?php if($acx_si_smw_hide_advert == "no")
{ 
socialicons_widget_comparison(1); 
} ?> 
<br>
<p class="widefat" style="padding:8px;width:99%;">
Something Not Working Well? Have a Doubt? Have a Suggestion? - <a href="http://www.acurax.com/contact.php" target="_blank">Contact us now</a> | Need a Custom Designed Theme For your Blog or Website? Need a Custom Header Image? - <a href="http://www.acurax.com/contact.php" target="_blank">Contact us now</a>
</p>
</div>
</div>
<script type="text/javascript">
jQuery( ".asmw_info_premium" ).click(function() {
var lb_title = jQuery(this).attr('lb_title');
var lb_content = jQuery(this).attr('lb_content');
var html= '<div id="acx_asmw_c_icon_p_info_lb_h" style="display:none;"><div class="acx_asmw_c_icon_p_info_c"><span class="acx_asmw_c_icon_p_info_close" onclick="remove_info()"></span><h4>'+lb_title+'</h4><div class="acx_asmw_c_icon_p_info_content">'+lb_content+'</div></div></div> <!-- acx_asmw_c_icon_p_info_lb_h -->';
jQuery( "body" ).append(html)
jQuery( "#acx_asmw_c_icon_p_info_lb_h" ).fadeIn();
});

function remove_info()
{
jQuery( "#acx_asmw_c_icon_p_info_lb_h" ).fadeOut()
jQuery( "#acx_asmw_c_icon_p_info_lb_h" ).remove();
};
</script>