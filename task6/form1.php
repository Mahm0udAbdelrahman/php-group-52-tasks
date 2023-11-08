<?php
var_dump($_POST);
if(isset($_POST['name'] , $_POST['pass'] , $_POST['city'] ,$_POST['web'], $_POST['specify'] ,$_POST['single'] )){

    $userName =$_POST['name'];
    $Password =$_POST['pass'];
    $City =$_POST['city'];
    $Web=$_POST['web'];
    $Specify =$_POST['specify'];
    $Single = $_POST['single'];

    echo $userName , $Password ,$City , $Web , $Specify ,$Single;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <label>Username:</label>
    <input type="text" name="name" id="">
    <br>
    <label>Password:</label>
    <input type="password" name="pass" id="">
    <br>
    <label>City of Employment:</label>
    <input type="text" name="city" id="">
    <br>
    <label>Web server:</label>
    <select name="web" id="" >
        <option value="">--Choose a server--</option>
        <option value="lan1">Html</option>
        <option value="lan2">css</option>
        <option value="lan3">js</option>
    </select>
    <br>
    <label>Please specify your role:</label>
    
    <input type="radio" name="specify" value="Admin" id="">Admin
    <input type="radio" name="specify" value="Engineer" id="">Engineer
    <input type="radio" name="specify" value="Manager" id="">Manager
    <input type="radio" name="specify" value="Guest" id="">Guest
    <br>
    <label>Single sign-on to the following:</label>
    <input type="checkbox" name="single" id="">Mail
    <input type="checkbox" name="single" id="">Payroll
    <input type="checkbox" name="single" id="">Self-service
    <br>
    <button>Login</button>
    <button>Reset</button>



    </form>
</body>
</html>