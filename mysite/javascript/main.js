jQuery(document).ready(function($){

	$(document).mailHider();
	var   $wrappers = $('div.pages-wrapper')
		, wrapperHeight = $wrappers.first().outerHeight()
		, slidersCallback = function(_slider,$el,animPercent,anim,block){
			
			if(_slider && _slider.hasPages){
				_slider.gotoPercent(animPercent);
			}
		}
		, $sliders = $('#Pages div.pages-slider:has(.pos-2)');



	$('#Pages div.page').on('click','a.page-link',function(e){
		e.preventDefault();
		$(window).scrollTo($(this).attr('href'),700,{
			offset:-60
			, easing: 'easeOutExpo'
		});
	})

	var scrollorama = $.scrollorama({blocks:$wrappers})
	.animate('#Pages div.pages-wrapper.pos-4',{
		  duration:wrapperHeight
		, property:['y',[1,0.3]]
		, start: 0
		, end:400
		, pin:false
	})

	$sliders.each(function(){
		var $slider = $(this)
			, _s = new Slider($slider);
	 	scrollorama.animate($slider,{
			  duration:wrapperHeight
			, property:''
			, end:0
			, pin:true
			, func:function($el,animPercent,anim,block){
				slidersCallback(_s,$el,animPercent,anim,block);
			}
		})
	})

})
