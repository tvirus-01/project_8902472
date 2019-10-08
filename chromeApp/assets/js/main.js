$('.search-btn').click(function() {		
	var type = $('.sel-type').val();
	var query = $('.search-bar').val();
	var error = '';

	if (type == 0 || query == '') {
		$('.text-danger').text('all field must required');
		error = 'error';
	}else{
		$('.text-danger').text('');
		error = '';
	}

	if (error != '') {
		return false;
	}else{
		$('form').submit();
	}
});