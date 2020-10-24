/*
*****************************************************
*	CUSTOM JS DOCUMENT                              *
*	Single window load event                        *
*   "use strict" mode on                            *
*****************************************************
*/
$(window).on('load', function(){
	
	'use strict';

  	var preloader= $('.loading');
	var countNumber = $(".count-number");
    var mixItUp = $('#mixItUp');
    var fancybox = $('.fancybox');
    var fancyboxIframe = $('.fancybox-iframe');


//========================================
// Preloader
//======================================== 	
	if(preloader.length) {	
		preloader.fadeOut();
	}

// ============================================
// Fun Factor / Counter
// =============================================	
    if(countNumber.length) {
    countNumber.appear(function() {
        $(this).each(function() {
            var datacount = $(this).attr('data-count');
            $(this).find('.counter').delay(6000).countTo({
                from: 10,
                to: datacount,
                speed: 3000,
                refreshInterval: 50,
            });
        });
    });
    }
//========================================
// LightBox / Fancybox
//======================================== 	
	
	if(fancybox.length) {
		 fancybox.fancybox();
	}


	if(fancyboxIframe.length) {
		fancyboxIframe.fancybox({
			type: "iframe",
			// other API options
		});
}
// ========================================
//   Project Filter Setting
//   ========================================
    if (mixItUp.length) {
        mixItUp.mixItUp();
    }
//***************************************
// Owl Carousel function Calling
//****************************************
 
 owlCarousel();
 
 //***************************************
// Map initialization function Calling
//****************************************
 
 initMap();


});

//***************************************
// Contact Page Map
//****************************************  

 function initMap() {
  "use strict";
 
   var mapDiv = $('#gmap_canvas'); 
   
   if (mapDiv.length) {  
     var myOptions = {
         zoom: 10,
   scrollwheel: false,
         center: new google.maps.LatLng(-37.81614570000001, 144.95570680000003),
         mapTypeId: google.maps.MapTypeId.ROADMAP
     };
     var map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
     var marker = new google.maps.Marker({
         map: map,
         position: new google.maps.LatLng(-37.81614570000001, 144.95570680000003)
     });
     var infowindow = new google.maps.InfoWindow({
         content: '<strong>Envato</strong><br>Envato, King Street, Melbourne, Victoria<br>'
     });
     google.maps.event.addListener(marker, 'click', function() {
         infowindow.open(map, marker);
     });
  
     infowindow.open(map, marker);
   }
   
 } 
 
function owlCarousel(){
   "use strict";
   
 	var mainSlider = $('#main-slider');
	var videoSlider = $('#video-slider');
	var testimonialSlider = $('#testimonial-slider');	
	var teamSlider = $('#team-slider');	
	var nextNav = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
    var prevNav = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
	var nextNav1 = '<span class="arrows-right"></span>';
    var prevNav1 = '<span class="arrows-left"></span>';		
	var nextNav2 = 'Next';
	var prevNav2 = 'Prev';
	
//========================================
// Main slider
//======================================== 		
	if(mainSlider.length){	
		mainSlider.owlCarousel({
			loop:true,
			margin:0,
			nav:false,
			dots:true,
			autoplay:true,
			autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				1000:{
					items:1
				}
			}
		});
	}
//========================================
// Feature video
//======================================== 	
	if(videoSlider.length) {	
		 videoSlider.owlCarousel({
				center: true,
				navText: [prevNav1, nextNav1],
                items: 2,
				nav:true,
				dots:false,
                loop: true,
				autoplay:false,
				 margin: 0,
                responsive: {
 					0:{
						items:1
					},
					600:{
						items:2
					}
                }
			});
		}
//========================================
// Testimonial 
//======================================== 	
	if(testimonialSlider.length) {	
		 testimonialSlider.owlCarousel({			 
				loop:true,
				margin:0,
				navText: [prevNav1, nextNav1],				
				nav:true,				
				dots:false,
				autoplay:true,
				autoplayHoverPause:true,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:1
					},
					1000:{
						items:1
					}
				}
			});
		}	
//========================================
// Our team
//======================================== 	
	if(teamSlider.length) {	
		 teamSlider.owlCarousel({
				loop:true,
				margin:0,
				nav:false,				
				dots:false,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
						nav:true
					},
					600:{
						items:2,
						nav:false
					},
					1000:{
						items:4,
						nav:true,
						loop:false
					}
				}
			});
		}	
		
}
 
 /*
*****************************************************
*	END OF THE JS 									*
*	DOCUMENT                       					*
*****************************************************
*/