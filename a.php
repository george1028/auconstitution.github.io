<select id="option" name="option1[]"><option value="1">IT</option><option value="2">Accounting</option></select>
<input id="keyword" type="text"></input>
<button onclick="myFunction()">Try it</button>
<body>ttt</body>
<p id="demo">Click the button to change the text in this paragraph.</p>
<a href="c.php">page 3</a><br />
<script>
function myFunction() {
        var yourSelect = document.getElementById( "option" );
        var value1 = yourSelect.options[ yourSelect.selectedIndex ].value;
        var keywords1 = document.getElementById("keyword");
        var value2 = keywords1.value;
alert(value2);
window.location.href = "a.php?name=" + value1; 
}
</script>
<?php
// page1.php
session_start();
if (isset($_GET['name'])){
        $value1=$_GET['name'];
        echo "abc is ".$value1."<br />";
}
?><?php
echo 'Welcome to page #1';

$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();
$a='a';

// Works if session cookie was accepted
echo '<br /><a href="b.php">page 2</a>';

// Or maybe pass along the session id, if needed
echo '<br /><a href="b.php?' . SID . '">page 2</a>';

# session_destroy();
?>