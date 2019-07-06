<?php
    if(empty($itemres)) $itemres = '0:1,480:2,768:3,990:4';
?>
<div class="box-statistic">
	<div class="wrap-item smart-slider owl-carousel owl-theme group-navi" 
			data-item="" data-speed="" 
			data-itemres="<?php echo esc_attr($itemres)?>" 
			data-prev="" data-next="" 
			data-pagination="" data-navigation="true">
		<?php
		if(is_array($data)){
			foreach ($data as $key => $value) {
				$value = array_merge($default_val,$value);
				$attr_item = array(
							'title' => $value['title'],
							'alt' => $value['des'],
							);
				?>
				<div class="item-statistic text-center"> 
					<?php if(!empty($value['title'])){ ?>
						<div class="title-clients numscroller title48 color2 font-bold" data-min='1' data-max='<?php echo esc_attr($value['title'])  ?>' data-delay='5' data-increment='10'><?php echo esc_html($value['title']) ?></div>
					<?php } ?>
					<?php if(!empty($value['des'])){ ?>
						<h3 class="desc-clients white title14"><?php echo esc_html($value['des']) ?></h3>
					<?php } ?>
				</div>
			<?php }
		}?>
	</div>
</div>