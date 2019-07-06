<?php
$check = true;
if(isset($_SESSION['dont_show_popup'])) $check = !$_SESSION['dont_show_popup'];
if($check):
?>
<div id="boxes-content">
	<div class="window" id="dialog">
	    <div class="window-popup"> 
	        <div class="content-popup newsletter-popup">
	        	<div class="content-newsletter-popup">
					<div class="block-element newsletter-form <?php echo esc_attr($el_class);?> sv-mailchimp-form" data-placeholder="<?php echo esc_attr($placeholder);?>" data-submit="<?php echo esc_attr($submit);?>">
					    <?php 
					    if(!empty($image)) echo wp_get_attachment_image($image,'full');
					    if(!empty($title)) echo '<h2 class="title18 font-bold text-uppercase">'.esc_html($title).'</h2>';
					    echo 	'<div class="row">
									<div class="col-md-5 col-sm-5 col-xs-12">';
						if(!empty($des)) echo '<p class="desc">'.esc_html($des).'</p>';
						echo 		'</div>
									<div class="col-md-7 col-sm-7 col-xs-12">';
						if(!empty($form_html)) echo '<div class="form-newsletter form-popup">'.apply_filters('s7upf_output_content',$form_html).'</div>';						
						echo 		'</div>
								</div>';
					    ?>
					    <input type="checkbox" id="close-newsletter"> <label for="close-newsletter"><?php esc_html_e("Don't show again","fattoria")?></label>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="mask"></div>
</div>
<?php endif;?>