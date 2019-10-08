function get(name){
   if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
      return decodeURIComponent(name[1]);
}
 var search_query = get('search_query');
 var search_type = get('search_type');

 $('.search-bar').val(search_query);
console.log(search_type);
 if (search_type == 1) {
 	$('#zero').removeAttr('selected');
 	$('#two').removeAttr('selected');
 	$('#one').attr('selected', 'selected');
 }else if(search_type == 2) {
 	$('#zero').removeAttr('selected');
 	$('#one').removeAttr('selected');
 	$('#two').attr('selected', 'selected');
 }

 $.ajax({
 	url: 'https://project-890472.000webhostapp.com/module/get_test_data.php',
 	method: 'POST',
 	data: {gpdata: 'gpdata'},
 	success: function(data){
 		$('.dump_grp').html(data);
 	}
 });
 