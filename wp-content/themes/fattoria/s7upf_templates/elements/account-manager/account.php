<div class="account-manager dropdown-box <?php echo esc_attr($el_class)?> <?php echo esc_attr($style)?>">
	<?php
	$head_html = $sub_html = $login_icon_html = $register_icon_html = $logout_icon_html = $my_account_html = '';

	$current_user = wp_get_current_user();

	if ( ($current_user instanceof WP_User) ) $avatar = get_avatar( $current_user->user_email, 16 );

	$my_account_html = esc_html__("Login","fattoria");

	if(!empty($login_icon)) $login_icon_html = '<i class="'.esc_attr($login_icon).'"></i>';
	if(!empty($register_icon)) $register_icon_html = '<i class="'.esc_attr($register_icon).'"></i>';
	if(!empty($logout_icon)) $logout_icon_html = '<i class="'.esc_attr($logout_icon).'"></i>';
	$account_id = get_option('woocommerce_myaccount_page_id');
	if(empty($login_url)){
		if($account_id) $login_url = get_permalink( $account_id );
		else $login_url = wp_login_url();
	}
    if(empty($register_url)){
    	if($account_id) $register_url = get_permalink( $account_id );
		else $register_url = wp_registration_url();
    }
	if(is_user_logged_in()){
		$name = '';
		$roles = array();
		$current_user = wp_get_current_user();
		if(!empty($current_user)){
			$name = $current_user->data->display_name;
			$roles = $current_user->roles;
		}
		$head_html = '<a href="'.esc_url($login_url).'">'.$avatar.' '.esc_html__("Hi!","fattoria").' '.esc_html($name).'</a>';
		$icon_account = '<a class="account-icon" href="javascript:void(0);"><i class="title24 la la-user"></i></a>';

		if(is_array($data)){
	        foreach ($data as $key => $value){
	        	$value = array_merge($default_val,$value);
	        	if(!empty($value['icon'])) $icon_html = '<i class="'.esc_attr($value['icon']).'"></i>';
	        	else $icon_html = '';
	        	$list_roles = explode(',', $value['roles']);
	        	if(empty($value['roles'])) $check_show = true;
	        	else $check_show = count(array_intersect($roles, $list_roles)) == count($roles);
	            if(!empty($value['link']) && !empty($value['title']) && $check_show) $sub_html .= '<li><a href="'.esc_url($value['link']).'">'.$icon_html.$value['title'].'</a></li>';
	        }
	    }
	    if(empty($list)) $sub_html .= '<li><a href="'.esc_url($login_url).'">'.esc_html__("My Account","fattoria").'</a></li>';
		$sub_html .= '<li><a href="'.esc_url(wp_logout_url($redirect_url)).'">'.$logout_icon_html.esc_html__("Logout","fattoria").'</a></li>';
	}
	else{
		$icon_account = '<a class="open-login-form" href="'.esc_url($login_url).'"><i class="title24 la la-user"></i></a>';

		if($login_url != $register_url){
			$sub_html .= '<li><a class="login-popup" href="'.esc_url($login_url).'">'.$login_icon_html.esc_html__("Login","fattoria").'</a></li>';
			$sub_html .= '<li><a class="register-popup" href="'.esc_url($register_url).'">'.$register_icon_html.esc_html__("Register","fattoria").'</a></li>';
		}
		else $sub_html .= '<li><a class="login-popup" href="'.esc_url($login_url).'">'.$login_icon_html.esc_html__("Login / Register","fattoria").'</a></li>';
	}
    ?>

    <?php echo apply_filters('s7upf_output_content',$icon_account);?>

    <?php if(is_user_logged_in()): ?>
	    <ul class="list-none dropdown-list">
	    	<li class="login-status"><?php echo apply_filters('s7upf_output_content',$head_html);?></li>
	    	<?php echo apply_filters('s7upf_output_content',$sub_html);?>
	    </ul>
	<?php endif;?>
</div>