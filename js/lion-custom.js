$(document).ready(function(){
	$("#mob-menu-hamburgerbtn-wrapper").click(function(){
		$(".mob-menu-items-wrapper").slideToggle();

		/*if($(".mob-menu-items-wrapper").css("display") == 'block') {
			$(".mob-main-menu-top-sec-wrapper").css({'margin-bottom': '0'});
			$(".mob-main-menu-wrapper .mob-menu-search-field-sec-wrapper").hide();
		}
		
		else if($(".mob-menu-items-wrapper").css("display") == 'none') {
			//console.log("aa");
			$(".mob-main-menu-top-sec-wrapper").css({'margin-bottom': '10px'});
			$(".mob-main-menu-wrapper .mob-menu-search-field-sec-wrapper").show();
		}*/
	});


	/*mobile menu inside sub categories sec*/

	// $(".mob-itm-sub-categ-consist-wrapper > span").click(function(){
	// 	$(".mob-sub-categ-wrapper").slideToggle();
	// });

	// $(".mob-sub-cat-inc-menu-itm-wrapper > span#sub-cat-a").click(function(){
	// 	$(".mob-sub-in-sub-categ-a").slideToggle();
	// });

	// $(".mob-sub-cat-inc-menu-itm-wrapper > span#sub-cat-b").click(function(){
	// 	$(".mob-sub-in-sub-categ-b").slideToggle();
	// });

	/*mobile menu inside sub categories sec*/


	/*when scroll*/

	$(window).scroll(function(){

		var scroll_menu_to_sec = $(document).scrollTop(); 

		if (scroll_menu_to_sec > 23) {
			$(".header-main-menu-sec-wrapper").addClass('addClass_header_sticky');
			$(".menu-top-sec-wrapper").addClass('hide_top_sec_main_menu');
			$(".menu-mid-sec-inner-wrapper").addClass('menu_mid_sec_inner_wrapper_add_class');
			
			$(".mob-main-menu-wrapper").addClass('addClass_header_sticky');
			$(".mob-menu-search-field-sec-wrapper").addClass('mobile_menu_top_search_sec');
			$(".mob-main-menu-top-sec-wrapper").addClass('addClass_mob_main_menu_top_sec_wrapper');
		}
		
		else {
			$(".header-main-menu-sec-wrapper").removeClass('addClass_header_sticky');
			$(".menu-top-sec-wrapper").removeClass('hide_top_sec_main_menu');
			$(".menu-mid-sec-inner-wrapper").removeClass('menu_mid_sec_inner_wrapper_add_class');
			
			$(".mob-main-menu-wrapper").removeClass('addClass_header_sticky');
			$(".mob-menu-search-field-sec-wrapper").removeClass('mobile_menu_top_search_sec');
			$(".mob-main-menu-top-sec-wrapper").removeClass('addClass_mob_main_menu_top_sec_wrapper');
		}

	});

	/*when scroll*/

});