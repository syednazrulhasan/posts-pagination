jQuery(document).ready(function(){

/**********************************************************************************************/	
/**************Add different class on Next and Previous button code START here*****************/
/**********************************************************************************************/
	jQuery('.styled-button').each(function(){
		var getClass = jQuery(this).text();
		if(getClass == 'Previous Page'){
			jQuery(this).addClass('prev-page');
		}
		if(getClass == 'Next Page'){
			jQuery(this).addClass('next-page');
		}

		if(getClass == 'Start Slideshow'){
			jQuery(this).addClass('startslidesho');
		}
	});
/**********************************************************************************************/	
/**************Add different class on Next and Previous button code START here*****************/
/**********************************************************************************************/


	if (jQuery('.next-page')[0] || jQuery('.prev-page')[0] ) {
		
		jQuery([document.documentElement, document.body]).animate({
        scrollTop: jQuery(".ovaem_detail_post").offset().top
    	}, 2000);
	}
});