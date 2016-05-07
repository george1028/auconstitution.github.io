<?php
// page2.php
if (isset($_GET['name'])){
        $value1=$_GET['name'];
        echo "abc is ".$value1."<br />";
}

session_start();

echo 'Welcome to page #2<br />';
#echo 'a = '.$a;

echo $_SESSION['favcolor']; // green
echo $_SESSION['animal'];   // cat
echo date('Y m d H:i:s', $_SESSION['time']);

// You may want to use SID here, like we did in page1.php
echo '<br /><a href="a.php">page 1</a>';
?>