<?php 
/**********************************************/
$total_themes = ACX_SOCIALMEDIA_WIDGET_TOTAL_THEMES; // DEFINE NUMBER OF THEMES HERE
$total_themes = ($total_themes+1); // DO NOT EDIT THIS
/**********************************************/
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

if (!isset($_POST['acx_si_settings_submit'])) die("<br><br>Unknown Error Occurred, Try Again... <a href=''>Click Here</a>");
if (!wp_verify_nonce($_POST['acx_si_settings_submit'],'acx_si_settings_submit')) die("<br><br>Unknown Error Occurred, Try Again... <a href=''>Click Here</a>");
if(!current_user_can('manage_options')) die("<br><br>Sorry, You have no permission to do this action...</a>");


	$acx_widget_si_theme = sanitize_text_field($_POST['acx_widget_si_theme']);
	if(!is_numeric($acx_widget_si_theme))
	{
	$acx_widget_si_theme = 1;
	}
	update_option('acx_widget_si_theme', $acx_widget_si_theme);
	$acx_widget_si_twitter = sanitize_text_field($_POST['acx_widget_si_twitter']);
	update_option('acx_widget_si_twitter', $acx_widget_si_twitter);
	
	$acx_widget_si_facebook = $_POST['acx_widget_si_facebook'];
	if($acx_widget_si_facebook != "")
	{
		if (substr($acx_widget_si_facebook, 0, 4) != 'http') {
		$acx_widget_si_facebook = 'http://' . $acx_widget_si_facebook;
		} if($acx_widget_si_facebook == "http://#") { $acx_widget_si_facebook = "#"; }
	}	update_option('acx_widget_si_facebook', $acx_widget_si_facebook);
	
	/* $acx_widget_si_facebook = $_POST['acx_widget_si_facebook'];
	update_option('acx_widget_si_facebook', $acx_widget_si_facebook); */
	
	$acx_widget_si_youtube = $_POST['acx_widget_si_youtube'];
	update_option('acx_widget_si_youtube', $acx_widget_si_youtube);
	$acx_widget_si_linkedin = $_POST['acx_widget_si_linkedin'];
	update_option('acx_widget_si_linkedin', $acx_widget_si_linkedin);
	$acx_widget_si_gplus = $_POST['acx_widget_si_gplus'];
	update_option('acx_widget_si_gplus', $acx_widget_si_gplus);
	$acx_widget_si_credit = sanitize_text_field(ISSET($_POST['acx_widget_si_credit']));
	update_option('acx_widget_si_credit', $acx_widget_si_credit);
	$acx_widget_si_icon_size = sanitize_text_field($_POST['acx_widget_si_icon_size']);
	update_option('acx_widget_si_icon_size', $acx_widget_si_icon_size);
	$acx_widget_si_pinterest = $_POST['acx_widget_si_pinterest'];
	update_option('acx_widget_si_pinterest', $acx_widget_si_pinterest);
	
	$acx_widget_si_feed = $_POST['acx_widget_si_feed'];
	update_option('acx_widget_si_feed', $acx_widget_si_feed);
	$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 
 	   if(is_serialized($social_widget_icon_array_order)) 
 	   { 
			$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
		}
	$acx_si_smw_hide_advert = get_option('acx_si_smw_hide_advert');
		?>
		<div class="updated"><p><strong><?php _e('Acurax Social Icon Widget Settings Saved!.' ); ?></strong></p></div>
		<?php
}
	else
{	//Normal page display
$acx_widget_si_installed_date = get_option('acx_widget_si_installed_date');
if ($acx_widget_si_installed_date=="") { $acx_widget_si_installed_date = time();
update_option('acx_widget_si_installed_date', $acx_widget_si_installed_date);
}
	$acx_widget_si_theme = get_option('acx_widget_si_theme');
	$acx_widget_si_twitter = get_option('acx_widget_si_twitter');
	$acx_widget_si_facebook = get_option('acx_widget_si_facebook');
	$acx_widget_si_youtube = get_option('acx_widget_si_youtube');
	$acx_widget_si_linkedin = get_option('acx_widget_si_linkedin');
	$acx_widget_si_pinterest = get_option('acx_widget_si_pinterest');
	$acx_widget_si_feed = get_option('acx_widget_si_feed');
	$acx_widget_si_gplus = get_option('acx_widget_si_gplus');
	$acx_widget_si_credit = get_option('acx_widget_si_credit');
	$acx_widget_si_icon_size = get_option('acx_widget_si_icon_size');
	acx_asmw_orderarray_refresh();
	$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 
 	   if(is_serialized($social_widget_icon_array_order)) 
 	   { 
			$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
		}
	$acx_si_smw_hide_advert = get_option('acx_si_smw_hide_advert');
	// Setting Defaults
	if ($acx_widget_si_credit == "") {	$acx_widget_si_credit = "no"; }
	if ($acx_widget_si_icon_size == "") { $acx_widget_si_icon_size = "32"; }
	if ($acx_widget_si_theme == "") { $acx_widget_si_theme = "1"; }
	if ($acx_si_smw_hide_advert == "") {	$acx_si_smw_hide_advert = "no"; }

} //Main else
?>
	<!--  To Update Drag and Drop -->
	<script type="text/javascript">
	jQuery(document).ready(function()
	{
		jQuery(function() 
		{
			jQuery("#contentLeft ul").sortable(
			{ 
				opacity: 0.5, cursor: 'move', update: function() 
				{
					var order = jQuery(this).sortable("serialize") + '&action=acx_asmw_saveorder'; 
					jQuery.post(ajaxurl, order, function(theResponse)
					{
						jQuery("#contentRight").html(theResponse);
					}); 															 
				}								  
			});
		});
	});	
	</script>
	
	
<div class="wrap">
<div style='background: none repeat scroll 0% 0% white; height: 100%; display: inline-block; padding: 8px; margin-top: 5px; border-radius: 15px; min-height: 450px; width: 100%;'>
<?php if($acx_si_smw_hide_advert == "no")
{ ?>
<div id="acx_asmw_premium">
<a href="#compare" style="margin: 10px 0px 0px 10px; font-weight: bold; font-size: 14px; display: block;">Fully Featured - Acurax Social Media Widget is Available With Tons of Extra Features!</a><a href="http://clients.acurax.com/floating-socialmedia.php/?utm_source=asmw&utm_campaign=day_button" target="_blank" class="buy_now"></a></div> <!-- acx_fsmi_premium -->
<?php } ?>
<?php echo "<h2 class='acx_asmw_h2'>" . __( 'Acurax Social Icons Options', 'acx_widget_si_config' ) . "</h2>"; ?>
<div class="acx_asmw_admin_left">
<form name="acurax_si_form" id="acx_asmw_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="acurax_social_widget_icon_hidden" value="Y">
<div id="acx_asmw_admin_left_section">	
	<?php    echo "<h4>" . "Your Current Theme is <b>Theme" . $acx_widget_si_theme."</b>" . "</h4>"; ?>
<div class="acx_asmw_admin_left_section_c">
		<div class="image_div" style="margin-top:8px;">
			<img src="<?php echo plugins_url('images/themes/'.$acx_widget_si_theme.'/twitter.png', __FILE__);?>" style="height:<?php 
			echo $acx_widget_si_icon_size;?>px;">
			<img src="<?php echo plugins_url('images/themes/'.$acx_widget_si_theme.'/facebook.png', __FILE__);?>" style="height:
			<?php echo $acx_widget_si_icon_size;?>px;">
			<img src="<?php echo plugins_url('images/themes/'.$acx_widget_si_theme.'/googleplus.png', __FILE__);?>" style="height:
			<?php echo $acx_widget_si_icon_size;?>px;">
			<img src="<?php echo plugins_url('images/themes/'.$acx_widget_si_theme.'/pinterest.png', __FILE__);?>" style="height:
			<?php echo $acx_widget_si_icon_size;?>px;">
			<img src="<?php echo plugins_url('images/themes/'.$acx_widget_si_theme.'/youtube.png', __FILE__);?>" style="height:<?php
			echo $acx_widget_si_icon_size;?>px;">
			<img src="<?php echo plugins_url('images/themes/'.$acx_widget_si_theme.'/linkedin.png', __FILE__);?>" style="height:
			<?php echo $acx_widget_si_icon_size;?>px;">
			<img src="<?php echo plugins_url('images/themes/'.$acx_widget_si_theme.'/feed.png', __FILE__);?>" style="height:
			<?php echo $acx_widget_si_icon_size;?>px;">
		</div>
</div> <!-- acx_asmw_admin_left_section_c -->
</div> <!-- acx_asmw_admin_left_section -->
<div id="acx_asmw_admin_left_section">	
	<?php    echo "<h4>" . "Icon Theme Settings" . "</h4>"; ?>
<div class="acx_asmw_admin_left_section_c">
	<?php
	// Starting The Theme List
	echo "<div id='acx_widget_si_theme_display' class='widefat'>";
	for ($i=1; $i < $total_themes; $i++)
	{ ?>
		<label class="acx_widget_si_single_theme_display <?php if ($acx_widget_si_theme == $i) { echo "selected"; } ?>" id="icon_selection">
		<div class="acx_widget_si_single_label">Theme <?php echo $i; ?><br><input type="radio" name="acx_widget_si_theme" value="<?php echo $i; ?>"<?php if ($acx_widget_si_theme == $i) { echo " checked"; } ?>></div>
		<div class="image_div">
			<?php
				foreach ($social_widget_icon_array_order as $key => $value)
				{
					if ($value == 0) 
					{
						echo "<img src=" . plugins_url('images/themes/'. $i .'/twitter.png', __FILE__) . ">"; 
					} 	else 
					if ($value == 1) 
					{
						echo "<img src=" . plugins_url('images/themes/'. $i .'/facebook.png', __FILE__) . ">"; 
					}	else 
					if ($value == 2) 
					{
						echo "<img src=" . plugins_url('images/themes/'. $i .'/googleplus.png', __FILE__) . ">"; 
					}	else
	 
					if ($value == 3) 
					{
						echo "<img src=" . plugins_url('images/themes/'. $i .'/pinterest.png', __FILE__) . ">"; 
					}	else
					if ($value == 4) 
					{
						echo "<img src=" . plugins_url('images/themes/'. $i .'/youtube.png', __FILE__) . ">"; 
					}	else 
					if ($value == 5) 
					{
						echo "<img src=" . plugins_url('images/themes/'. $i .'/linkedin.png', __FILE__) . ">"; 
					}
					
					if ($value == 6) 
					{
						echo "<img src=" . plugins_url('images/themes/'. $i .'/feed.png', __FILE__) . ">"; 
					}
				}
			?>			
		</div>
		</label>
	<?php
	}
	echo "</div> <!-- acx_widget_si_theme_display -->";
	// Ending The Theme List
	?>
	</div> <!-- acx_asmw_admin_left_section_c -->
</div> <!-- acx_asmw_admin_left_section -->
<div id="acx_asmw_admin_left_section">	
	<?php    echo "<h4>" . "Icon Size Settings" . "</h4>"; ?>
<div class="acx_asmw_admin_left_section_c">
		<select name="acx_widget_si_icon_size" style="width: 99.5%">
			<option value="16"<?php if ($acx_widget_si_icon_size == "16") { echo 'selected="selected"'; } ?>>16px X 16px </option>
			<option value="25"<?php if ($acx_widget_si_icon_size == "25") { echo 'selected="selected"'; } ?>>25px X 25px </option>
			<option value="32"<?php if ($acx_widget_si_icon_size == "32") { echo 'selected="selected"'; } ?>>32px X 32px </option>
			<option value="40"<?php if ($acx_widget_si_icon_size == "40") { echo 'selected="selected"'; } ?>>40px X 40px </option>
			<option value="48"<?php if ($acx_widget_si_icon_size == "48") { echo 'selected="selected"'; } ?>>48px X 48px </option>
			<option value="55"<?php if ($acx_widget_si_icon_size == "55") { echo 'selected="selected"'; } ?>>55px X 55px </option>
		</select>
	</div> <!-- acx_asmw_admin_left_section_c -->
</div> <!-- acx_asmw_admin_left_section -->

<div id="acx_asmw_admin_left_section">	
	<?php    echo "<h4>" . "Social Media Icon Display Order - Drag and Drop to Reorder" . "</h4>"; ?>
<div class="acx_asmw_admin_left_section_c">
		<div id="contentLeft">
			<ul>
			<?php
			foreach ($social_widget_icon_array_order as $key => $value)
			{
				?>
				<li id="recordsArray_<?php echo $value; ?>">
				<?php 
				if ($value == 0) 
				{
					echo "<img src=" . plugins_url('images/themes/'. $acx_widget_si_theme .'/twitter.png', __FILE__) . " 
					border='0'><br> Twitter"; 
				} 	else 
				if ($value == 1) 
				{
					echo "<img src=" . plugins_url('images/themes/'. $acx_widget_si_theme .'/facebook.png', __FILE__) . " 
					border='0'><br> Facebook"; 
				}	else 
				if ($value == 2) 
				{
					echo "<img src=" . plugins_url('images/themes/'. $acx_widget_si_theme .'/googleplus.png', __FILE__) . " 
					border='0'><br> Google Plus"; 
				}	else
				 
				if ($value == 3) 
				{
					echo "<img src=" . plugins_url('images/themes/'. $acx_widget_si_theme .'/pinterest.png', __FILE__) . " 
					border='0'><br> Pinterest"; 
				}	else
				if ($value == 4) 
				{
					echo "<img src=" . plugins_url('images/themes/'. $acx_widget_si_theme .'/youtube.png', __FILE__) . " 
					border='0'><br> Youtube"; 
				}	else 
				if ($value == 5) 
				{
					echo "<img src=" . plugins_url('images/themes/'. $acx_widget_si_theme .'/linkedin.png', __FILE__) . " 
					border='0'><br> Linkedin"; 
				}
				
				if ($value == 6) 
				{
					echo "<img src=" . plugins_url('images/themes/'. $acx_widget_si_theme .'/feed.png', __FILE__) . " 
					border='0'><br> Rss Feed"; 
				}
					?>
					</li>	<?php
			}	?>
			</ul>
		</div>
		<div id="contentRight"></div> <!-- contentRight -->
		<?php _e("Drag and Reorder Icons (It will automatically save on reorder)" ); ?>
	</div> <!-- acx_asmw_admin_left_section_c -->
</div> <!-- acx_asmw_admin_left_section -->

<div id="acx_asmw_admin_left_section">	
	<?php    echo "<h4>" . "Social Media Configuration" . "</h4>"; ?>
<div class="acx_asmw_admin_left_section_c">	
<p class="field_label">
<?php _e("Twitter Username: " ); ?>
</p>
<input type="text" name="acx_widget_si_twitter" value="<?php echo $acx_widget_si_twitter; ?>" size="50" placeholder="acuraxdotcom">
<span class="field_sep"></span>
<p class="field_label">
<?php _e("Facebook Profile URL: " ); ?>
</p>
<input type="text" name="acx_widget_si_facebook" value="<?php echo $acx_widget_si_facebook; ?>" size="50" placeholder="http://www.facebook.com/AcuraxInternational">
<span class="field_sep"></span>	
<p class="field_label"><?php _e("Google Plus URL: " ); ?></p>
<input type="text" name="acx_widget_si_gplus" value="<?php echo $acx_widget_si_gplus; ?>" size="50" placeholder="Enter Your Complete Google Plus Url Starting With http://">
<span class="field_sep"></span>	
<p class="field_label">
<?php _e("Pinterest URL: " ); ?></p>
<input type="text" name="acx_widget_si_pinterest" value="<?php echo $acx_widget_si_pinterest; ?>" size="50" placeholder="Enter Your Complete Pinterest Url Starting With http://">
<span class="field_sep"></span>	
<p class="field_label">
<?php _e("Youtube URL: " ); ?></p>
<input type="text" name="acx_widget_si_youtube" value="<?php echo $acx_widget_si_youtube; ?>" size="50" placeholder="http://www.youtube.com/user/acuraxdotcom">
<span class="field_sep"></span>	
<p class="field_label">
<?php _e("Linkedin URL: " ); ?></p>
<input type="text" name="acx_widget_si_linkedin" value="<?php echo $acx_widget_si_linkedin; ?>" size="50" placeholder="http://www.linkedin.com/company/acurax-international">
<span class="field_sep"></span>	
<p class="field_label">
<?php _e("Feed URL: " ); ?></p>
<input type="text" name="acx_widget_si_feed" value="<?php echo $acx_widget_si_feed; ?>" size="50" placeholder="http://www.yourwebsite.com/feed">
<span class="field_sep"></span>	
<span class="button asmw_info_premium" lb_title="Adding Extra Icons Feature" lb_content="Its possible to add any number of extra icons by uploading them and you can link them to anywhere you need.<br><br>Lets say, you needs to have an icon which links to your contact page or services page, you can do that.<br><br><i>This feature is only available in our premium version - <a href='admin.php?page=Acurax-Social-Widget-Premium' target='_blank'>Compare Features</a> / <a href='http://clients.acurax.com/floating-socialmedia.php' target='_blank'>Order Now</a>">Add Custom Icon</span>
<span class="field_sep"></span>	
</div> <!-- acx_asmw_admin_left_section_c -->
</div> <!-- acx_asmw_admin_left_section -->
	<input name="acx_si_settings_submit" type="hidden" value="<?php echo wp_create_nonce('acx_si_settings_submit'); ?>" />
	<p class="submit">
		<input type="submit" name="Submit" class="button button-primary" value="<?php _e('Save Configuration', 'acx_widget_si_config' ) ?>" />
		<a name="updated">.</a>
	</p>
</form>

<div id="acx_asmw_sidebar">
<?php acx_asmw_service_banners(); ?>
</div> <!-- acx_csma_sidebar -->

</div> <!-- acx_asmw_admin_left -->
<hr/>
<?php if($acx_si_smw_hide_advert == "no")
{ 
socialicons_widget_comparison(1); 
acurax_smw_optin();
}
?> 
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