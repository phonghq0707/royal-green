<div class="social-list <?php echo esc_attr($el_class)?>">
	<?php
    if(is_array($data)){
        foreach ($data as $key => $value){
        	$value = array_merge($default_val,$value);
            if(!empty($value['link']) && !empty($value['icon'])) echo '<a href="'.esc_url($value['link']).'"><i class="fa '.$value['icon'].'"></i></a>';
        }
    }
    ?>
</div>