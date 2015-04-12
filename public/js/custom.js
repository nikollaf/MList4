$(document).ready(function(){
	/*
	* Register the number of clicks
	*/
	$('.click-post').click(function(){
		$.post('/click', {
			postId: $(this).data('post'),
			_token: $(this).data('token')
		});
	});
});