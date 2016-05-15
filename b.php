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
    <img src="http://lorempixel.com/100/100/food/1"  alt="1" title="1" />
    <img src="http://lorempixel.com/100/100/food/2" alt="2" title="2" />
    <img src="http://lorempixel.com/100/100/food/3"  alt="3" title="3" />
</a>

<a href="#" class="change-hover">
    <img src="http://lorempixel.com/100/100/food/3"  alt="3" title="3" />
    <img src="http://lorempixel.com/100/100/food/4" alt="4" title="4" />
</a>
<br /><div id='firstdiv' class="setattrtest1"><div>
<a href="a.php" class="setattrtest"><label class="mandatory"><p class='innerp' title="asdf">Javascript Mandatory</p></label>
<label class="mandatory3">Javascript Mandatory 3</label></a>
<a href="http://www.abc.net.au/news/2016-05-14/bishop-defends-ministers-after-wa-treasurer-launches-gst-attack/7414966"><p>OMMG</p></a>
<br />
<label class="mandatory">Javascript Mandatory 2</label>
<br /></div>
<label class="jmandatory">jQuery Mandatory</label></div>
<p class="jmandatory1">jQuery Mandatory 1</p>
<?php
// page2.php
echo "<script>
$(document).ready(function() {
document.getElementsByClassName('mandatory')[1].setAttribute('title', 'mandatory');
$('.jmandatory').attr('title', 'jmandatory');
});
$(document).ready(function(){		
    var target = $(this).find('.setattrtest1 div a').attr('href');
    $(this).find('label').attr('title', target);
});
</script>";
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
echo "<script>
String.prototype.replaceAll = function(target, replacement) {
  return this.split(target).join(replacement);
};
function myFunction1() {
    var x = document.getElementById('firstdiv').querySelectorAll('a');
    var xx = x[1].getAttribute('href');
    var xnewstitle = xx.substring(xx.indexOf('/',('http://www.abc.net.au/news/2016-05-14').length)+1,xx.lastIndexOf('/'));
    document.getElementById('demo').innerHTML = xnewstitle.replaceAll('-',' ').toUpperCase();    
    document.getElementsByClassName('jmandatory1')[0].setAttribute('title',x[1].getAttribute('href'));
    for (i = 0; i < x.length; i++) {
    x[i].setAttribute('title',x[i].getAttribute('href'));
}
}
function showCoords(event) {
    var x = event.clientX;
    var y = event.clientY;
    var coords = 'X coords: ' + x + ', Y coords: ' + y;
    var element = document.elementFromPoint(x, y);
    document.getElementById('demo').innerHTML = element.getAttribute('href');
}
jQuery(document).ready(function() {
jQuery('.change-hover').hover(function (event) {
    myFunction1();showCoords(event);
}, function () {
});
});
</script>";
echo "<br /><p id='demo' onclick='showCoords(event);' title='abc'>Click me to change my HTML content (innerHTML).</p>";
echo $_SESSION['favcolor']; // green
echo $_SESSION['animal'];   // cat
echo date('Y m d H:i:s', $_SESSION['time']);

// You may want to use SID here, like we did in page1.php
echo '<br /><a href="a.php">page 1</a>';
?></body>
</html>