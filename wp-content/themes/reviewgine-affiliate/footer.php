<div id="main-content">
		<footer id="main-footer">
			<div class="container">

						<?php
     			if(is_active_sidebar("footer-sidebar")) {
     				dynamic_sidebar("footer-sidebar");
     			} else { 
     				$args = array(
						'before_widget' => '<div class="footer-widget">',
						'after_widget' => '</div>',
						'before_title' => '<section><h3>',
						'after_title' => '</h3></section>',
     				);
     				$text_widget = array(
     						'title'	=> __('Tentang Cileungsiku.com','cwp'),
     						'text'	=> __('Cileungsiku.com, dibangun atas dasar ide sebagai Media Informasi terupdate dan sangat bermanfaat bagi setiap pengunjung.','cwp')
     					);
     				$recent_posts = array(
     						'title'	 => __('Recent Posts','cwp'),
     						'number' => '5'
     					);
     				$recent_comments = array(
     						'title'	 => __('Recent Comments','cwp'),
     						'number' => '5'
     					);
     				
				}

     	?>

			</div><!-- end .container -->
		</footer><!-- end #main-footer -->

		<div id="lower-footer">
			<div class="container">
				<div class="left"><?php echo cwp("cwp_footer_message"); ?></div>
				<div class="right">
			<a href="http://www.cileungsiku.com/" title="Cileungsiku.com" rel="nofollow">
				Cileungsiku.com</a>
			<?php _e("crafted by",'cwp');?> <a href="http://btresearcher.com/" title="btresearcher.com">
				btresearcher.com
		</div>
			</div><!-- end .container -->
		</div><!-- end #lower-footer -->
	</div><!-- end .wrapper -->


<?php echo cwp("cwp_custom_body_code"); ?>
	<?php wp_footer(); ?>
</body>
</html>
