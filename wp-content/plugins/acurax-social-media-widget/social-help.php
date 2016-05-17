<div id="acx_help_page">
<?php
$acx_si_smw_hide_advert = get_option('acx_si_smw_hide_advert');
if ($acx_si_smw_hide_advert == "") {	$acx_si_smw_hide_advert = "no"; }
if($acx_si_smw_hide_advert == "no")
{
?>
<div id="acx_asmw_premium">
<a href="#compare" style="margin: 10px 0px 0px 10px; font-weight: bold; font-size: 14px; display: block;">Fully Featured - Acurax Social Media Widget is Available With Tons of Extra Features!</a><a href="http://clients.acurax.com/floating-socialmedia.php/?utm_source=asmw&utm_campaign=day_button" target="_blank" class="buy_now"></a></div> <!-- acx_fsmi_premium -->
<?php } ?>
<h2>Acurax Social Media Widget - Wordpress Plugin - Help/Support</h2>
<p style="text-align:center;">Thank you for using Acurax Social Media Widget Plugin For Your Wordpress Social Media Profile Linking Need.</p>
<h3 style="text-align:center;"><a href="http://clients.acurax.com/link.php?id=14" target="_blank" class="button">Click here to open the FAQ and Help Page</a></h3>
<?php 
if($acx_si_smw_hide_advert == "no")
{
socialicons_widget_comparison(1);
acurax_smw_optin();
}
?>
</div> <!-- acx_help_page -->