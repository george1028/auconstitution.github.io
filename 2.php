<?php
$html = "dddasdfdddasdffff";
$needle = "asdf";
$lastPos = 0;
$positions = array();

while (($lastPos = strpos($html, $needle, $lastPos))!== false) {
    $positions[] = $lastPos;
    $lastPos = $lastPos + strlen($needle);
}

// Displays 3 and 10
foreach ($positions as $value) {
    echo $value ."<br />";
}
?>