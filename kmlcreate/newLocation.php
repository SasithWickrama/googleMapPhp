<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../dbcon.php';

if (!$CON) 
{
  die('Not connected : ' );
}

$sql="SELECT * FROM TEST_LOCATIONS";
    
	$stid=oci_parse($CON,$sql);
    oci_execute($stid);

// Creates the Document.
$dom = new DOMDocument('1.0', 'UTF-8');

// Creates the root KML element and appends it to the root document.
$node = $dom->createElementNS('http://earth.google.com/kml/2.1', 'kml');
$parNode = $dom->appendChild($node);

// Creates a KML Document element and append it to the KML element.
$dnode = $dom->createElement('Document');
$docNode = $parNode->appendChild($dnode);

$poleStyleNode = $dom->createElement('Style');
$poleStyleNode->setAttribute('id', 'poleStyle');
$poleIconstyleNode = $dom->createElement('IconStyle');
$poleIconstyleNode->setAttribute('id', 'pole');
$polescale=$dom->createElement('scale', '0.75');
$poleIconstyleNode->appendChild($polescale);
$poleIconNode = $dom->createElement('Icon');
$poleHref = $dom->createElement('href', 'http://ossportal/Map/img/red.png');
$poleIconNode->appendChild($poleHref);
$poleIconstyleNode->appendChild($poleIconNode);
$poleStyleNode->appendChild($poleIconstyleNode);
$docNode->appendChild($poleStyleNode);


// Iterates through the MySQL results, creating one Placemark for each row.
while ($row = oci_fetch_array($stid))
{

	$discription =makeDiscription($row,$CON);
  // Creates a Placemark and append it to the Document.

  $node = $dom->createElement('Placemark');
  $placeNode = $docNode->appendChild($node);

  // Creates an id attribute and assign it the value of id column.
  $placeNode->setAttribute('id', 'placemark' . $row['FDP_FTC_NO']);

  // Create name, and description elements and assigns them the values of the name and address columns from the results.
  $nameNode = $dom->createElement('name',htmlentities($row['FDP_FTC_NO']));
  $placeNode->appendChild($nameNode);
  $descNode = $dom->createElement('description', $discription);
  $placeNode->appendChild($descNode);
  
  $styleUrl = $dom->createElement('styleUrl', '#poleStyle');
  $placeNode->appendChild($styleUrl);

  // Creates a Point element.
  $pointNode = $dom->createElement('Point');
  $placeNode->appendChild($pointNode);

  // Creates a coordinates element and gives it the value of the lng and lat columns from the results.
  $coorStr = $row['LON'] . ','  . $row['LAT'];
  $coorNode = $dom->createElement('coordinates', $coorStr);
  $pointNode->appendChild($coorNode);
}
//header('Content-type: application/vnd.google-earth.kml+xml');
$kmlOutput = $dom->saveXML();
$dom->save("../kmlfiles/newlocation.kml");
//echo $kmlOutput;


function makeDiscription($row,$CON)
{

$dis = '<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>

<table class="table" style="width:100%">  

  <tr>
    <td>Location Code:</td>
    <td>'.$row['LOCATION_CODE'].'</td>
  </tr>

</table>


</body>
</html>';

return $dis;

}
?>