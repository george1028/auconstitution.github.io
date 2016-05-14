<html><head><title>b</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
.change-hover img {
    display: none;
}
.change-hover img:first-of-type {
    display: inherit;
}</style></head><body>
<script>$(document).ready(function() {
$('.change-hover').hover(function () {
    $(this).find('img').hide().last().fadeIn();
}, function () {
    $(this).find('img').hide().first().fadeIn();
});
}); 
</script>

<a href="#" class="change-hover">
    <img src="http://lorempixel.com/100/100/food/1"  alt=""/>
    <img src="http://lorempixel.com/100/100/food/2" alt=""/>
    <img src="http://lorempixel.com/100/100/food/3"  alt=""/>
</a>

<a href="#" class="change-hover">
    <img src="http://lorempixel.com/100/100/food/3"  alt=""/>
    <img src="http://lorempixel.com/100/100/food/4" alt=""/>
</a>

<?php
// page2.php
if (isset($_GET['name'])){
        $value1=$_GET['name'];
        echo "abc is ".$value1."<br />";
}
$words = preg_split("/[\s,_-]+/", "Community College District");
$acronym = "";
foreach ($words as $w) {$acronym .= $w[0];}
echo $acronym.'<br />';
session_start();

echo 'Welcome to page #2<br />';
#echo 'a = '.$a;

echo $_SESSION['favcolor']; // green
echo $_SESSION['animal'];   // cat
echo date('Y m d H:i:s', $_SESSION['time']);

// You may want to use SID here, like we did in page1.php
echo '<br /><a href="a.php">page 1</a>';
?></body>
</html>