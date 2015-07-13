function test(day, month, year) 
{
	// Pobieranie dzień miesiąć rok i później z Google API wyciągnie poszczególnych Eventów na podstawie tej daty
	$.get( "../gettest.php?day="+day+"&month="+month+"&year="+year, function( data ) {
	  document.getElementById("mod_content").innerHTML = data;
	});
}
