
<?php
$lineArray = file('https://www.google.com.au/search?client=aff-cs-360se&ie=UTF-8&q=perth+jobs&');
foreach($lineArray as $line){
if(strlen($line) > 0){
echo $line.'<br>';
}
}
?>