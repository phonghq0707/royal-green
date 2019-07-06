(function($){
    "use strict"; // Start of use strict  

    // login popup
    function login_popup(){
    	$('.popup-form').find('input:not(.button)').on('focusin',function(){    		
    		$(this).parent().addClass('input-focus');
    	}).on('focusout',function(){
    		$(this).parent().removeClass('input-focus');
    	})
    	$('.popup-form').find('input:not(.button)').each(function(){
    		if($(this).val()) $(this).parent().addClass('has-value');
    		else $(this).parent().removeClass('has-value');    		
    	})
    	$('.popup-form').find('input:not(.button)').on('keyup',function(){
    		$(this).parent().removeClass('invalid');
			if($(this).val()) $(this).parent().addClass('has-value');
			else $(this).parent().removeClass('has-value');
    	})
    	$('.open-login-form,.login-popup,.register-popup,.lostpass-popup').on('click',function(e){
    		if(!$(this).parents('.disable-popup').length > 0){
	    		e.preventDefault();
	    		$('.login-popup-content-wrap').fadeIn();
	    		if($(this).hasClass('register-popup')) $('.register-link').trigger('click');
	    		if($(this).hasClass('lostpass-popup')) $('.lostpass-link').trigger('click');
	    	}
    	})
    	$('.close-login-form,.popup-overlay').on('click',function(e){
    		e.preventDefault();
    		$('.login-popup-content-wrap').fadeOut();
    	})
    	$('.popup-redirect').on('click',function(e){
    		e.preventDefault();
    		var id = $(this).attr('href');
    		$('.ms-default').fadeOut();
    		$('.popup-form').removeClass('active');
    		$(id).parents('.popup-form').addClass('active');
    	})
    	$('#login_error a').on('click',function(){
    		$('.lostpass-link').trigger('click');
    	})
    }

    // fix append css
    function fix_css_append(){
		var css_data = String($('#s7upf-theme-style-inline-css').html());
		$('#s7upf-theme-style-inline-css').remove();
	    if(css_data) $('head').append('<'+'style id="s7upf-theme-style-inline-css">'+css_data+'</style>');
    }
    // Letter popup
    function letter_popup(){
    	//Popup letter
		var content = $('#boxes-content').html();
		$('#boxes-content').html('');
		if(content) $('body').append('<div id="boxes">'+content+'</div>');
		if($('#boxes').html() != ''){
			var id = '#dialog';	
			//Get the screen height and width
			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
		
			//Set heigth and width to mask to fill up the whole screen
			$('#mask').css({'width':maskWidth,'height':maskHeight});
			
			//transition effect		
			$('#mask').fadeIn(500);	
			$('#mask').fadeTo("slow",0.6);	
		
			//Get the window height and width
			var winH = $(window).height();
			var winW = $(window).width();
	              
			//Set the popup window to center
			$(id).css('top',  winH/2-$(id).height()/2);
			$(id).css('left', winW/2-$(id).width()/2);
		
			//transition effect
			$(id).fadeIn(2000); 	
		
			//if close button is clicked
			$('.window .close-popup').on('click',function (e) {
				//Cancel the link behavior
				e.preventDefault();
				
				$('#mask').hide();
				$('.window').hide();
			});		
			
			//if mask is clicked
			$('#mask').on('click',function () {
				$(this).hide();
				$('.window').hide();
			});
		}
		//End popup letter
    }

    /************** FUNCTION ****************/ 
    function tool_panel(){
    	$('.dm-open').on('click',function(){
    		$('#widget_indexdm').toggleClass('active');
    		$('#indexdm_img').toggleClass('active');
    		return false;
    	})
    	$('.dm-content .item-content').on('hover',function(){
    		if(!$(this).hasClass('active')){
    			$('.img-demo').removeClass('dm-scroll-img');
				setTimeout(function() {
					$('.img-demo').addClass('dm-scroll-img');
				},20);
    			$(this).parent().find('.item-content').removeClass('active');
    			$(this).addClass('active');
    		}
			$('#indexdm_img').addClass('active');
			var img_src = $(this).find('img').attr('data-src');			
			$('.img-demo').css('display','block');
			$('.img-demo').css('background-image','url('+img_src+')');
    	});
    	$('.img-demo').mouseenter(function(){
			$(this).addClass('pause');
	        }).mouseleave(function(){
	        $(this).removeClass('pause');
	    });
    	var default_data = $('#s7upf-theme-style-inline-css').html();    	
    	$('.dm-color').on('click',function(){
    		$(this).parent().find('.dm-color').removeClass('active');
    		$(this).addClass('active');
    		var color,color2,rgb,rgb2;
    		var data = $('.get-data-css').attr('data-css');
    		var sep = new RegExp('##', 'gi');
    		data = data.replace(sep,'"', -1);
    		// Color 1
    		var color_old = $('.get-data-css').attr('data-color');
    		var rgb_old = $('.get-data-css').attr('data-rgb');
    		var color_df = $('.get-data-css').attr('data-colordf');
    		var rgb_df = $('.get-data-css').attr('data-rgbdf');
    		if($(this).attr('data-color')) $('.get-data-css').attr('data-color',$(this).attr('data-color'));
    		if($(this).attr('data-rgb')) $('.get-data-css').attr('data-rgb',$(this).attr('data-rgb'));
    		color = $('.get-data-css').attr('data-color');    		
    		rgb = $('.get-data-css').attr('data-rgb');

    		// Color 2
    		var color2_old = $('.get-data-css').attr('data-color2');
    		var rgb2_old = $('.get-data-css').attr('data-rgb2');
    		var color2_df = $('.get-data-css').attr('data-color2df');
    		var rgb2_df = $('.get-data-css').attr('data-rgb2df');
    		if($(this).attr('data-color2')) $('.get-data-css').attr('data-color2',$(this).attr('data-color2'));
    		if($(this).attr('data-rgb2')) $('.get-data-css').attr('data-rgb2',$(this).attr('data-rgb2'));
    		color2 = $('.get-data-css').attr('data-color2');
    		rgb2 = $('.get-data-css').attr('data-rgb2');
    		if(color && color2){
    			// Color 1
	    		color_df = new RegExp(color_df, 'gi');
	    		rgb_df = new RegExp(rgb_df, 'gi');
	    		data = data.replace(color_df,color, -1);
	    		data = data.replace(rgb_df,rgb, -1);

	    		// Color 2
	    		color2_df = new RegExp(color2_df, 'gi');
	    		rgb2_df = new RegExp(rgb2_df, 'gi');
	    		data = data.replace(color2_df,color2, -1);
	    		data = data.replace(rgb2_df,rgb2, -1);

	    		if($('#s7upf-theme-style-inline-css').length > 0) $('#s7upf-theme-style-inline-css').html(data);
	    		else $('head').append('<'+'style id="s7upf-theme-style-inline-css">'+data+'</style>');
	    	}
	    	else $('#s7upf-theme-style-inline-css').html(default_data);
	    	return false;
    	})
    }
    function auto_width_megamenu(){
    	if($(window).width()>767){
	        var full_width = parseInt($('.container').innerWidth());
	        if($('.main-nav').length > 0){
		        var main_menu_width = parseInt($('.main-nav').innerWidth());
		        var main_menu_left = parseInt($('.main-nav').offset().left);
		        $('.main-nav > ul > li.has-mega-menu').each(function(){
		        	if($(this).find('.mega-menu').length > 0){
		        		var mega_menu_width = parseInt($(this).find('.mega-menu').innerWidth());
				        var li_width = parseInt($(this).innerWidth());
				        var seff = $(this);
				        if($('.rtl').length > 0){
				        	setTimeout(function() {
				        		main_menu_left = parseInt($(window).width() - (seff.parents('.main-nav').offset().left + seff.parents('.main-nav').outerWidth()));
					        	var mega_menu_left = $(window).width() - (seff.find('.mega-menu').offset().left + seff.find('.mega-menu').outerWidth());
						        var li_left = $(window).width() - (seff.offset().left + seff.outerWidth());
						        var pos = li_left - mega_menu_left - mega_menu_width/2 + li_width/2;
						        var pos2 = pos + mega_menu_left + mega_menu_width - main_menu_left - main_menu_width;
						        if(pos2 > 0 ) pos = pos - pos2;
						        if(pos > 0 ) $(this).find('.mega-menu').css('right',pos);
						        else{
						        	pos  = $(window).width() - ($('.container').offset().left + $('.container').outerWidth()) - main_menu_left + (full_width - mega_menu_width)/2;
						        	seff.find('.mega-menu').css('right',pos);
						        }
						       }, 2000);
				        }
				        else{
					        var mega_menu_left = $(this).find('.mega-menu').offset().left;
					        var li_left = $(this).offset().left;
					        var pos = li_left - mega_menu_left - mega_menu_width/2 + li_width/2;
					        var pos2 = pos + mega_menu_left + mega_menu_width - main_menu_left - main_menu_width;
					        if(pos2 > 0 ) pos = pos - pos2;
					        if(pos > 0 ) $(this).find('.mega-menu').css('left',pos);
					        else{
					        	pos  = $('.container').offset().left  - main_menu_left + (full_width - mega_menu_width)/2;
					        	$(this).find('.mega-menu').css('left',pos);
					        }
					    }
				    }
		        })
		    }
	    }
    }
    //Detail Gallery
    function parallax_slider(){
    	if($('.parallax-slider').length>0){
			var ot = $('.parallax-slider').offset().top;
			var sh = $('.parallax-slider').height();
			var st = $(window).scrollTop();
			var top = (($(window).scrollTop() - ot) * 0.5) + 'px';
			if(st>ot&&st<ot+sh){
				$('.parallax-slider .item-slider').css({
					'background-position': 'center ' + top
				});
			}else{
				$('.parallax-slider .item-slider').css({
					'background-position': 'center 0'
				});
			}
		}
    }
	function detail_gallery(){
		if($('.detail-gallery').length>0){
			$('.detail-gallery').each(function(){
				var data=$(this).find(".carousel").data();
				var seff = $(this);
				if($(this).find(".carousel").length>0){
					$(this).find(".carousel").jCarouselLite({
						btnNext: $(this).find(".gallery-control .next"),
						btnPrev: $(this).find(".gallery-control .prev"),
						speed: 800,
						visible:data.visible,
						vertical:data.vertical,
					});
				}
				//Elevate Zoom				
				$.removeData($('.detail-gallery .mid img'), 'elevateZoom');//remove zoom instance from image
				$('.zoomContainer').remove();
				if($(window).width()>=768){
					$(this).find('.zoom-style1 .mid img').elevateZoom();
					$(this).find('.zoom-style2 .mid img').elevateZoom({
						scrollZoom : true
					});
					$(this).find('.zoom-style3 .mid img').elevateZoom({
						zoomType: "lens",
						lensShape: "square",
						lensSize: 150,
						borderSize:1,
						containLensZoom:true,
						responsive:true
					});
					$(this).find('.zoom-style4 .mid img').elevateZoom({
						zoomType: "inner",
						cursor: "crosshair",
						zoomWindowFadeIn: 500,
						zoomWindowFadeOut: 750
					});
				}

				$(this).find(".carousel a").on('click',function(event) {
					event.preventDefault();
					$(this).parents('.detail-gallery').find(".carousel a").removeClass('active');
					$(this).addClass('active');
					var z_url =  $(this).find('img').attr("data-src");
					var srcset =  $(this).find('img').attr("data-srcset");
					$(this).parents('.detail-gallery').find(".mid img").attr("src", z_url);
					$(this).parents('.detail-gallery').find(".mid img").attr("srcset", srcset);
					$('.zoomWindow,.zoomLens').css('background-image','url("'+z_url+'")');
					$.removeData($('.detail-gallery .mid img'), 'elevateZoom');//remove zoom instance from image
					$('.zoomContainer').remove();
					if($(window).width()>=768){
						$(this).parents('.detail-gallery').find('.zoom-style1 .mid img').elevateZoom();
						$(this).parents('.detail-gallery').find('.zoom-style2 .mid img').elevateZoom({
							scrollZoom : true
						});
						$(this).parents('.detail-gallery').find('.zoom-style3 .mid img').elevateZoom({
							zoomType: "lens",
							lensShape: "square",
							lensSize: 150,
							borderSize:1,
							containLensZoom:true,
							responsive:true
						});
						$(this).parents('.detail-gallery').find('.zoom-style4 .mid img').elevateZoom({
							zoomType: "inner",
							cursor: "crosshair",
							zoomWindowFadeIn: 500,
							zoomWindowFadeOut: 750
						});
					}
				});
				$('input[name="variation_id"]').on('change',function(){
					var z_url =  seff.find('.mid img').attr("src");
					$('.zoomWindow,.zoomLens').css('background-image','url("'+z_url+'")');
					$.removeData($('.detail-gallery .mid img'), 'elevateZoom');//remove zoom instance from image
					$('.zoomContainer').remove();
					$('.detail-gallery').find('.zoom-style1 .mid img').elevateZoom();
					$('.detail-gallery').find('.zoom-style2 .mid img').elevateZoom({
						scrollZoom : true
					});
					$('.detail-gallery').find('.zoom-style3 .mid img').elevateZoom({
						zoomType: "lens",
						lensShape: "square",
						lensSize: 150,
						borderSize:1,
						containLensZoom:true,
						responsive:true
					});
					$('.detail-gallery').find('.zoom-style4 .mid img').elevateZoom({
						zoomType: "inner",
						cursor: "crosshair",
						zoomWindowFadeIn: 500,
						zoomWindowFadeOut: 750
					});
				})
				$('.image-lightbox').on('click',function(event){
					event.preventDefault();
					var gallerys = $(this).attr('data-gallery');
					var gallerys_array = gallerys.split(',');
					var data = [];
					if(gallerys != ''){
						for (var i = 0; i < gallerys_array.length; i++) {
							if(gallerys_array[i] != ''){
								data[i] = {};
								data[i].href = gallerys_array[i];
							}
						};
					}
					$.fancybox.open(data);
				})
			});
		}
	}
    
    // Menu fixed
    function fixed_header(){
        var menu_element;
		var menu_nav_class = '.main-nav';
		if($('.main-nav-js').length > 0){ 
			menu_nav_class = '.main-nav-js';
		} 
        menu_element = $( menu_nav_class +':not(.menu-fixed-content)').closest('.vc_row');
		menu_element.removeClass('vc_hidden');
		console.log(menu_element.attr('class'));
        if($('.menu-sticky-on').length > 0 && $(window).width()>1024){           
            var menu_class = $(menu_nav_class).attr('class');
            var header_height = $("#header").height()+100;
            var ht = header_height + 150;
            var st = $(window).scrollTop();

            if(!menu_element.hasClass('header-fixed') && menu_element.attr('data-vc-stretch-content') == 'true') menu_element.addClass('header-fixed');
            if(st>header_height){               
                if(menu_element.attr('data-vc-stretch-content') == 'true'){
                    if(st > ht) menu_element.addClass('active');
                    else menu_element.removeClass('active');
                    menu_element.addClass('fixed-header');
                    $('body').addClass('menu-on-fixed');
                }
                else{
                    if(st > ht) menu_element.parent().parent().addClass('active');
                    else menu_element.parent().parent().removeClass('active');
                    if(!menu_element.parent().parent().hasClass('fixed-header')){
                        menu_element.wrap( "<div class='menu-fixed-content fixed-header "+menu_class+"'><div class='container'></div></div>" );
                    }
                    $('body').removeClass('menu-on-fixed');
					menu_element.removeClass('vc_hidden');
                }
            }else{
                menu_element.removeClass('active');
                if(menu_element.attr('data-vc-stretch-content') == 'true') menu_element.removeClass('fixed-header');
                else{
                    if(menu_element.parent().parent().hasClass('fixed-header')){
                        menu_element.unwrap();
                        menu_element.unwrap();
                    }
                }
                $('body').removeClass('menu-on-fixed');
				menu_element.removeClass('vc_hidden');
            }
        }
        else{
            menu_element.removeClass('active');
            if(menu_element.attr('data-vc-stretch-content') == 'true') menu_element.removeClass('fixed-header').removeClass('vc_hidden');
            else{
                if(menu_element.parent().parent().hasClass('fixed-header')){
                    menu_element.unwrap();
                    menu_element.unwrap();
					menu_element.removeClass('vc_hidden');
                }
            }
        }
    }
    //Menu Responsive
    function fix_click_menu(){
    	if($(window).width()<768){
			if($('.btn-toggle-mobile-menu').length>0){
				return false;
			}
			else $('.main-nav li.menu-item-has-children,.main-nav li.has-mega-menu').append('<span class="btn-toggle-mobile-menu"></span>');
		}
		else{
			$('.btn-toggle-mobile-menu').remove();
			$('.main-nav .sub-menu,.main-nav .mega-menu').slideDown('fast');
		}
    }
	function rep_menu(){
		$('.toggle-mobile-menu').on('click',function(event){
			event.preventDefault();
			$(this).parents('.main-nav').toggleClass('active');
		});
		$('.main-nav').on('click','.btn-toggle-mobile-menu',function(event){
			$(this).toggleClass('active');
			$(this).prev().stop(true,false).slideToggle('fast');
		});
		$('.main-nav').on('click','.menu-item > a[href="#"]',function(event){
			event.preventDefault();
			$(this).toggleClass('active');
			$(this).next().stop(true,false).slideToggle('fast');
		});
	}

    function background(){
		$('.bg-slider .item-slider').each(function(){
			$(this).find('.banner-thumb a img').css('height',$(this).find('.banner-thumb a img').attr('height'));
			var src=$(this).find('.banner-thumb a img').attr('src');
			$(this).css('background-image','url("'+src+'")');
		});	
	}
    
    function fix_variable_product(){
    	//Fix product variable thumb    	
        $('body .variations_form select').live('change',function(){
            var id = $('input[name="variation_id"]').val();
            if(id){
                $('.product-gallery #bx-pager').find('a[data-variation_id="'+id+'"]').trigger( 'click' );
            }
        })
        // variable product
        if($('.wrap-attr-product1.special').length > 0){
            $('.attr-filter ul li a').live('click',function(){
                event.preventDefault();
                $(this).parents('ul').find('li').removeClass('active');
                $(this).parent().addClass('active');
                var attribute = $(this).parent().attr('data-attribute');
                var id = $(this).parents('ul').attr('data-attribute-id');
                $('#'+id).val(attribute);
                $('#'+id).trigger( 'change' );
                $('#'+id).trigger( 'focusin' );
                return false;
            })
            $('.attr-hover-box').on('hover',function(){
                var seff = $(this);
                var old_html = $(this).find('ul').html();
                var current_val = $(this).find('ul li.active').attr('data-attribute');
                $(this).next().find('select').trigger( 'focusin' );
                var content = '';
                $(this).next().find('select').find('option').each(function(){
                    var val = $(this).attr('value');
                    var title = $(this).html();
                    var el_class = '';
                    if(current_val == val) el_class = ' class="active"';
                    if(val != ''){
                        content += '<li'+el_class+' data-attribute="'+val+'"><a href="#" class="bgcolor-'+val+'"><span></span>'+title+'</a></li>';
                    }
                })
                if(old_html != content) $(this).find('ul').html(content);
            })
            $('body .reset_variations').live('click',function(){
                $('.attr-hover-box').each(function(){
                    var seff = $(this);
                    var old_html = $(this).find('ul').html();
                    var current_val = $(this).find('ul li.active').attr('data-attribute');
                    $(this).next().find('select').trigger( 'focusin' );
                    var content = '';
                    $(this).next().find('select').find('option').each(function(){
                        var val = $(this).attr('value');
                        var title = $(this).html();
                        var el_class = '';
                        if(current_val == val) el_class = ' class="active"';
                        if(val != ''){
	                        content += '<li'+el_class+' data-attribute="'+val+'"><a href="#" class="bgcolor-'+val+'"><span></span>'+title+'</a></li>';
	                    }
                    })
                    if(old_html != content) $(this).find('ul').html(content);
                    $(this).find('ul li').removeClass('active');
                })
            })
        }
        //end
    }
    
    function afterAction(event){
    	var element   = event.target;
		$(element).find('.owl-item').each(function(){
			var check = $(this).hasClass('active');
			if(check==true){
				$(this).find('.animated').each(function(){
					var anime = $(this).attr('data-animated');
					$(this).addClass(anime);
				});
			}else{
				$(this).find('.animated').each(function(){
					var anime = $(this).attr('data-animated');
					$(this).removeClass(anime);
				});
			}
		})
	}
    function s7upf_qty_click(){
    	//QUANTITY CLICK
		$("body").on("click",".detail-qty .qty-up",function(){
            var min = $(this).prev().attr("min");
            var max = $(this).prev().attr("max");
            var step = $(this).prev().attr("step");
            if(step === undefined) step = 1;
            if(max !==undefined && Number($(this).prev().val())< Number(max) || max === undefined || max === ''){ 
                if(step!='') $(this).prev().val(Number($(this).prev().val())+Number(step));
            }
			console.log('ffefre');
            $( 'div.woocommerce form .button[name="update_cart"]' ).prop( 'disabled', false );
            return false;
        })
        $("body").on("click",".detail-qty .qty-down",function(){
            var min = $(this).next().attr("min");
            var max = $(this).next().attr("max");
            var step = $(this).next().attr("step");
            if(step === undefined) step = 1;
            if(Number($(this).next().val()) > Number(min)){
	            if(min !==undefined && $(this).next().val()>min || min === undefined || min === ''){
	                if(step!='') $(this).next().val(Number($(this).next().val())-Number(step));
	            }
	        }
	        $( 'div.woocommerce form .button[name="update_cart"]' ).prop( 'disabled', false );
	        return false;
        })
        $("body").on("keyup change","input.qty-val",function(){
        	$( 'div.woocommerce form .button[name="update_cart"]' ).prop( 'disabled', false );
        })
		//END
    }
    
    function s7upf_owl_slider(){
    	//Carousel Slider
		if($('.sv-slider').length>0){
			var rtl = false;
			if($('.rtl-enable').length>0) rtl = true;
			$('.sv-slider').each(function(){
				var seff = $(this);
				var item = seff.attr('data-item');
				var speed = seff.attr('data-speed');
				var itemres = seff.attr('data-itemres');
				var nav = seff.attr('data-navigation');
				var pag = seff.attr('data-pagination');
				var text_prev = seff.attr('data-prev');
				var text_next = seff.attr('data-next');
				var margin = seff.attr('data-margin');
				var stage_padding = seff.attr('data-stage_padding');
				var start_position = seff.attr('data-start_position');
				var merge = seff.attr('data-merge');
				var loop = seff.attr('data-loop');
				var mousewheel = seff.attr('data-mousewheel');
				var animation_out = seff.attr('data-animation_out');
				var animation_in = seff.attr('data-animation_in');
				var pagination = false, navigation= false, singleItem = false;
				var autoplay;
				var autoplaytimeout = 5000;
				if(!margin) margin = 0;
				if(!stage_padding) stage_padding = 0;
				if(!start_position) start_position = 0;
				if(!merge) merge = false; else merge = true;
				if(!loop) loop = false; else loop = true;
				if(!mousewheel) mousewheel = false; else mousewheel = true;
				if(speed != ''){
					autoplay = true;
					autoplaytimeout = parseInt(speed, 10);
				}
				else autoplay = false;
				// Navigation
				if(nav) navigation = true;
				if(pag) pagination = true;
				var prev_text = '<i class="la la-long-arrow-left"></i>';
				var next_text = '<i class="la la-long-arrow-right"></i>';
				if(text_prev) prev_text = text_prev;
				if(text_next) next_text = text_next;
				if(itemres == '' || itemres === undefined){
					if(item == '1') itemres = '0:1,480:1,768:1,1200:1';
					if(item == '2') itemres = '0:1,480:1,768:2,1200:2';
					if(item == '3') itemres = '0:1,480:2,768:2,992:3';
					if(item == '4') itemres = '0:1,480:2,840:3,1200:4';
					if(item >= '5') itemres = '0:1,480:2,768:3,1024:4,1200:'+item;
				}
				itemres = itemres.split(',');
				var responsive = {};
				var i;
				for (i = 0; i < itemres.length; i++) { 
				    itemres[i] = itemres[i].split(':');
				    var res_dv = {};
				    res_dv.items = parseInt(itemres[i][1], 10);
				    responsive[itemres[i][0]] = res_dv;
				}
				seff.owlCarousel({
					items: parseInt(item, 10),
				    margin: parseInt(margin, 10),
				    loop: loop,
				    stagePadding: parseInt(stage_padding, 10),
				    startPosition: parseInt(start_position, 10),
				    nav:navigation,
				    navText: [prev_text,next_text],
				    responsive: responsive,
				    autoplay: autoplay,
				    autoplayTimeout: autoplaytimeout,
				    animateOut: animation_out,
				    animateIn: animation_in,
				    dots: pagination,
				    onTranslated: afterAction,
				    onInitialize:background,
				    rtl: rtl,
				    rewind: true,
				});
				if(mousewheel){
					seff.on('mousewheel', '.owl-stage', function (e) {
					    if (e.deltaY>0) {
					        seff.trigger('next.owl');
					    } else {
					        seff.trigger('prev.owl');
					    }
					    e.preventDefault();
					});
				}
			});			
		}
    }
	
	function  element_menu_style2(){
        if($('.js-menu-vertical').length>0){
            $('.js-menu-vertical li.menu-item-has-children,.js-menu-vertical li.has-mega-menu').append('<span class="btn-toggle-menu2"></span>');

            $('.js-menu-vertical').on('click','.btn-toggle-menu2',function(event){
                $(this).toggleClass('active');
                $(this).prev().stop(true,false).slideToggle('fast');
            });
            $('.js-menu-vertical').on('click','.menu-item > a[href="#"]',function(event){
                event.preventDefault();
                $(this).toggleClass('active');
                $(this).next().stop(true,false).slideToggle('fast');
            });
        }else {
            return false;
		}

    }

    function s7upf_all_slider(seff,number){
    	if(!seff) seff = $('.smart-slider');
    	if(!number) number = '';
    	//Carousel Slider
		if(seff.length>0){
			var rtl = false;
			if($('.rtl-enable').length>0) rtl = true;
			seff.each(function(){
				var seff = $(this);
				var item = seff.attr('data-item');
				var speed = seff.attr('data-speed');
				var itemres = seff.attr('data-itemres');
				var nav = seff.attr('data-navigation');
				var pag = seff.attr('data-pagination');
				var text_prev = seff.attr('data-prev');
				var text_next = seff.attr('data-next');
				var margin = seff.attr('data-margin');
				var stage_padding = seff.attr('data-stage_padding');
				var start_position = seff.attr('data-start_position');
				var merge = seff.attr('data-merge');
				var loop = seff.attr('data-loop');
				var mousewheel = seff.attr('data-mousewheel');
				var animation_out = seff.attr('data-animation_out');
				var animation_in = seff.attr('data-animation_in');
				var pagination = false, navigation= false, singleItem = false;
				var autoplay;
				var autoplaytimeout = 5000;
				if(!margin) margin = 0;
				if(!stage_padding) stage_padding = 0;
				if(!start_position) start_position = 0;
				if(!merge) merge = false; else merge = true;
				if(!loop) loop = false; else loop = true;
				if(!mousewheel) mousewheel = false; else mousewheel = true;
				if(speed != ''){
					autoplay = true;
					autoplaytimeout = parseInt(speed, 10);
				}
				else autoplay = false;
				// Navigation
				if(nav) navigation = true;
				if(pag) pagination = true;
				var prev_text = '<i class="la la-long-arrow-left"></i>';
				var next_text = '<i class="la la-long-arrow-right"></i>';
				if(text_prev) prev_text = text_prev;
				if(text_next) next_text = text_next;
				if(itemres == '' || itemres === undefined){
					if(item == '1') itemres = '0:1,480:1,768:1,1200:1';
					if(item == '2') itemres = '0:1,480:1,768:2,1200:2';
					if(item == '3') itemres = '0:1,480:2,768:2,992:3';
					if(item == '4') itemres = '0:1,480:2,840:3,1200:4';
					if(item >= '5') itemres = '0:1,480:2,768:3,1024:4,1200:'+item;
				}
				itemres = itemres.split(',');
				var responsive = {};
				var i;
				for (i = 0; i < itemres.length; i++) { 
				    itemres[i] = itemres[i].split(':');
				    var res_dv = {};
				    res_dv.items = parseInt(itemres[i][1], 10);
				    responsive[itemres[i][0]] = res_dv;
				}
				seff.owlCarousel({
					items: parseInt(item, 10),
				    margin: parseInt(margin, 10),
				    loop: loop,
				    stagePadding: parseInt(stage_padding, 10),
				    startPosition: parseInt(start_position, 10),
				    nav:navigation,
				    navText: [prev_text,next_text],
				    responsive: responsive,
				    autoplay: autoplay,
				    autoplayTimeout: autoplaytimeout,
				    animateOut: animation_out,
				    animateIn: animation_in,
				    dots: pagination,
				    onTranslated: afterAction,
				    onInitialize:background,
				    rtl: rtl,
				    rewind: true,
				});
				if(mousewheel){
					seff.on('mousewheel', '.owl-stage', function (e) {
					    if (e.deltaY>0) {
					        seff.trigger('next.owl');
					    } else {
					        seff.trigger('prev.owl');
					    }
					    e.preventDefault();
					});
				}
			});			
		}
    }
	function detail_fixed(){
		if($(window).width()>767){
			if($('.fixed-detail-info').length>0){
				var ot = $('.fixed-detail-info').offset().top;
				var sh = $('.fixed-detail-info').height();
				var height = $('.detail-float').map(function (){
					return $(this).height();
				}).get();
				var dh = Math.max.apply(null, height);
				var st = $(window).scrollTop();
				var top = $(window).scrollTop() - ot;
				if(st>ot&&st<ot+sh-dh){
					$('.fixed-detail-info').addClass('onscroll');
					$('.onscroll .detail-float').css('top',top+'px');
				}else if(st<ot){
					$('.detail-float').css('top',0);
				}else{
					$('.fixed-detail-info').removeClass('onscroll');
				}
			}
		}else{
			$('.detail-float').css('top',0);
		}
	}
	function get_wishlist_count(){
        var counter = $('.wishlist-number');
        console.log(counter);
        if(counter.length > 0){
            $.ajax({
                url: yith_wcwl_l10n.ajax_url,
                data: {
                    action: 'yith_wcwl_update_wishlist_count'
                },
                dataType: 'json',
                success: function( data ){
                    counter.html( data.count );
                },
                beforeSend: function(){
                    //loading
                },
                complete: function(){
                    //done
                }
            });
        }
    }
    /************ END FUNCTION **************/ 
	$(document).ready(function(){
		//Menu Responsive 
		letter_popup();
		parallax_slider();
		fix_click_menu();
		rep_menu();
		element_menu_style2();
		s7upf_qty_click();
		detail_gallery();
		tool_panel();
		//history slider
		var sync1 = $("#sync1");
		var sync2 = $("#sync2");
		var slidesPerPage = 3;
		var syncedSecondary = true;
		sync1.owlCarousel({
			items : 3,
			slideSpeed : 5000,
			responsive: {0:{"items":1},568:{"items":2},768:{"items":2},992:{"items":3}},	
			nav: false,
			autoplay: false,
			dots: false,
			loop: true,
			responsiveRefreshRate : 200,
			navText: ['prev','next'],
		}).on('changed.owl.carousel', syncPosition);

		sync2
		.on('initialized.owl.carousel', function () {
		  sync2.find(".owl-item").eq(0).addClass("current");
		})
		.owlCarousel({
			items : slidesPerPage,
			dots: false,
			nav: true,
			navText: ['<i class="la la-long-arrow-left"></i>','<i class="la la-long-arrow-right"></i>'],
			smartSpeed: 200,
			slideSpeed : 5000,
			responsive: {0:{"items":1},568:{"items":2},768:{"items":2},992:{"items":3}},
			slideBy: slidesPerPage,
			responsiveRefreshRate : 100
		}).on('changed.owl.carousel', syncPosition2);
		function syncPosition(el) {
			var count = el.item.count-1;
			var current = Math.round(el.item.index - (el.item.count/2) - .5);
			
			if(current < 0) {
			  current = count;
			}
			if(current > count) {
			  current = 0;
			}
			sync2
			  .find(".owl-item")
			  .removeClass("current")
			  .eq(current)
			  .addClass("current");
			var onscreen = sync2.find('.owl-item.active').length - 1;
			var start = sync2.find('.owl-item.active').first().index();
			var end = sync2.find('.owl-item.active').last().index();
			
			if (current > end) {
			  sync2.data('owl.carousel').to(current, 100, true);
			}
			if (current < start) {
			  sync2.data('owl.carousel').to(current - onscreen, 100, true);
			}
		}
		function syncPosition2(el) {
			if(syncedSecondary) {
			  var number = el.item.index;
			  sync1.data('owl.carousel').to(number, 100, true);
			}
		}
		sync2.on("click", ".owl-item", function(e){
			e.preventDefault();
			var number = $(this).index();
			sync1.data('owl.carousel').to(number, 300, true);
		});
		$('.close-menu-fixed').on('click',function(event){
            $('.menu-fixed .main-nav-vertical').removeClass('active');
        });
		// menu fixed
		$('.menu-fixed .btn-menu-fixed').on('click',function(event){
            event.preventDefault();
            event.stopPropagation();
            $(this).parents('.menu-fixed').find('.main-nav-vertical').addClass('active');
        });
		// Filter click
		$('.btn-filter').on('click',function(){
			$(this).parents('.filter-product').toggleClass('active');
			return false;
		})
		$('.btn-service').on('click',function(){
			event.preventDefault();
            event.stopPropagation();
			$(this).parents('.wrap-item-service2').toggleClass('active');
		})
		//Filter Price
		if($('.range-filter').length>0){
			$('.range-filter').each(function(){
				var self = $(this);
				var min_price = Number(self.find('.slider-range').attr( 'data-min' ));
				var max_price = Number(self.find('.slider-range').attr( 'data-max' ));
				self.find( ".slider-range" ).slider({
					range: true,
					min: min_price,
					max: max_price,
					values: [ min_price, max_price ],
					slide: function( event, ui ) {
						self.find( '.element-get-min' ).html(ui.values[ 0 ]);
						self.find( '.element-get-max' ).html(ui.values[ 1 ]);
					}
				});
			});
		}
		//Popup fancybox
		$(".various").fancybox({
			type: 'image',
		});
		//Fancy Box
		if($('.fancybox').length>0){
			$('.fancybox').fancybox();	
		}
		if($('.fancybox-media').length>0){
			$('.fancybox-media').attr('rel', 'media-gallery').fancybox({
				openEffect : 'none',
				closeEffect : 'none',
				prevEffect : 'none',
				nextEffect : 'none',
				arrows : false,
				helpers : {
					media : {}
				}
			});
		}
		//Custom sumary
		if($('.summary.detail-info>div').hasClass('yith-wcwl-add-to-wishlist')){
			$('body').addClass('custom-sumary');
		};
		if($('.main-wrap-shop').hasClass('col-md-9')){
			$('body').addClass('custom-wrap-shop');
		}
		//fix row bg
		$('.fix-row-bg').each(function(){
			var row_class = $(this).attr('class');
			row_class = row_class.replace('vc_row wpb_row','');
			$(this).removeClass(row_class);
			$(this).removeClass('fix-row-bg');
			$(this).wrap('<div class="wrap-vc-row'+row_class+'"></div>');
		});
		//Cat search
		$('.select-cat-search').on('click',function(event){
			event.preventDefault();
			$(this).parents('ul').find('li').removeClass('active');
			$(this).parent().addClass('active');
			var x = $(this).attr('data-filter');
			if(x){
				x = x.replace('.','');
				$('.cat-value').val(x);
			}
			else $('.cat-value').val('');
			$('.current-search-cat').text($(this).text());
		});
		//Time Countdown
		if($('.time-countdowns').length>0){
			$(".time-countdowns").each(function(){
				var data = $(this).data(); 
				$(this).TimeCircles({
					fg_width: data.width,
					bg_width: 0,
					text_size: 0,
					circle_bg_color: data.bg,
					time: {
						Days: {
							show: data.day,
							text: data.text[0],
							color: data.color,
						},
						Hours: {
							show: data.hou,
							text: data.text[1],
							color: data.color,
						},
						Minutes: {
							show: data.min,
							text: data.text[2],
							color: data.color,
						},
						Seconds: {
							show: data.sec,
							text: data.text[3],
							color: data.color,
						}
					}
				});
			});
		}
		//Circle Percentage
		$('.percentage').each(function(){
			var data = $(this).data();
			// console.log(data);
			$(this).circularloader({
				backgroundColor: "transparent",//background colour of inner circle
				fontColor: data.color,//font color of progress text
				fontSize: "24px",//font size of progress text
				radius: data.radius,//radius of circle
				progressBarBackground: "transparent",//background colour of circular progress Bar
				progressBarColor: data.color,//colour of circular progress bar
				progressBarWidth: 10,//progress bar width
				progressPercent: data.value,//progress percentage out of 100
				progressValue:0,//diplay this value instead of percentage
				showText: false,//show progress text or not
				title: "",//show header title for the progress bar
			});
		});
		//Tab Toggle
		if($('.toggle-tab').length>0){
			$('.toggle-tab').each(function(){
				$(this).find('.item-toggle-tab').first().find('.toggle-tab-content').show();
				$(this).find('.toggle-tab-title').on('click',function(event){
					if($(this).next().length>0){
						event.preventDefault();
						$(this).parent().siblings().removeClass('active');
						$(this).parent().addClass('active');
						$(this).parents('.toggle-tab').find('.toggle-tab-content').slideUp();
						$(this).next().stop(true,false).slideDown();
					}
				});
			});
		}
		// aside-box cart
		$('.close-minicart').on('click',function(event){
			$('body').removeClass('overlay');
			$('.mini-cart-content').removeClass('active');
		});
		$('.mini-cart-box.aside-box .mini-cart-link').on('click',function(event){
			event.preventDefault();
			event.stopPropagation();
			$('body').addClass('overlay');
			$(this).next().addClass('active');
		});
		//Count item cart
        if($(".get-cart-number").length){
            var count_cart_item = $(".get-cart-number").val();
            $(".set-cart-number").html(count_cart_item);
        }
		//List Item Masonry 
		if($('.blog-grid-view.list-masonry .list-post-wrap').length>0){
			$('.blog-grid-view.list-masonry .list-post-wrap').masonry();
		}
		if($('.product-grid-view.list-masonry .list-product-wrap').length>0){
			$('.product-grid-view.list-masonry .list-product-wrap').masonry();
		}
		//Fix mailchimp
        $('.sv-mailchimp-form').each(function(){
            var placeholder = $(this).attr('data-placeholder');
            var submit = $(this).attr('data-submit');
            if(placeholder) $(this).find('input[name="EMAIL"]').attr('placeholder',placeholder);
            if(submit) $(this).find('input[type="submit"]').val(submit);
        })   
        //Back To Top
		$('.scroll-top').on('click',function(event){
			event.preventDefault();
			$('html, body').animate({scrollTop:0}, 'slow');
		});	
		auto_width_megamenu();
	});

	$(window).load(function(){
		s7upf_owl_slider();
		s7upf_all_slider();
		fix_css_append();
		login_popup();
		//Pre Load
		$('body').removeClass('preload');
		// Fix height slider
		$('.banner-slider .banner-info').each(function(){
			if($(this).find('.slider-content-text').length > 0){
				var height_content = $(this).find('.slider-content-text')["0"].clientHeight;
				$(this).css('height',height_content);
			}
		})
		// menu fixed onload
		$("#header").css('min-height','');
        if($(window).width()>1024){
            $("#header").css('min-height',$("#header").height());
            fixed_header();
        }
        else{
            $("#header").css('min-height','');
        }
		//menu fix
		if($(window).width() >= 768){
			var c_width = $(window).width();
			$('.main-nav ul ul ul.sub-menu').each(function(){
				var left = $(this).offset().left;
				if(c_width - left < 180){
					$(this).css({"left": "-100%"})
				}
				if(left < 180){
					$(this).css({"left": "100%"})
				}
			})
		}
	});// End load

	/* ---------------------------------------------
     Scripts resize
     --------------------------------------------- */
    var w_width = $(window).width();
    $(window).resize(function(){
    	auto_width_megamenu();
    	fix_click_menu();

    	if($('#dialog').length > 0){
	    	// popup resize
			var id = '#dialog';	
			//Get the screen height and width
			var maskHeight = $(document).height();
			var maskWidth = $(window).width();
		
			//Set heigth and width to mask to fill up the whole screen
			$('#mask').css({'width':maskWidth,'height':maskHeight});
		
			//Get the window height and width
			var winH = $(window).height();
			var winW = $(window).width();
	              
			//Set the popup window to center
			$(id).css('top',  winH/2-$(id).height()/2);
			$(id).css('left', winW/2-$(id).width()/2);
		}
        $("#header").css('min-height','');
    });

	jQuery(window).scroll(function(){
		fixed_header();
		parallax_slider();
		if($(window).width()>1024){
            $("#header").css('min-height',$("#header").height());
            fixed_header();
        }
        else{
            $("#header").css('min-height','');
        }
		//Scroll Top
		if($(this).scrollTop()>$(this).height()){
			$('.scroll-top').addClass('active');
		}else{
			$('.scroll-top').removeClass('active');
		}
		if($(this).scrollTop()>$(this).height()){
			$('.product-nav').addClass('active');
		}else{
			$('.product-nav').removeClass('active');
		}
	});// End Scroll

	$.fn.tawcvs_variation_swatches_form = function () {
        return this.each( function() {
            var $form = $( this ),
                clicked = null,
                selected = [];

            $form
                .addClass( 'swatches-support' )
                .on( 'click', '.swatch', function ( e ) {
                    e.preventDefault();
                    var $el = $( this ),
                        $select = $el.closest( '.value' ).find( 'select' ),
                        attribute_name = $select.data( 'attribute_name' ) || $select.attr( 'name' ),
                        value = $el.data( 'value' );

                    $select.trigger( 'focusin' );

                    // Check if this combination is available
                    if ( ! $select.find( 'option[value="' + value + '"]' ).length ) {
                        $el.siblings( '.swatch' ).removeClass( 'selected' );
                        $select.val( '' ).change();
                        $form.trigger( 'tawcvs_no_matching_variations', [$el] );
                        return;
                    }

                    clicked = attribute_name;

                    if ( selected.indexOf( attribute_name ) === -1 ) {
                        selected.push(attribute_name);
                    }

                    if ( $el.hasClass( 'selected' ) ) {
                        $select.val( '' );
                        $el.removeClass( 'selected' );

                        delete selected[selected.indexOf(attribute_name)];
                    } else {
                        $el.addClass( 'selected' ).siblings( '.selected' ).removeClass( 'selected' );
                        $select.val( value );
                    }

                    $select.change();
                } )
                .on( 'click', '.reset_variations', function () {
                    $( this ).closest( '.variations_form' ).find( '.swatch.selected' ).removeClass( 'selected' );
                    selected = [];
                } )
                .on( 'tawcvs_no_matching_variations', function() {
                    window.alert( wc_add_to_cart_variation_params.i18n_no_matching_variations_text );
                } );
        } );
    };

    $( function () {
        $( '.variations_form' ).tawcvs_variation_swatches_form();
        $( document.body ).trigger( 'tawcvs_initialized' );
    } );

})(jQuery);