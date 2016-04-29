<?php
header('Content-Type: text/html');
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("webuser") or die(mysql_error());
$output = '';
$i = 0;
//collect
if (isset($_POST['email'])&&isset($_POST['username'])&&isset($_POST['password'])){
        $searchq1 = $_POST['email'];
       # $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
       # $searchq = str_replace(' ','+',$searchq);
        $searchq2 = $_POST['username'];
        $searchq3 = $_POST['password'];
        $queryexist = mysql_query("SELECT * from `user` where `email`='$searchq1'") or die(mysql_error());
        $count = mysql_num_rows($queryexist);
        if($count !== 0) $output = '<h3>User E-mail </h3><h2>'.$searchq1.'</h2><h3>already exists! </h3>';
        else{
        /*$queryexistnum = mysql_query("SELECT count(`id`) as num from `user`") or die(mysql_error());
        $count = mysql_fetch_array($queryexistnum)['num'];
        $count++;
        echo $count;*/
        $querycreate = mysql_query("INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$searchq2', '$searchq1', '$searchq3')") or die(mysql_error());
        $queryexist = mysql_query("SELECT * from `user` where `email`='$searchq1'") or die(mysql_error());
        $count = mysql_num_rows($queryexist);
        if($count !== 0) $output = '<h3>Congratulations!</h3><h2>'.$searchq2.'</h2></h3>Your account is created. E-mail <h2>'.$searchq1.'</h2></h3> is used for login.</h3>';
        else $output = '<h3>Unable to create account </h3><h2>'.$searchq1.'</h2>';
        }
}
?>
<html><head>
<title>Sign In</title>
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
<div id='header'>
<h1>Create Your Account</h1>
</div>
<div id="content">
<form action="" method="POST">
<label>E-mail:</label><input class="email" type="text" name="email" value="Your E-mail address" onclick='value=""'/><br />
<label>Username:</label><input class="username" type="text" name="username" value="Your name" onclick='value=""'/><br />
<label>Password:</label><input class="password" type="password" name="password" onclick='value=""'/><br />
<input class="signup" type="submit" value="Sign Up" name="login"/>
</form>
<?php
print($output);
?>
</div>
</body>
</html>