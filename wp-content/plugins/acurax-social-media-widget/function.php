<?php
//*************** Include style.css in Header ********
// Getting Option From DB *****************************	
$acx_widget_si_theme = get_option('acx_widget_si_theme');
$acx_widget_si_credit = get_option('acx_widget_si_credit');
$acx_widget_si_facebook = get_option('acx_widget_si_facebook');
$acx_widget_si_youtube = get_option('acx_widget_si_youtube');
$acx_widget_si_twitter = get_option('acx_widget_si_twitter');
$acx_widget_si_linkedin = get_option('acx_widget_si_linkedin');
$acx_widget_si_gplus = get_option('acx_widget_si_gplus');
$acx_widget_si_pinterest = get_option('acx_widget_si_pinterest');
$acx_widget_si_feed = get_option('acx_widget_si_feed');
$acx_widget_si_icon_size = get_option('acx_widget_si_icon_size');
$acx_si_smw_float_fix = get_option('acx_si_smw_float_fix');
$acx_si_smw_theme_warning_ignore = get_option('acx_si_smw_theme_warning_ignore');
// *****************************************************

// Options Value Checker
function acx_widget_option_value_check($option_name,$yes,$no)
{ 	$acx_widget_si_option_set = get_option($option_name);
	if ($acx_widget_si_option_set != "") { echo $yes; } else { echo $no; }
}
if(ISSET($_GET['page']))
{
$acx_si_widget_current_page = $_GET['page'];
} else
{
$acx_si_widget_current_page = "";
} 
function acurax_si_widget_simple($theme = "")
{
	// Getting Globals *****************************	
	global $acx_widget_si_theme, $acx_widget_si_credit , $acx_widget_si_twitter, $acx_widget_si_facebook, $acx_widget_si_youtube,$acx_widget_si_gplus,
	$acx_widget_si_linkedin, $acx_widget_si_pinterest, $acx_widget_si_feed, $acx_widget_si_icon_size;
	// *****************************************************	
	
	
	if ($theme == "") { $acx_widget_si_touse_theme = $acx_widget_si_theme; } else { $acx_widget_si_touse_theme = $theme; }
		//******** MAKING EACH BUTTON LINKS ********************
		if	($acx_widget_si_twitter == "") { $twitter_link = ""; } else 
		{
			$twitter_link = "<a href='http://www.twitter.com/". $acx_widget_si_twitter ."' target='_blank' title='Visit Us On Twitter'>" . "<img src=" . 
			plugins_url('images/themes/'. $acx_widget_si_touse_theme .'/twitter.png', __FILE__) . " style='border:0px;' alt='Visit Us On Twitter' /></a>";
		}
		if	($acx_widget_si_facebook == "") { $facebook_link = ""; } else 
		{
			$facebook_link = "<a href='". $acx_widget_si_facebook ."' target='_blank' title='Visit Us On Facebook'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_widget_si_touse_theme .'/facebook.png', __FILE__) . " style='border:0px;' alt='Visit Us On Facebook' /></a>";
		}
		if	($acx_widget_si_gplus == "") { $gplus_link = ""; } else 
		{
			$gplus_link = "<a href='". $acx_widget_si_gplus ."' target='_blank' title='Visit Us On GooglePlus'>" . "<img src=" . plugins_url('images/themes/'. 
			$acx_widget_si_touse_theme .'/googleplus.png', __FILE__) . " style='border:0px;' alt='Visit Us On GooglePlus' /></a>";
		}
		if	($acx_widget_si_pinterest == "") { $pinterest_link = ""; } else 
		{
			$pinterest_link = "<a href='". $acx_widget_si_pinterest ."' target='_blank' title='Visit Us On Pinterest'>" . "<img src=" . plugins_url(
			'images/themes/'. $acx_widget_si_touse_theme .'/pinterest.png', __FILE__) . " style='border:0px;' alt='Visit Us On Pinterest' /></a>";
		}
		if	($acx_widget_si_youtube == "") { $youtube_link = ""; } else 
		{
			$youtube_link = "<a href='". $acx_widget_si_youtube ."' target='_blank' title='Visit Us On Youtube'>" . "<img src=" . plugins_url('images/themes/'. 
			$acx_widget_si_touse_theme .'/youtube.png', __FILE__) . " style='border:0px;' alt='Visit Us On Youtube' /></a>";
		}
		if	($acx_widget_si_linkedin == "") { $linkedin_link = ""; } else 
		{
			$linkedin_link = "<a href='". $acx_widget_si_linkedin ."' target='_blank' title='Visit Us On Linkedin'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_widget_si_touse_theme .'/linkedin.png', __FILE__) . " style='border:0px;' alt='Visit Us On Linkedin' /></a>";
		}
		if	($acx_widget_si_feed == "") { $feed_link = ""; } else 
		{
			$feed_link = "<a href='". $acx_widget_si_feed ."' target='_blank' title='Check Our Feed'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_widget_si_touse_theme .'/feed.png', __FILE__) . " style='border:0px;' alt='Check Our Feed' /></a>";
		}
		$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 
 	   if(is_serialized($social_widget_icon_array_order)) 
 	   { 
			$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
		}
	foreach ($social_widget_icon_array_order as $key => $value)
	{
		if ($value == 0) { echo $twitter_link; } 
		else if ($value == 1) { echo $facebook_link; } 
		else if ($value == 2) { echo $gplus_link; } 
		else if ($value == 3) { echo $pinterest_link; } 
		else if ($value == 4) { echo $youtube_link; } 
		else if ($value == 5) { echo $linkedin_link; } 
		
		else if ($value == 6) { echo $feed_link; }
	}
} //acurax_si_widget_simple()
// Check Credit Link
function check_widget_acx_credit($yes,$no)
{ 	$acx_widget_si_credit = get_option('acx_widget_si_credit');
	if($acx_widget_si_credit != "no") { echo $yes; } else { echo $no; } 
}
function acx_widget_theme_check_wp_head() {
	$template_directory = get_template_directory();
	// If header.php exists in the current theme, scan for "wp_head"
	$file = $template_directory . '/header.php';
	if (is_file($file)) {
		$search_string = "wp_head";
		$file_lines = @file($file);
		
		foreach ($file_lines as $line) {
			$searchCount = substr_count($line, $search_string);
			if ($searchCount > 0) {
				return true;
			}
		}
		
		// wp_head() not found:
		echo "<div class=\"highlight\" style=\"width: 99%; margin-top: 10px; margin-bottom: 10px; border: 1px solid darkred;\">" . "Your theme needs to be fixed for plugins to work. To fix your theme, use the <a href=\"theme-editor.php\">Theme Editor</a> to insert <code>".htmlspecialchars("<?php wp_head(); ?>")."</code> just before the <code>".htmlspecialchars("</head>")."</code> line of your theme's <code>header.php</code> file." . "</div>";
	}
} // theme check 
if($acx_si_smw_theme_warning_ignore != "yes")
{
add_action('admin_notices', 'acx_widget_theme_check_wp_head');
}
function acurax_widget_icons()
{
	global $acx_widget_si_theme, $acx_widget_si_credit, $acx_widget_si_twitter, $acx_widget_si_facebook, $acx_widget_si_youtube, 		
	$acx_widget_si_linkedin, $acx_widget_si_gplus, $acx_widget_si_pinterest, $acx_widget_si_feed, $acx_widget_si_icon_size;
			
	if($acx_widget_si_twitter != "" || $acx_widget_si_facebook != "" || $acx_widget_si_youtube != "" || $acx_widget_si_linkedin != ""  || 
	$acx_widget_si_pinterest != "" || $acx_widget_si_gplus != "" || $acx_widget_si_feed != "")
	{
	//*********************** STARTED DISPLAYING THE ICONS ***********************
		echo "\n\n\n<!-- Starting Icon Display Code For Social Media Icon From Acurax International www.acurax.com -->\n";
		echo "<div id='acx_social_widget' style='text-align:center;'>";
		acurax_si_widget_simple();		
		echo "</div>\n";
		echo "<!-- Ending Icon Display Code For Social Media Icon From Acurax International www.acurax.com -->\n\n\n";
	//*****************************************************************************
	} // Chking null fields
	
} // Ending acurax_widget_icons();
function extra_style_acx_widget_icon()
{
	global $acx_widget_si_icon_size;
	global $acx_si_smw_float_fix;
		echo "\n\n\n<!-- Starting Styles For Social Media Icon From Acurax International www.acurax.com -->\n<style type='text/css'>\n";
		echo "#acx_social_widget img \n{\n";
		echo "width: " . $acx_widget_si_icon_size . "px; \n}\n";
				echo "#acx_social_widget \n{\n";
				echo "min-width:0px; \n";
				echo "position: static; \n}\n";
			if ($acx_si_smw_float_fix == "yes") 
			{
				echo ".acx_smw_float_fix a \n{\n";
				echo "display:inline-block; \n}\n";
			}
				
		echo "</style>\n<!-- Ending Styles For Social Media Icon From Acurax International www.acurax.com -->\n\n\n\n";
}	add_action('admin_head', 'extra_style_acx_widget_icon'); // ADMIN
	add_action('wp_head', 'extra_style_acx_widget_icon'); // PUBLIC 
function acx_widget_si_admin_style()  // Adding Style For Admin
{
	echo '<link rel="stylesheet" type="text/css" href="' .plugins_url('style_for_admin.css', __FILE__). '">';
}	add_action('admin_head', 'acx_widget_si_admin_style'); // ADMIN
$acx_widget_si_sc_id = 0; // Defined to assign shortcode unique id
function DISPLAY_WIDGET_acurax_widget_icons_SC($atts)
{
	global $acx_widget_si_icon_size, $acx_widget_si_sc_id;
	extract(shortcode_atts(array(
	"theme" => '',
	"size" => $acx_widget_si_icon_size,
	"autostart" => 'false'
	), $atts));
	if ($theme > ACX_SOCIALMEDIA_WIDGET_TOTAL_THEMES) { $theme = ""; }
	if (!is_numeric($theme)) { $theme = ""; }
	if ($size > 55) { $size = $acx_widget_si_icon_size; }
	if (!is_numeric($size)) { $size = $acx_widget_si_icon_size; }
		$acx_widget_si_sc_id = $acx_widget_si_sc_id + 1;
		ob_start();
		echo "<style>\n";
		echo "#short_code_si_icon img \n {";
		echo "width:" . $size . "px; \n}\n";
		echo ".scid-" . $acx_widget_si_sc_id . " img \n{\n";
		echo "width:" . $size . "px !important; \n}\n";
		echo "</style>";
		echo "<div id='short_code_si_icon' style='text-align:center;' class='acx_smw_float_fix scid-" . $acx_widget_si_sc_id . "'>";
		acurax_si_widget_simple($theme);
		echo "</div>";
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
} // DISPLAY_WIDGET_acurax_widget_icons_SC
			
function acx_widget_si_custom_admin_js()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
}	add_action( 'admin_enqueue_scripts', 'acx_widget_si_custom_admin_js' );

$total_arrays = ACX_SMW_TOTAL_STATIC_SERVICES; // Number Of static Services
$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 

if(is_serialized($social_widget_icon_array_order)) 
{ 
	$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
}
$social_widget_icon_array_count = count($social_widget_icon_array_order); 
if ($social_widget_icon_array_count < $total_arrays) 
{
	acx_asmw_orderarray_refresh();
}
function enqueue_acx_widget_si_style()
{
	wp_enqueue_style ( 'acx-widget-si-style', plugins_url('style.css', __FILE__) );
}	add_action( 'wp_print_styles', 'enqueue_acx_widget_si_style' );
$acx_widget_si_current_version = get_option('acx_widget_si_current_version');
if($acx_widget_si_current_version != ACX_SMW_VERSION) // Current Version
{
update_option('acx_widget_si_current_version', ACX_SMW_VERSION);
}
// wp-admin Notices >> Plugin not configured
function acx_widget_si_pluign_not_configured()
{
	echo '<div class="updated">
	<p><b>Congratulations!, You Have Successfully Installed Acurax Social Media Widget, The Plugin Is Not Configured - <a href="admin.php?page=Acurax-Social-Widget-Settings">Click Here to Configure</a></b></p></div>';
}
if ($social_widget_icon_array_count == $total_arrays) 
{
	if ($acx_widget_si_twitter == "" && $acx_widget_si_facebook == "" && $acx_widget_si_youtube == "" && $acx_widget_si_linkedin == ""  && $acx_widget_si_pinterest == "" && $acx_widget_si_gplus == "" && $acx_widget_si_feed == "")
	{
		if($acx_si_widget_current_page != 'Acurax-Social-Widget-Settings ')
		{
			add_action('admin_notices', 'acx_widget_si_pluign_not_configured',1);
		}
	}
} 

function acx_widget_si_pluign_promotion()
{
 
$acx_widget_si_installed_date = get_option('acx_widget_si_installed_date');
if ($acx_widget_si_installed_date=="") { $acx_widget_si_installed_date = time();}
$acx_widget_si_next_date = get_option('acx_widget_si_next_date');
$acx_widget_si_days_till_today_from_install = time()-$acx_widget_si_installed_date;
$acx_widget_si_days_till_today_from_install = round(($acx_widget_si_days_till_today_from_install/60/60/24))." Days";
global $current_user;
get_currentuserinfo();
$acx_widget_si_current_user = $current_user->display_name;
if($acx_widget_si_current_user == "")
{
$acx_widget_si_current_user = "Webmaster";
}
echo '<div id="acx_td_asmw" class="notice">Hey <b>'.$acx_widget_si_current_user.'</b>, You were using Acurax Social Media Widget Wordpress Plugin for the last <b>'.$acx_widget_si_days_till_today_from_install.'</b>,and hope you are enjoying it.<br>From the bottom of our heart, we the team @ <a href="http://wordpress.acurax.com/?utm_source=asmw&utm_campaign=days" style="font-weight: normal; margin-left: 0px; color: rgb(68, 68, 68);" target="_blank">Acurax Technologies</a> thank you for being with us, and we appreciate your feedback,reviews and support.<br><a href="https://wordpress.org/support/view/plugin-reviews/acurax-social-media-widget?filter=5" target="_blank">Rate 5★\'s on wordpress</a><a href="admin.php?page=Acurax-Social-Widget-Premium">Premium Version Benefits</a><a href="admin.php?page=Acurax-Social-Widget-Premium&td=hide">Hide for Now</a></div>';
}
$acx_widget_si_installed_date = get_option('acx_widget_si_installed_date');
if ($acx_widget_si_installed_date=="") { $acx_widget_si_installed_date = time();}
$acx_asmw_d = 30;
$acx_asmw_d_n = 100;
$acx_asmw_prom = false;

if(get_option('acx_widget_si_td') == "")
{
	$acx_widget_si_next_date = $acx_widget_si_installed_date+((60*60*24)*$acx_asmw_d);
	update_option('acx_widget_si_next_date', $acx_widget_si_next_date);
	update_option('acx_widget_si_td', "show");
} else if(get_option('acx_widget_si_td') == "hidden")
{
	$acx_widget_si_next_date = time()+((60*60*24)*$acx_asmw_d_n);
	update_option('acx_widget_si_next_date', $acx_widget_si_next_date);
	update_option('acx_widget_si_td', "show");
} else if(get_option('acx_widget_si_td') == "hide")
{
	$acx_widget_si_next_date = time()+((60*60*24)*2);
	update_option('acx_widget_si_next_date', $acx_widget_si_next_date);
	update_option('acx_widget_si_td', "show");
}
$acx_widget_si_next_date = get_option('acx_widget_si_next_date');

if(time() > $acx_widget_si_next_date)
{
$acx_asmw_prom = true;
}

if ($acx_asmw_prom == true && get_option('acx_widget_si_td') == "show")
{
add_action('admin_notices', 'acx_widget_si_pluign_promotion',1);
}
// Starting Widget Code
class acx_social_widget_icons_Widget extends WP_Widget
{
    // Register the widget
    function acx_social_widget_icons_Widget() 
	{
        // Set some widget options
        $widget_options = array( 'description' => 'Allow users to show Social Media Icons via Acurax Social Media Widget 
		Plugin', 'classname' => 'acx-social-icons-desc' );
        // Set some control options (width, height etc)
        $control_options = array( 'width' => 300 );
        // Actually create the widget (widget id, widget name, options...)
        parent::__construct( 'acx-social-icons-widget', 'Acurax Social Media Widget', $widget_options, $control_options );
    }
    // Output the content of the widget
    function widget($args, $instance) 
	{
        extract( $args ); // Don't worry about this
        // Get our variables
        $title = apply_filters( 'widget_title', $instance['title'] );
		$icon_size = $instance['icon_size'];
		$icon_theme = $instance['icon_theme'];
		$icon_align = $instance['icon_align'];
        // This is defined when you register a sidebar
        echo $before_widget;
        // If our title isn't empty then show it
        if ( $title ) 
		{
            echo $before_title . $title . $after_title;
        }
		echo "<style>\n";
		echo "." . $this->get_field_id('widget') . " img \n{\n";
		echo "width:" . $icon_size . "px; \n } \n";
		echo "</style>";
		echo "<div id='acurax_si_widget_simple' class='acx_smw_float_fix " . $this->get_field_id('widget') . "'";
		if($icon_align != "") { echo " style='text-align:" . $icon_align . ";'>"; } else { echo " style='text-align:center;'>"; }
		acurax_si_widget_simple($icon_theme);
		echo "</div>";
        // This is defined when you register a sidebar
        echo $after_widget;
    }
	// Output the admin options form
	function form($instance) 
	{
		$total_themes = ACX_SOCIALMEDIA_WIDGET_TOTAL_THEMES;
		$total_themes = $total_themes + 1;
		// These are our default values
		$defaults = array( 'title' => 'Social Media Icons','icon_size' => '32' );
		// This overwrites any default values with saved values
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
				<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
				value="<?php echo $instance['title']; ?>" type="text" class="widefat" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('icon_size'); ?>"><?php _e('Icon Size:'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('icon_size'); ?>" id="<?php echo $this
				->get_field_id('icon_size'); ?>">
				<option value="16"<?php if ($instance['icon_size'] == "16") { echo 'selected="selected"'; } ?>>16px X 16px </
				option>
				<option value="25"<?php if ($instance['icon_size'] == "25") { echo 'selected="selected"'; } ?>>25px X 25px </
				option>
				<option value="32"<?php if ($instance['icon_size'] == "32") { echo 'selected="selected"'; } ?>>32px X 32px </
				option>
				<option value="40"<?php if ($instance['icon_size'] == "40") { echo 'selected="selected"'; } ?>>40px X 40px </
				option>
				<option value="48"<?php if ($instance['icon_size'] == "48") { echo 'selected="selected"'; } ?>>48px X 48px </
				option>
				<option value="55"<?php if ($instance['icon_size'] == "55") { echo 'selected="selected"'; } ?>>55px X 55px </
				option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('icon_theme'); ?>"><?php _e('Icon Theme:'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('icon_theme'); ?>" id="<?php echo $this
				->get_field_id('icon_theme'); ?>">
				<option value=""<?php if(!ISSET($instance['icon_theme'])) { echo 
				'selected="selected"'; } ?>>Default Theme Design</option>
				<?php
				for ($i=1; $i < $total_themes; $i++)
				{
					?>
					<option value="<?php echo $i; ?>"<?php if(ISSET($instance['icon_theme'])){if ($instance['icon_theme'] == $i) { echo 
					'selected="selected"'; }} ?>>Theme Design <?php echo $i; ?> </option>
					<?php
				}	?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('icon_align'); ?>"><?php _e('Icon Align:'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('icon_align'); ?>" id="<?php echo $this
				->get_field_id('icon_align'); ?>">
				<option value=""<?php if(!ISSET($instance['icon_align']))  { echo 'selected="selected"'; } ?>>Default </
				option>
				<option value="left"<?php if(ISSET($instance['icon_align'])){  if($instance['icon_align'] == "left") { echo 'selected="selected"'; }} ?>>Left </
				option>
				<option value="center"<?php if(ISSET($instance['icon_align'])){ if($instance['icon_align'] == "center") { echo 'selected="selected"'; } }?>>Center </
				option>
				<option value="right"<?php if(ISSET($instance['icon_align'])){ if($instance['icon_align'] == "right") { echo 'selected="selected"'; } }?>>Right </
				option>
				</select>
			</p>
			<p>You can configure your social media profiles <a href="admin.php?page=Acurax-Social-Widget-Settings" target="_blank">here</a></p>
		<?php
	}
	// Processes the admin options form when saved
	function update($new_instance, $old_instance) 
	{
		// Get the old values
		$instance = $old_instance;
		// Update with any new values (and sanitise input)
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['icon_size'] = strip_tags( $new_instance['icon_size'] );
		$instance['icon_theme'] = strip_tags( $new_instance['icon_theme'] );
		$instance['icon_align'] = strip_tags( $new_instance['icon_align'] );
		return $instance;
	}
} add_action('widgets_init', create_function('', 'return register_widget("acx_social_widget_icons_Widget");'));
// Ending Widget Codes
function acurax_smw_optin()
{ 
echo "";
}
function socialicons_widget_comparison($ad=2)
{
$ad_1 = '
</hr>
<a name="compare"></a><div id="ss_middle_wrapper"> 
		<div id="ss_middle_center"> 
			<div id="ss_middle_inline_block"> 
			
				<div class="middle_h2_1"> 
					<h2>Limited on Features ?</h2>
					<h3>Compare and Decide</h3>
				</div><!-- middle_h2_1 -->
				
<div id="ss_features_table"> 
				
					<div id="ss_table_header"> 
						<div class="tb_h1"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
							<div class="tb_h2"> <h3>Features</h3> </div><!-- tb_h2 -->
							<div class="tb_h3"> <div class="ss_download"> </div><!-- ss_download --> </div><!-- tb_h3 -->
						<div class="tb_h4 fsmi_tb_h4"> <a href="http://clients.acurax.com/floating-socialmedia.php?utm_source=plugin_asmw_settings_table&utm_medium=link&utm_campaign=compare_buynow" target="_blank"><div class="ss_buy_now"> </div><!-- ss_buy_now --></a> </div><!-- tb_h4 -->
					</div><!-- ss_table_header -->
						
					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 197px;"> Display </div><!-- -->
						<div class="tb_h1 mini"> <h3>Features</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>More Sharp Quality Icons</li>
									<li>20+ Icon Theme/Style</li>
										<li>Can Choose Icon Theme/Style</li>
											<li>Can Choose Icon Size</li>
												<li>Automatic/Manual Integration</li>
													<li>Set MouseOver text for each icon in Share Mode</li>
												<li>Set MouseOver text for each icon in Profile Link Mode</li>
											<li>Option to HIDE Invididual Share Icon</li>
										<li><strong>Set Floating Icons in Vertical</strong></li>
									<li><strong>Define how many icons in 1 row</strong></li>
								<li class="ss_last_one"><strong>Add Custom Icons</strong></li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>FREE &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">PREMIUM</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
											<div class="ss_yes"> </div><!-- ss_yes -->
												<div class="ss_no"> </div><!-- ss_no -->
											<div class="ss_no"> </div><!-- ss_no -->
										<div class="ss_no"> </div><!-- ss_no -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
											<div class="ss_yes"> </div><!-- ss_yes -->
												<div class="ss_yes"> </div><!-- ss_yes -->
											<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->
					
					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 30px;"> Icon Function </div><!-- -->
						<div class="tb_h1 mini"> <h3>Features</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>Link to Social Media Profile</li>
								<li class="ss_last_one"><strong>Share On Social Media</strong></li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>FREE &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">PREMIUM</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->			

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 30px;"> Animation </div><!-- -->
						<div class="tb_h1 mini"> <h3>Features</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>Fly Animation</li>
								<li class="ss_last_one"><strong>Mouse Over Effects</strong></li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>FREE &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">PREMIUM</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 84px;"> Fly Animation Repeat Interval</div><!-- -->
						<div class="tb_h1 mini"> <h3>Features</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>Based On Time in Seconds</li>
									<li><strong>Based On Time in Minutes</strong></li>
										<li>Based On Time in Hours</li>
									<li>Based on Page Views</li>
								<li class="ss_last_one">Based On Page Views and Time</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>FREE &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">PREMIUM</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 30px;"> Multiple Fly Animation<br/></div><!-- -->
						<div class="tb_h1 mini"> <h3>Features</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>Can Choose Fly Start Position</li>
								<li class="ss_last_one">Can Choose Fly End Position</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>FREE &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">PREMIUM</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->				

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 52px;">Easy to Configure</div><!-- -->
						<div class="tb_h1 mini"> <h3>Features</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>Ajax Based Settings Page</li>
									<li>Drag & Drop Reorder Icons</li>
								<li class="ss_last_one">Easy to Configure</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>FREE &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">PREMIUM</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->			

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 106px;">Widget Support </div><!-- -->
						<div class="tb_h1 mini"> <h3>Features</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>Multiple Widgets</li>
									<li>Separate Icon Style/Theme For Each</li>
										<li>Separate Icon Size For Each</li>
										<li>Set whether the icons to Link Profiles/SHARE</li>
									<li><strong>Separate Mouse Over Multiple Animation for Each</strong></li>
								<li class="ss_last_one">Separate Default Opacity for Each</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>FREE &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">PREMIUM</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder">
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 106px;">Shortcode Support </div><!-- -->
						<div class="tb_h1 mini"> <h3>Features</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>Multiple Instances</li>
									<li>Separate Icon Style/Theme For Each</li>
										<li><strong>Separate Icon Size For Each</strong></li>
										<li>Set whether the icons to Link Profiles/SHARE</li>
									<li>Separate Mouse Over Multiple Animation for Each</li>
								<li class="ss_last_one">Separate Default Opacity for Each</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>FREE &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">PREMIUM</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder">
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>Feature Group</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 126px;">PHP Code Support </div><!-- -->
						<div class="tb_h1 mini"> <h3>Features</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>Multiple Instances</li>
									<li>Use Outside Loop</li>
										<li>Separate Icon Style/Theme For Each</li>
											<li>Separate Icon Size For Each</li>
										<li><strong>Set whether the icons to Link Profiles/SHARE</strong></li>
									<li>Separate Mouse Over Multiple Animation for Each</li>
								<li class="ss_last_one">Separate Default Opacity for Each</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>FREE &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">PREMIUM</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder">
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->						
					
				
					
				</div><!-- ss_features_table -->		

			<div id="ad_fsmi_2_button_order" style="float: left; width: 100%;">
<a href="http://clients.acurax.com/floating-socialmedia.php?utm_source=plugin_asmw_settings&utm_medium=banner&utm_campaign=plugin_yellow_order" target="_blank"><div id="ad_fsmi_2_button_order_link"></div></a></div> <!-- ad_fsmi_2_button_order --></div></div></div>';
$ad_2='<div id="ad_fsmi_2"> <a href="http://clients.acurax.com/floating-socialmedia.php?utm_source=plugin_smw_settings&utm_medium=banner&utm_campaign=plugin_enjoy" target="_blank"><div id="ad_fsmi_2_button"></div></a> </div> <!-- ad_fsmi_2 --><br>
<div id="ad_fsmi_2_button_order">
<a href="http://clients.acurax.com/floating-socialmedia.php?utm_source=plugin_smw_settings&utm_medium=banner&utm_campaign=plugin_yellow_order" target="_blank"><div id="ad_fsmi_2_button_order_link"></div></a></div> <!-- ad_fsmi_2_button_order --> ';
if($ad=="" || $ad == 2) { echo $ad_2; } else if ($ad == 1) { echo $ad_1; } else { echo $ad_2; } 
}
function acx_asmw_saveorder_callback()
{
	global $wpdb;
$social_widget_icon_array_order = $_POST['recordsArray'];
if (current_user_can('manage_options')) {
	$social_widget_icon_array_order = serialize($social_widget_icon_array_order);
	update_option('social_widget_icon_array_order', $social_widget_icon_array_order);
	echo "<div id='acurax_notice' align='center' style='width: 420px; font-family: arial; font-weight: normal; font-size: 22px;'>";
	echo "Social Media Icon's Order Saved";
	echo "</div><br>";
}
	die(); // this is required to return a proper result
} add_action('wp_ajax_acx_asmw_saveorder', 'acx_asmw_saveorder_callback');
function acx_quick_widget_request_submit_callback()
{
	
	$acx_name =  $_POST['acx_name'];
	$acx_email =  $_POST['acx_email'];
	$acx_phone =  $_POST['acx_phone'];
	$acx_weburl =  $_POST['acx_weburl'];
	$acx_subject =  $_POST['acx_subject'];
	$acx_question =  $_POST['acx_question'];
	$acx_smw_es = $_POST['acx_smw_es'];
	if (!wp_verify_nonce($acx_smw_es,'acx_smw_es'))
	{
	$acx_smw_es == "";
	}
	if(!current_user_can('manage_options'))
	{
	$acx_smw_es == "";
	}
if($acx_smw_es == "" || $acx_name == "" || $acx_email == "" || $acx_phone == "" || $acx_weburl == "" || $acx_subject == "" || $acx_question == "")
{
echo 2;
} else
{
$current_user_acx = wp_get_current_user();
$current_user_acx = $current_user->user_email;
if($current_user_acx == "")
{
$current_user_acx = $acx_email;
}
$headers[] = 'From: ' . $acx_name . ' <' . $current_user_acx . '>';
$headers[] = 'Content-Type: text/html; charset=UTF-8'; 
$message = "Name: ".$acx_name . "\r\n <br>";
$message = $message . "Email: ".$acx_email . "\r\n <br>";
if($acx_phone != "")
{
$message = $message . "Phone: ".$acx_phone . "\r\n <br>";
}
// In case any of our lines are larger than 70 characters, we should use wordwrap()
$acx_question = wordwrap($acx_question, 70, "\r\n <br>");
$message = $message . "Request From: SMW - Expert Help Request Form \r\n <br>"; 
$message = $message . "Website: ".$acx_weburl . "\r\n <br>";
$message = $message . "Question: ".$acx_question . "\r\n <br>";
$message = stripslashes($message);
$acx_subject = "Quick Support - " . $acx_subject;
$emailed = wp_mail( 'info@acurax.com', $acx_subject, $message, $headers );
if($emailed)
{
echo 1;
} else
{
echo 0;
}
}
	die(); // this is required to return a proper result
}add_action('wp_ajax_acx_quick_widget_request_submit','acx_quick_widget_request_submit_callback');

	$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 
	if(is_serialized($social_widget_icon_array_order)) 
		{ 
	$social_widget_icon_array_order = unserialize($social_widget_icon_array_order); 
	} 
	function acx_asmw_orderarray_refresh() 
		{ 
			global $social_widget_icon_array_order; 
			/* Starting The Logic Count and Re Configuring Order Array */    
			$total_arrays = ACX_SMW_TOTAL_STATIC_SERVICES; // Number Of Static Services ,<< Earlier its 10 
			if(is_serialized($social_widget_icon_array_order)) 
			{ 
				$social_widget_icon_array_order = unserialize($social_widget_icon_array_order); 
			} 
			if($social_widget_icon_array_order == "") 
			{ 
				$social_widget_icon_array_order = array(); 
			}    
			if (empty($social_widget_icon_array_order))  
			{ 
				for( $i = 0; $i < $total_arrays; $i++ ) 
				{ 
					array_push($social_widget_icon_array_order,$i); 
				} 	
				if(!is_serialized($social_widget_icon_array_order)) 
				{ 
				$social_widget_icon_array_order = serialize($social_widget_icon_array_order); 
				} 
				update_option('social_widget_icon_array_order', $social_widget_icon_array_order); 
			}
			else  
			{ 
			// Counting and Adding New Keys (UPGRADE PURPOSE) 
			$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 
			if(is_serialized($social_widget_icon_array_order)) 
			{ 
				$social_widget_icon_array_order = unserialize($social_widget_icon_array_order); 
			} 
			$social_icon_array_count = count($social_widget_icon_array_order);  
			if ($social_icon_array_count < $total_arrays)  
			{ 
				for( $i = $social_icon_array_count; $i < $total_arrays; $i++ ) 
				{ 
					array_push($social_widget_icon_array_order,$i); 
				} // for 
			}
			else 
			{ 
				$acx_temp_array = $social_widget_icon_array_order; 
				foreach ($social_widget_icon_array_order as $key => $value) 
				{ 
					if($social_widget_icon_array_order[$key]>=$total_arrays) 
					{ 
						unset($acx_temp_array[$key]); 
					} 
					} 
					$acx_temp_array = array_values($acx_temp_array); 
					$social_widget_icon_array_order = $acx_temp_array; 
				} 
				if(!is_serialized($social_widget_icon_array_order)) 
				{ 
					$social_widget_icon_array_order = serialize($social_widget_icon_array_order); 
				} 
				update_option('social_widget_icon_array_order', $social_widget_icon_array_order); 
			} // else closing of if array null 
				/* Ending The Logic Count and Re Configuring Order Array */  
		} 
function acx_asmw_service_banners()
{
?>
<div id="acx_ad_banners_asmw">
<?php
$acx_asmw_service_banners = get_option('acx_si_smw_acx_service_banners');
if ($acx_asmw_service_banners != "no") { ?>
<div id="acx_ad_banners_asmw">
<a href="http://wordpress.acurax.com/?utm_source=asmw&utm_campaign=sidebar_banner_1" target="_blank" class="acx_ad_asmw_1">
<div class="acx_ad_asmw_title">Need Help on Wordpress?</div> <!-- acx_ad_asmw_title -->
<div class="acx_ad_asmw_desc">Instant Solutions for your wordpress Issues</div> <!-- acx_ad_asmw_desc -->
</a> <!--  acx_ad_asmw_1 -->

<a href="http://wordpress.acurax.com/?utm_source=asmw&utm_campaign=sidebar_banner_2" target="_blank" class="acx_ad_asmw_1">
<div class="acx_ad_asmw_title">Unique Design For Better Branding</div> <!-- acx_ad_asmw_title -->
<div class="acx_ad_asmw_desc acx_ad_asmw_desc2" style="padding-top: 0px; padding-left: 50px; height: 41px; font-size: 13px; text-align: center;">Get Responsive Custom Designed Website For High Conversion</div> <!-- acx_ad_asmw_desc -->
</a> <!--  acx_ad_asmw_1 -->

<a href="http://wordpress.acurax.com/?utm_source=asmw&utm_campaign=sidebar_banner_3" target="_blank" class="acx_ad_asmw_1">
<div class="acx_ad_asmw_title">Affordable Website Packages</div> <!-- acx_ad_asmw_title -->
<div class="acx_ad_asmw_desc acx_ad_asmw_desc3" style="padding-top: 0px; height: 32px; font-size: 13px; text-align: center;">Get Feature Rich Packages For a Custom Designed Website</div> <!-- acx_ad_asmw_desc -->
</a> <!--  acx_ad_asmw_1 -->

</div> <!--  acx_ad_banners_asmw -->
<?php } else { ?>
<div class="acx_asmw_sidebar_widget">
<div class="acx_asmw_sidebar_w_title">We Are Always Available</div> <!-- acx_ad_asmw_title -->
<div class="acx_asmw_sidebar_w_content">
We know you are in the process of improving your website, and we the team at Acurax is always available for any help or support that you need. <a href="http://wordpress.acurax.com/?utm_source=asmw&utm_campaign=sidebar_text_1" target="_blank">Get in touch</a>
</div>
</div> <!-- acx_asmw_sidebar_widget -->


<div class="acx_asmw_sidebar_widget">
<div class="acx_asmw_sidebar_w_title">Do You Know?</div> <!-- acx_ad_asmw_title -->
<div class="acx_asmw_sidebar_w_content acx_asmw_sidebar_w_content_p_slide">
</div>
</div> <!-- acx_asmw_sidebar_widget -->
<script type="text/javascript">
var acx_asmw = new Array("A professionally designed website is the most cost effective marketing tool available in the world today...","Personalizing your website can create a unique one to one experience and convert your visitors into customers.","70% of searches from mobile devices are followed up with an action within 1 hour.");
// jQuery(".acx_asmw_sidebar_w_content_p_slide p").height('30px');
function acx_asmw_t_rotate()
{
acx_asmw_text = acx_asmw[Math.floor(Math.random()*acx_asmw.length)];
jQuery(".acx_asmw_sidebar_w_content_p_slide").fadeOut('slow')
jQuery(".acx_asmw_sidebar_w_content_p_slide").text(acx_asmw_text);
jQuery(".acx_asmw_sidebar_w_content_p_slide").fadeIn('fast');
}
jQuery(document).ready(function() {
acx_asmw_t_rotate();
 setInterval(function(){ acx_asmw_t_rotate(); }, 8000);
});
</script>
<div class="acx_asmw_sidebar_widget">
<div class="acx_asmw_sidebar_w_title">Grab The Blending Creativity</div>
<div class="acx_asmw_sidebar_w_content">Make your website user friendly and optimized for mobile devices for better user interaction and satisfaction <a href="http://wordpress.acurax.com/?utm_source=asmw&utm_campaign=sidebar_text_2" target="_blank">Click Here</a></div>
</div> <!-- acx_asmw_sidebar_widget -->
<?php } ?>
<div class="acx_asmw_sidebar_widget">
<div class="acx_asmw_sidebar_w_title">Rate us on wordpress.org</div>
<div class="acx_asmw_sidebar_w_content" style="text-align:center;font-size:13px;"><b>Thank you for being with us... If you like our plugin then please show us some love </b></br>
<a href="https://wordpress.org/support/view/plugin-reviews/acurax-social-media-widget/" target="_blank" style="text-decoration:none;">
<span id="acx_asmw_stars">
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
<span class="dashicons dashicons-star-filled"></span>
</span>
<span class="acx_asmw_star_button button button-primary">Click Here</span>
</a>
<p>If you are facing any issues, kindly post them at plugins support forum <a href="http://wordpress.org/support/plugin/acurax-social-media-widget/" target="_blank">here</a>
</div>
</div> <!-- acx_asmw_sidebar_widget -->
</div> <!--  acx_ad_banners_asmw -->
<?php
}
function acx_asmw_quick_form()
{
if(ISSET($_SERVER['HTTP_HOST']))
{
$acx_installation_url = $_SERVER['HTTP_HOST'];
} else
{
$acx_installation_url = "";
}
?>
<div class="acx_asmw_es_common_raw acx_asmw_es_common_bg">
	<div class="acx_asmw_es_middle_section">
    
    <div class="acx_asmw_es_acx_content_area">
    	<div class="acx_asmw_es_wp_left_area">
        <div class="acx_asmw_es_wp_left_content_inner">
        	<div class="acx_asmw_es_wp_main_head">Do you Need Technical Support Services to Get the Best Out of Your Wordpress Site ?</div> <!-- wp_main_head -->
            <div class="acx_asmw_es_wp_sub_para_des">Acurax offer a number of WordPress related services: Form installing WordPress on your domain to offering support for existing WordPress sites.</div> <!-- acx_asmw_es_wp_sub_para_des -->
            <div class="acx_asmw_es_wp_acx_service_list">
            	<ul>
                <li>Troubleshoot WordPress Site Issues</li>
                    <li>Recommend & Install Plugins For Improved WordPress Performance</li>
                    <li>Create, Modify, Or Customise, Themes</li>
                    <li>Explain Errors And Recommend Solutions</li>
                    <li>Custom Plugin Development According To Your Needs</li>
                    <li>Plugin Integration Support</li>
                    <li>Many <a href="http://wordpress.acurax.com/?utm_source=asmw&utm_campaign=expert_support" target="_blank">More...</a></li>
               </ul>
            </div> <!-- acx_asmw_es_wp_acx_service_list -->
            
   <div class="acx_asmw_es_wp_send_ylw_para">We Have Extensive Experience in WordPress Troubleshooting,Theme Design & Plugin Development.</div> <!-- acx_asmw_es_wp_secnd_ylw_para-->
   
        </div> <!-- acx_asmw_es_wp_left_content_inner -->
        </div> <!-- acx_asmw_es_wp_left_area -->
        
        <div class="acx_asmw_es_wp_right_area">
        	<div class="acx_asmw_es_wp_right_inner_form_wrap">
            	<div class="acx_asmw_es_wp_inner_wp_form">
                <div class="acx_asmw_es_wp_form_head">WE ARE DEDICATED TO HELP YOU. SUBMIT YOUR REQUEST NOW..!</div> <!-- acx_asmw_es_wp_form_head -->
                <form class="acx_asmw_es_wp_support_acx">
                <span class="acx_asmw_es_cnvas_input acx_asmw_es_half_width_sec acx_asmw_es_haif_marg_right"><input type="text" placeholder="Name*" id="acx_name"></span> <!-- acx_asmw_es_cnvas_input -->
                <span class="acx_asmw_es_cnvas_input acx_asmw_es_half_width_sec acx_asmw_es_haif_marg_left"><input type="email" placeholder="Email*" id="acx_email"></span> <!-- acx_asmw_es_cnvas_input -->
                <span class="acx_asmw_es_cnvas_input acx_asmw_es_half_width_sec acx_asmw_es_haif_marg_right"><input type="text" placeholder="Phone Number*" id="acx_phone"></span> <!-- acx_asmw_es_cnvas_input -->
                <span class="acx_asmw_es_cnvas_input acx_asmw_es_half_width_sec acx_asmw_es_haif_marg_left"><input type="text" placeholder="Website URL*" value="<?php echo $acx_installation_url; ?>" id="acx_weburl"></span> <!-- acx_asmw_es_cnvas_input -->
                <span class="acx_asmw_es_cnvas_input"><input type="text" placeholder="Subject*" id="acx_subject"></span> <!-- acx_asmw_es_cnvas_input -->
                <span class="acx_asmw_es_cnvas_input"><textarea placeholder="Question*" id="acx_question"></textarea></span> <!-- acx_asmw_es_cnvas_input -->
                <span class="acx_asmw_es_cnvas_input"><input class="acx_asmw_es_wp_acx_submit" type="button" value="SUBMIT REQUEST" onclick="acx_quick_widget_request_submit();"></span> <!-- acx_asmw_es_cnvas_input -->
                </form>
                </div> <!-- acx_asmw_es_wp_inner_wp_form -->
            </div> <!-- acx_asmw_es_wp_right_inner_form_wrap -->
        </div> <!-- acx_asmw_es_wp_left_area -->
    </div> <!-- acx_asmw_es_acx_content_area -->
    
    <div class="acx_asmw_es_footer_content_cvr">
    <div class="acx_asmw_es_wp_footer_area_desc">Its our pleasure to thank you for using our plugin and being with us. We always do our best to help you on your needs. If you like to hide this menu, you can do so at <a href="admin.php?page=Acurax-Social-Widget-Misc">Misc</a> page which is under our plugin options.</div> <!--acx_asmw_es_wp_footer_area_desc -->
    </div> <!-- acx_asmw_es_footer_content_cvr -->
    
    </div> <!-- acx_asmw_es_middle_section -->
</div> <!--acx_asmw_es_common_raw -->
<script type="text/javascript">
var request_acx_form_status = 0;
function acx_quick_form_reset()
{
jQuery("#acx_subject").val('');
jQuery("#acx_question").val('');
}
acx_quick_form_reset();
function acx_quick_widget_request_submit()
{
var acx_name = jQuery("#acx_name").val();
var acx_email = jQuery("#acx_email").val();
var acx_phone = jQuery("#acx_phone").val();
var acx_weburl = jQuery("#acx_weburl").val();
var acx_subject = jQuery("#acx_subject").val();
var acx_question = jQuery("#acx_question").val();
var order = '&action=acx_quick_widget_request_submit&acx_name='+acx_name+'&acx_email='+acx_email+'&acx_phone='+acx_phone+'&acx_weburl='+acx_weburl+'&acx_subject='+acx_subject+'&acx_question='+acx_question+'&acx_smw_es=<?php echo wp_create_nonce("acx_smw_es"); ?>'; 
if(request_acx_form_status == 0)
{
request_acx_form_status = 1;
jQuery.post(ajaxurl, order, function(quick_request_acx_response)
{
if(quick_request_acx_response == 1)
{
alert('Your Request Submitted Successfully!');
acx_quick_form_reset();
request_acx_form_status = 0;
} else if(quick_request_acx_response == 2)
{
alert('Please Fill Mandatory Fields.');
request_acx_form_status = 0;
} else
{
alert('There was an error processing the request, Please try again.');
acx_quick_form_reset();
request_acx_form_status = 0;
}
});
} else
{
alert('A request is already in progress.');
}
}
</script>
<?php } ?>