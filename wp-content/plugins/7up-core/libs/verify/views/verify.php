<div class="wrap">
    <h2><?php esc_html_e('Verify Purchase Code','7up-core') ?></h2>
</div>
<?php 
$checkvr = s7upf_check_verify();
if(!$checkvr) $ms_class = 'd-block';
else $ms_class = 'd-hidden';
?>
<p id="message" class="vr-message message-info <?php echo esc_attr($ms_class)?>">
    <strong><?php esc_html_e('Please activate your theme to enable premium features.','7up-core') ?></strong>
</p>
<div id="user-form">
	<?php
	$code_to_verify = get_option('user_purchase_code','');
    $envato_name = get_option('user_envato_name','');
	?>
	<p><?php esc_html_e('Your Envato username*','7up-core') ?></p>
	<p><input class="regular-text" name="user_envato_name" value="<?php echo esc_attr($envato_name)?>"></p>
	<p><?php esc_html_e('Your Purchase code*','7up-core') ?></p>
	<p><input type="password" class="regular-text" name="user_purchase_code" value="<?php echo esc_attr($code_to_verify)?>"></p>
	<p class="submit">
		<a href="#" class="button button-primary check-verify"><?php esc_html_e("Save Changes","7up-core")?></a>
	</p>
</div>
<div id="check-result">
	<?php
	$theme = wp_get_theme();
	if($checkvr){
		echo '<div class="vr-message message-success">';
		echo 	'<p><strong>'.esc_html__('Successful activation!','7up-core').'</strong></p>';
		echo 	'<p><strong>'.esc_html__('Your Information:','7up-core').'</strong></p>';
		$data = s7upf_get_verify_data($code_to_verify);
		if(isset($data['buyer'])){
			echo 	'<p><strong>'.esc_html__('Item name: ','7up-core').'</strong>'.$data['item_name'].'</p>';
			echo 	'<p><strong>'.esc_html__('Item ID: ','7up-core').'</strong>'.$data['item_id'].'</p>';
			echo 	'<p><strong>'.esc_html__('Created at: ','7up-core').'</strong>'.$data['created_at'].'</p>';
			echo 	'<p><strong>'.esc_html__('Buyer: ','7up-core').'</strong>'.$data['buyer'].'</p>';
			echo 	'<p><strong>'.esc_html__('Licence: ','7up-core').'</strong>'.$data['licence'].'</p>';
			echo 	'<p><strong>'.esc_html__('Supported until: ','7up-core').'</strong>'.$data['supported_until'].'</p>';
		}
		echo 	'<p>
					'.esc_html__('Go to our forum to create your topic if you have any problem with our theme','7upframework').'
					<a href="'.esc_url('http://7uptheme.com/wordpress/forum/forums/forum/wordpress/').$theme->get( 'TextDomain' ).'">'.esc_html__("7uptheme Forum","7up-core").'</a>
				</p>';
		echo '</div>';
	}
	else{
		if($code_to_verify == '' && $envato_name == '') echo '<p class="vr-message message-error">'.esc_html__('Your current theme has not been activated. Please enter the information and activate to start using our products.','7upframework').'</p>';
		else echo '<p class="vr-message message-error">'.esc_html__('Your Invalid information!. Please recheck envato username or purchase code','7upframework').'</p>';
	}
	?>
</div>
<style>
#verify-notice{
	display: none;
}
</style>