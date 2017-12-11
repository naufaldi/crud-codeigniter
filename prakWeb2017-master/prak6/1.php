<!DOCTYPE html>
<html>
<head>
	<title>Belajar PHP</title>
</head>
<body>
<?php  
//php dasar
echo("hello word");
$txt = "hello word";
$x=5;
$y=10.5;

//string
$x="hello word";
echo"</br>";
$x = "hello word<br>";
echo $x;

//integer
$x= 5876;
var_dump($x);
echo "<br>";
$x= -5876;
var_dump($x);
echo "<br>";
$x= 0x8C;
var_dump($x);
echo "<br>";
$x= 047;
var_dump($x);
echo "<br>";

//float
$x= 10.365;
var_dump($x);
echo "<br>";
$x= 2.4e3;
var_dump($x);
echo "<br>";
$x= 8E-5;
var_dump($x);
echo "<br>";

//boolean
$x=true;
$y=false;

//array
$cars =array("volvo","BMW","Toyota");
var_dump($cars);

//object
class Car
{
	var $color;
	function Car($color ="green")
	{
		$this->color = $color;
	}
	function what_color()
	{
		return $this->color;
	}
}

//null
$x ="Hello word";
$x =null;
echo("<br>");
var_dump($x);

//echo dan print
//echo menampilkan string
echo "<br><h2>PHP is fun</h2>";
echo "hello word<br>";
echo "learn PHP<br>";
echo "this","string","was";

//echo menampilkan variable
$txt1 ="learn PHP";
$cars = array("volvo","BMW","Toyota");

echo "study at $txt1";
echo "my car is a {cars[0]";

?>
</body>
</html>