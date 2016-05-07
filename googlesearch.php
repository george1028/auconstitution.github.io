<?php
header('Content-Type: text/html');
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("itproject") or die(mysql_error());
$output = '';
$i = 0;
//collect
if (isset($_POST['search'])){
        $searchq = $_POST['search'];
       # $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        $searchq = str_replace(' ','+',$searchq);
        $query = mysql_query("select * from server where `FQDN` like '%$searchq%'") or die(mysql_error());
        $count = mysql_num_rows($query);
        if($count == 0){
                $output = 'There is no search result in the database.';
     
        }else{
                while($row = mysql_fetch_array($query)){
                        $id = $row['ServerID'];
                        $name = $row['FQDN'];
                        $country = $row['countryCode'];
                        $i++;
                        if($i%2 != 0)
                        $output .= '<tr><td>'.$id.'</td><td>'.$name.'</td><td>'.$country.'</td></tr>';
                        else{
                               $output .= '<tr><td class="stagger">'.$id.'</td><td class="stagger">'.$name.'</td><td class="stagger">'.$country.'</td></tr>'; 
                        }
                }
        }
}
?>
<html><head>
<title>Search Results</title>
<meta charset="utf-8"/>
<link rel="stylesheet" media="screen" type="text/css" href="styles/style.css" id="normal"/>
<link rel="stylesheet" media="screen" type="text/css" href="styles/style-moz.css" id="moz"/>
<link rel="stylesheet" media="screen" type="text/css" href="styles/style-android.css" id="android"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script type="text/javascript">
function replace(){
//alert(window.navigator.userAgent.indexOf("Android"));
if(window.navigator.userAgent.indexOf("Android")>-1){
document.getElementById("normal").disabled = true;
document.getElementById("android").disabled = false;
document.getElementById("moz").disabled = true;
}
else if(window.navigator.userAgent.indexOf("Firefox")>-1){
document.getElementById("normal").disabled = true;
document.getElementById("android").disabled = true;
document.getElementById("moz").disabled = false;
}
else{
document.getElementById("normal").disabled = false;
document.getElementById("android").disabled = true;
document.getElementById("moz").disabled = true;
}}
</script>
</head>
<body class="s" onload="replace()">
<div id="content">
<?php
$lastPos = 0;
$positions = array(); 
$result = array();
echo '<h3>'.$count.' records retrieved.</h3>';
#$content = strip_tags(file_get_contents("https://www.google.com.au/search?client=aff-cs-360se&ie=UTF-8&q=perth+jobs&"));
#$content1 = file_get_contents("https://www.google.com.au/search?client=aff-cs-360se&ie=UTF-8&q=perth+jobs&");
$content1 = file_get_contents("https://www.google.com.au/search?q=".$searchq."&");
if($searchq != ''){
        while (($lastPos = stripos($content1, 'http', $lastPos))!== false) {
    $positions[] = $lastPos;
    $temp = substr($content1, $lastPos-30, 160);
   if(stripos($temp,'&amp') && stripos($temp,'class="r"'))
   $result[] = substr($temp,stripos($temp,'http'),stripos($temp,'&amp')-stripos($temp,'http'));
#else if(stripos($temp,'//')) $result[] = $temp;
   $lastPos = $lastPos + strlen($searchq);
}
    echo sizeof($positions)." occurrences are found for '$searchq' <br /><br /><br />";
foreach ($result as $display){
        echo '<font size=5 color=#000>'.htmlspecialchars($display)."</font> <br /><br />";
}
#echo $searchq;
    /*   # if (strstr($content,$searchq)) {
         if($pos=stripos($content,$searchq)){
                 $rest = substr($content, $pos-20, 50);
   echo nl2br("'$searchq' is found on this page at position $pos. \n '$rest'");
}
else {
   echo "'$searchq' is not found on this page. ";
} */
}
?>
<table>
<tr><th>ID</th><th>Server Name</th><th>Country</th></tr>
<?php print("<br />$output");
?>
</table>
</div>
</body>
</html>