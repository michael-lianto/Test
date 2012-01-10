<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>jQuery Starterkit</title>
<script src="jquery.js" type="text/javascript"></script>
<script src="custom.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
   // generate markup
   $("#rating").append("Please rate: ");
   
   for ( var i = 1; i <= 5; i++ ) {
     $("#rating").append("<a href='#'>" + i + "</a> ");
   }
   
   // add markup to container and apply click handlers to anchors
   $("#rating a").click(function(e) {
     // stop normal link click
     e.preventDefault();
     
     // send request
     $.post("rate.php", {rating: $(this).html()}, function(xml) {
       // format and output result
       $("#rating").html(
         "Thanks for rating, current average: " +
         $("average", xml).text() +
         ", number of votes: " +
         $("count", xml).text()
       );
     });
   });
 });
</script>
</head>

<body>
<?php

define('STORE', 'ratings.dat');

function put_contents($file,$content) {
	$f = fopen($file,"w");
	fwrite($f,$content);
	fclose($f);
}

if(isset($_REQUEST["rating"])) {
	$rating = $_REQUEST["rating"];
	$storedRatings = unserialize(file_get_contents(STORE));
	$storedRatings[] = $rating;
	put_contents(STORE, serialize($storedRatings));
	$average = round(array_sum($storedRatings) / count($storedRatings), 2);
	$count = count($storedRatings);
	$xml = "<ratings><average>$average</average><count>$count</count></ratings>";
	header('Content-type: text/xml'); 
	echo $xml;
}
?>

</body>
</html>
 