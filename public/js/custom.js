$(document).ready(function(){
	/*
	* Register the number of clicks
	*/
	$('#click-post').click(function(e){
		e.preventDefault();
		$.post('/click', { 
			postId: $(this).data('post'),
			_token: $(this).data('token')
		});
	});
});