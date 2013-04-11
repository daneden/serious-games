$(document).ready(function(){
	
	var uNavToggle = 0;


	// Toggle user navigation
	$('.user-nav-toggle').click(function(){
		if(uNavToggle===0) {
			$('.user-nav').addClass('toggled-on');
			uNavToggle = 1;
		} else {
			$('.user-nav').removeClass('toggled-on');
			uNavToggle = 0;
		}
	});

	// Highlight selected answer
	$('.question-answer label').click(function(){
		$('.question-answer').removeClass('selected-answer');
		$(this).parent('.question-answer').addClass('selected-answer');
	});

	// Select clipboard elements on click
	$('.clipboard').click(function(){
		$(this).select();
	});
	
});