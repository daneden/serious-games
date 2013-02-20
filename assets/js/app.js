$(document).ready(function(){
	
	var uNavToggle = 0;

	$('.user-nav-toggle').click(function(){
		if(uNavToggle===0) {
			$('.user-nav').addClass('toggled-on');
			uNavToggle = 1;
		} else {
			$('.user-nav').removeClass('toggled-on');
			uNavToggle = 0;
		}
	});
	
});