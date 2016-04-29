<?php
header('Content-Type: text/html');
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("webuser") or die(mysql_error());
$output = '';
$i = 0;
//collect
if (isset($_POST['email'])&&isset($_POST['password'])){
        $searchq1 = $_POST['email'];
       # $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
        $searchq1 = str_replace('\'',' ',$searchq1);
        $searchq2 = $_POST['password'];
        $querypass = mysql_query("select distinct * from `user` where `email` = '$searchq1'") or die(mysql_error());
        $count = mysql_num_rows($querypass);
        if($count == 0){
                $output = '<h3>There is no such user</h3><h2>'.$searchq1.'</h2><h3>in the database.</h3>';
     
        }else{
                while($row = mysql_fetch_array($querypass)){
                        $password = $row['password'];
                        $username = $row['username'];
                        if($password === $searchq2){
                                $output = '<h3>Login Successful. Welcome back!</h3><h2>'.$username.'</h2>';
                        }else{
                                $output = '<h3>Unmatched password. Please try again.</h3>';
                        }
                }
        }
}
?>
<html><head>
<title>Login</title>
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
<?php print($output);
?>
</div>
</body>
</html>