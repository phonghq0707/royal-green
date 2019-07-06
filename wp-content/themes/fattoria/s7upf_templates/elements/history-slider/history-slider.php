<div class="wrap-item-history">	
	<div id="sync1" class="owl-carousel owl-theme">
		<?php
		if(is_array($data)){
			foreach ($data as $key => $value){
				$value = array_merge($default_val,$value);
				if(!empty($value['title']) && !empty($value['desc'])) 
					echo '<div class="item-history text-center"><h3 class="title18 black font-bold">'.esc_html($value['title']).'</h3>'.'<p class="desc">'.esc_html($value['desc']).'</p></div>';
			}
		}
		?>
	</div>
</div>
<div class="wrap-year-history">
	<div id="sync2" class="number-year-history owl-carousel owl-theme">
		<?php
		if(is_array($data)){
			foreach ($data as $key => $value){
				$value = array_merge($default_val,$value);
				if(!empty($value['number_year'])) 
					echo '<a href="#"><h3 class="title18 year-history text-center color font-bold">'.esc_html($value['number_year']).'</h3></a>';
			}
		}
		?>
	</div>
</div>
