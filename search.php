<?php
header('Content-Type: text/html');
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("itproject") or die(mysql_error());
$output = '';
$i = 0;
//collect
if (isset($_POST['search'])){
        $searchq = $_POST['search'];
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        $query = mysql_query("select * from server where `FQDN` like '%$searchq%'") or die(mysql_error());
        $count = mysql_num_rows($query);
        if($count == 0){
                $output = 'There was no search result';
     
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
<link rel="stylesheet" type="text/css" href="styles/style.css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
</head>
<body>
<table>
<tr><th>ID</th><th>Server Name</th><th>Country</th></tr>
<?php print("$output");
echo '<h3>'.$count.' records retrieved.</h3>';
$content = strip_tags(file_get_contents("http://george1028.github.io"));
if($searchq != ''){
        if (strstr($content,$searchq)) {
   echo "\"$searchq\" is found on this page";
}
else {
   echo "\"$searchq\" is not found on this page";
} 
}
 
?>
</table>
</body>
</html>