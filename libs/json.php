<?php

function generateJSON($result) {
    $json = "[";
	while($row = $result->fetch_assoc()) {
		$json .= '{';
		foreach ($row as $key => $value) {
		    $json .= '"'.$key.'":"'.$value.'",';
		}
		$json = substr($json,0,-1);
		$json .= '},';
	}
	$json = substr($json,0,-1);
	$json .= ']';
	$json = ($json == ']') ? '{"error":"empty response"}' : $json;
	    
	return utf8_encode($json);
}

?>
