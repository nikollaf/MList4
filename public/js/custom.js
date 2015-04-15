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

	/*
	* Rate/Vote system
	*/

	$('#vote1').raty({
		half: true,
		scoreName: 'vote1'
	});
	$('#vote2').raty({
		half: true,
		scoreName: 'vote2'
	});
	$('#vote3').raty({
		half: true,
		scoreName: 'vote3'
	});

});