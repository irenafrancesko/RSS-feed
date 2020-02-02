<?php

$file = file_get_contents("data.xml");

$xml = new SimpleXMLElement($file);

//print_r($xml);

echo "<form method='POST' action='#'>";	 
echo "<select name='izbor'>";                 
echo "<option>Izaberite oblast</option>";
 foreach($xml->address as $adresa)
 {
   echo "<option>{$adresa["url"]}</option>";
 }
echo "</select>";
echo "<input type='submit' name='submit' value='Potvrdite'>";
echo "</form>";  


if(isset($_POST['izbor'])){
	
$xml1 = simplexml_load_file($_POST['izbor']);

foreach ($xml1->channel->item as $item){
 
  echo "<div style='padding:5px; margin:5px'>";
  
  echo "<h3>".$item->title."</h3>";
  echo $item->description;
  echo "<br>";
  echo "<a href='{$item->link}'>Detaljnije...</a>";
  
  echo "</div>";
  
}
}

?>