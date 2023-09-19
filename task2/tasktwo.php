<?php
$x= 5;
#The & sign takes the most recent bit of the variable
$y= &$x;
$x=15;
#y= 15 
#echo $y;
echo "<br>";
#دي بشتغل ف اي حته
define('test',2);
#echo test;
function task(){
    /**
     * This global function uses any variable outside function
     * The define is normal outside function
     */
    global $y;
    echo $y;
    echo test;
}
echo $x;
echo"<br>";
task();
echo"<br>";
echo $x;
echo"<br>";

function about(){
    $a=1;
    $b=2;
    echo $a+$b;
}
about();
echo"<br>";
#دي بتشتغل في oop بس ف  class
const Data="make project";
echo Data;
$z= 'name';
$$z="mahmoud";
echo"<br>";
echo "my fullname is : {$$z}";
echo"<br>";
echo "my fullname is : {$name}";
echo"<br>";
echo "my fullname is : {$z}";
echo"<br>";
echo "my fullname is : " .$$z;
echo"<br>";
#var_dump
$fristName="Mahmoud";
$age=22;
$salary=20.20;
#bool
$is_customer= false;
$internet_connected= true;
var_dump($fristName,$age,$salary,$is_customer,$internet_connected,0,null);
echo"<br>";
echo $is_customer;
echo"<br>";
$v=9;
if($v==9){
    echo"yes";
}
#falsey 0, null , false ,[];
echo"<br>";
$n= null;
if($n){
    echo"No";
}
$j=false;
echo"<br>";
var_dump(gettype($j));
echo"<br>";
echo PHP_INT_MAX;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>my num is <?php echo $y?></h1>
    <!--This is the latest form-->
    <h1>my num is <?=  $y ?></h1>

</body>
</html>