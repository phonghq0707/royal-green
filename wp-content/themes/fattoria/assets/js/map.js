(function($){
    "use strict"; // Start of use strict     
	$(document).ready(function($){
		// GOOGLE MAP
		$('.sv-ggmaps').each(function(){
			var id = $(this).attr('id');
	    	var seff = $('#'+id);
	        var zoom = seff.data('zoom'),
	        style = seff.data('style'),
	        control = seff.data('control') == 'yes' ? true : false,
	        scrollwheel = seff.data('scrollwheel') == 'yes' ? true : false,
	        disable_ui = seff.data('disable_ui') == 'yes' ? true : false,
	        draggable = seff.data('draggable') == 'yes' ? true : false,
	        locations = seff.data('location').split('|'),
	        location = locations[1].split(','),
	        lat = location[0],
	        lon = location[1],
	        marker = seff.data('market');
	        var latlng = new google.maps.LatLng(lat, lon);
	        var stylez;
	        switch(style){

	            case 'grayscale' :
	                stylez = [ {featureType: 'all',  stylers: [{saturation: -100},{gamma: 0.50}]} ];
	                break;

	            case 'blue' :
	                stylez = [ {featureType: 'all',  stylers: [{hue: '#0000b0'},{invert_lightness: 'true'},{saturation: -30}]} ];
	                break;

	            case 'dark' :
	               stylez = [ {featureType: 'all',  stylers: [{ hue: '#ff1a00' },{ invert_lightness: true },{ saturation: -100  },{ lightness: 33 },{ gamma: 0.5 }]} ];
	                break;

	            case 'pink' :
	                stylez = [ {"stylers": [{ "hue": "#ff61a6" },{ "visibility": "on" },{ "invert_lightness": true },{ "saturation": 40 },{ "lightness": 10 }]} ];
	                break;

	            case 'light' :
	                stylez = [ {"featureType": "water","elementType": "all","stylers": [{"hue": "#e9ebed"},{"saturation": -78},{"lightness": 67},{"visibility": "simplified"}]
	                },{"featureType": "landscape","elementType": "all","stylers": [{"hue": "#ffffff"},{"saturation": -100},{"lightness": 100},{"visibility": "simplified"}]
	                },{"featureType": "road","elementType": "geometry","stylers": [{"hue": "#bbc0c4"},{"saturation": -93},{"lightness": 31},{"visibility": "simplified"}]
	                },{"featureType": "poi","elementType": "all","stylers": [{"hue": "#ffffff"},{"saturation": -100},{"lightness": 100},{"visibility": "off"}]
	                },{"featureType": "road.local","elementType": "geometry","stylers": [{"hue": "#e9ebed"},{"saturation": -90},{"lightness": -8},{"visibility": "simplified"}]
	                },{"featureType": "transit","elementType": "all","stylers": [{"hue": "#e9ebed"},{"saturation": 10},{"lightness": 69},{"visibility": "on"}]
	                },{"featureType": "administrative.locality","elementType": "all","stylers": [ {"hue": "#2c2e33"},{"saturation": 7},{"lightness": 19},{"visibility": "on"}]
	                },{"featureType": "road","elementType": "labels","stylers": [{"hue": "#bbc0c4"},{"saturation": -93},{"lightness": 31},{"visibility": "on"}]
	                },{"featureType": "road.arterial","elementType": "labels","stylers": [{"hue": "#bbc0c4"},{"saturation": -93},{"lightness": -2},{"visibility": "simplified"}]} ];

	                break;
					
				case 'ultralight' :
					stylez = [{"featureType": "water","elementType": "geometry", "stylers": [{"color": "#ebebeb"},{ "lightness": 17}]},
					{"featureType": "landscape","elementType": "geometry","stylers": [{"color": "#f2f2f2"},{"lightness": 20}]},
					{"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#ffffff"},{"lightness": 17}]},
					{"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"color": "#ffffff"},{"lightness": 29},{"weight": 0.2}]},
					{"featureType": "road.arterial","elementType": "geometry","stylers": [{"color": "#ffffff"},{"lightness": 18}]},
					{"featureType": "road.local","elementType": "geometry","stylers": [{"color": "#ffffff"},{"lightness": 16}]},
					{"featureType": "poi","elementType": "geometry","stylers": [{"color": "#ebebeb"},{"lightness": 21}]},
					{"featureType": "poi.park","elementType": "geometry","stylers": [{"color": "#dedede"},{"lightness": 21}]},
					{"elementType": "labels.text.stroke","stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16}]},
					{"elementType": "labels.text.fill","stylers": [{"saturation": 36},{"color": "#333333"},{"lightness": 40}]},
					{"elementType": "labels.icon","stylers": [{"visibility": "off"}]},
					{"featureType": "transit","elementType": "geometry","stylers": [{"color": "#f2f2f2"},{"lightness": 19}]},
					{"featureType": "administrative","elementType": "geometry.fill","stylers": [{"color": "#fefefe"},{"lightness": 20}]},
					{"featureType": "administrative","elementType": "geometry.stroke","stylers": [{"color": "#fefefe"},{"lightness": 17},{"weight": 1.2}]}];

					break;
					
	            case 'blue-essence' :
	                stylez = [ {featureType: "landscape.natural",elementType: "geometry.fill",stylers: [{ "visibility": "on" },{ "color": "#e0efef" }]
	                },{featureType: "poi",elementType: "geometry.fill",stylers: [{ "visibility": "on" },{ "hue": "#1900ff" },{ "color": "#c0e8e8" }]
	                },{featureType: "landscape.man_made",elementType: "geometry.fill"
	                },{featureType: "road",elementType: "geometry",stylers: [{ lightness: 100 },{ visibility: "simplified" }]
	                },{featureType: "road",elementType: "labels",stylers: [{ visibility: "off" }]
	                },{featureType: 'water',stylers: [{ color: '#7dcdcd' }]
	                },{featureType: 'transit.line',elementType: 'geometry',stylers: [{ visibility: 'on' },{ lightness: 700 }]} ];

	                break;

	            case 'bentley' :
	                stylez = [ {featureType: "landscape",stylers: [{hue: "#F1FF00"},{saturation: -27.4},{lightness: 9.4},{gamma: 1}]
	                },{featureType: "road.highway",stylers: [{hue: "#0099FF"},{saturation: -20},{lightness: 36.4},{gamma: 1}]
	                },{featureType: "road.arterial",stylers: [{hue: "#00FF4F"},{saturation: 0},{lightness: 0},{gamma: 1}]
	                },{featureType: "road.local",stylers: [{hue: "#FFB300"},{saturation: -38},{lightness: 11.2},{gamma: 1}]
	                },{featureType: "water",stylers: [{hue: "#00B6FF"},{saturation: 4.2},{lightness: -63.4},{gamma: 1}]
	                },{featureType: "poi",stylers: [{hue: "#9FFF00"},{saturation: 0},{lightness: 0},{gamma: 1}]} ];

	                break;

	            case 'retro' :
	                stylez = [ {featureType:"administrative",stylers:[{visibility:"off"}]
	                },{featureType:"poi",stylers:[{visibility:"simplified"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"simplified"}]
	                },{featureType:"water",stylers:[{visibility:"simplified"}]},{featureType:"transit",stylers:[{visibility:"simplified"}]},{featureType:"landscape",stylers:[{visibility:"simplified"}]
	                },{featureType:"road.highway",stylers:[{visibility:"off"}]},{featureType:"road.local",stylers:[{visibility:"on"}]
	                },{featureType:"road.highway",elementType:"geometry",stylers:[{visibility:"on"}]},{featureType:"water",stylers:[{color:"#84afa3"},{lightness:52}]},{stylers:[{saturation:-17},{gamma:0.36}]
	                },{featureType:"transit.line",elementType:"geometry",stylers:[{color:"#3f518c"}]} ];

	                break;

	            case 'cobalt' :
	                stylez = [ {featureType: "all",elementType: "all",stylers: [{invert_lightness: true},{saturation: 10},{lightness: 30},{gamma: 0.5},{hue: "#435158"}]} ];
	                break;

	            case 'brownie' :
	                stylez = [ {"stylers": [{ "hue": "#ff8800" },{ "gamma": 0.4 }]} ];
	                break;

	            default :
	                stylez = '';

	        };

	        var settings = {
	            zoom: Number(zoom),
	            center: latlng,
	            mapTypeControl: control,
	            mapTypeControlOptions: {
	                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'tehgrayz']
	            },
	            scrollwheel: scrollwheel,
	            disableDefaultUI: disable_ui,
	            draggable: draggable,

	        };

	        var map = new google.maps.Map(document.getElementById(id), settings);
	        var mapType = new google.maps.StyledMapType(stylez, { name:style.charAt(0).toUpperCase() + style.slice(1) });
	        map.mapTypes.set('tehgrayz', mapType);
	        map.setMapTypeId('tehgrayz');

	        // Marker + Box Info
	        var contentString = ["content"];
	        for (var i = 0; i < locations.length; i++) {
                if(locations[i] !=''){
                    lat = locations[i].split(',')[0];
                    lon = locations[i].split(',')[1];
                    var label = locations[i].split(',')[2];
                    var info_content = locations[i].split(',')[3];
                    var companyPos = new google.maps.LatLng(lat, lon);
                    var companyMarker = new google.maps.Marker({
                        position: companyPos,
                        map: map,
                        icon: marker,
                        title: label,
                        zIndex: 3
                    });
                    contentString.push('<div class="wrap-content">'+info_content+'</div>');
                    var infowindow = new google.maps.InfoWindow({
                            maxWidth: 360
                        });
                    google.maps.event.addListener(companyMarker, 'click', (function(companyMarker, i) {
                        return function() {
                            infowindow.setContent(contentString[i]);
                            infowindow.open(map, companyMarker);
                        }
                    })(companyMarker, i));
                }
            };
		})
	    // END GOOGLE MAP
	});
})(jQuery);