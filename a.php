<select id="option" name="option1[]"><option value="1">IT</option><option value="2">Accounting</option></select>
<button onclick="myFunction()">Try it</button>
<p id="demo">Click the button to change the text in this paragraph.</p>
<script>
function myFunction() {
        var yourSelect = document.getElementById( "option" );
        var value1 = yourSelect.options[ yourSelect.selectedIndex ].value;
alert(value1);
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