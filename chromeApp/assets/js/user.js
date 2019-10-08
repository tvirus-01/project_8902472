$.ajax({
	url: 'https://project-890472.000webhostapp.com/module/get_test_data.php',
 	method: 'POST',
 	data: {userdata: 'userdata'},
 	success: function(data){
 		$('.dmp_user').html(data);
 	}
});

function exportTableToCSV($table, filename) {
    //alert('in');

    var $rows = $table.find('tr:has(td)'),

    // Temporary delimiter characters unlikely to be typed by keyboard
    // This is to avoid accidentally splitting the actual contents
    tmpColDelim = String.fromCharCode(11), // vertical tab character
    tmpRowDelim = String.fromCharCode(0), // null character

    // actual delimiter characters for CSV format
    colDelim = '","',
    rowDelim = '"\r\n"',

    // Grab text from table into CSV formatted string
    csv = '"' + $rows.map(function(i, row) {
      var $row = $(row),
        $cols = $row.find('td');

      return $cols.map(function(j, col) {
        var $col = $(col),
          text = $col.text();

        return text.replace(/"/g, '""'); // escape double quotes

      }).get().join(tmpColDelim);

    }).get().join(tmpRowDelim)
    .split(tmpRowDelim).join(rowDelim)
    .split(tmpColDelim).join(colDelim) + '"',

    // Data URI
    csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);
    
    console.log(this)
    
  //  var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", csvData);
    link.setAttribute("download", filename);
    document.body.appendChild(link); // Required for FF

    link.click(); //

}

$('.export-btn').click(function() {
	exportTableToCSV.call(this, $('.table'), 'user-data.csv');	
});