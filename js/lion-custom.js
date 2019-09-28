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

});