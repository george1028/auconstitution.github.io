<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("itproject") or die(mysql_error());
$output = '';
//collect
if (isset($_POST['search'])){
        $searchq = $_POST['search'];
        $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        $query = mysql_query("select * from continent") or die(mysql_error());
        $count = mysql_num_rows($query);
        if($count == 0){
                $output = 'There was no search result';
     
        }else{
                while($row = mysql_fetch_array($query)){
                        $name = $row['ContinentName'];
                        $output .= '<div>'.$name.'</div>';
                }
        }
}
?>
<?php print("$output");?>