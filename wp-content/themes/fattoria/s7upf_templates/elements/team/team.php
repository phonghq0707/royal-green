<div class="item-about-team text-center <?php echo esc_attr($el_class)?>">
	<div class="about-team-thumb">
		<a href="<?php echo esc_url($link)?>"><?php echo wp_get_attachment_image($image,'full',0)?></a>
		<?php
	    if(is_array($data)){
	    	echo '<div class="share-social-team">';
	        foreach ($data as $key => $value){
	        	$value = array_merge($default_val,$value);
	            if(!empty($value['link']) && !empty($value['icon'])) echo '<a href="'.esc_url($value['link']).'"><i class="fa '.$value['icon'].'"></i></a>';
	        }
	        echo '</div>';
	    }
	    ?>
	</div>
	<div class="about-team-info">
		<?php if(!empty($des)):?><p class="desc"><?php echo esc_html($des)?> </p><?php endif;?>
		<?php if(!empty($title)):?><h3 class="title18 font-bold"><a href="<?php echo esc_url($link)?>" class="dark"><?php echo esc_html($title)?></a></h3><?php endif;?>
	</div>
</div>