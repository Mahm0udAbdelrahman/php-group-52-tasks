<?php
var_dump($_POST);
if(isset($_POST['salutation'] ,$_POST['name'] , $_POST['lastname'] , $_POST['gender'] ,$_POST['email'], $_POST['date'] ,$_POST['address'] )){
    $Salutation =$_POST['salutation'];
    $userName =$_POST['name'];
    $lastName =$_POST['lastname'];
    $Gender =$_POST['gender'];
    $Email=$_POST['email'];
    $Date =$_POST['date'];
    $Address = $_POST['address'];

    echo $Salutation , $userName , $lastName ,$Gender , $Email , $Date ,$Address;

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
        <label>Salutation</label>
        <br>
        <select name="salutation" id="" >
            <option value="">--None--</option>
            <option value="num1">one</option>
            <option value="num2">two</option>
            <option value="num3">three</option>
        </select>
        <br>
    <label>First name:</label>
    <input type="text" name="name" id="">
    <br>
    <label>Last name:</label>
    <input type="text" name="lastname" id="">
    <br>
    <label>Gender:</label>
    
    <input type="radio" name="gender" value="male" id="">Male
    <input type="radio" name="gender" value="female" id="">Female
    <br>
    <label>Email:</label>
    <input type="email" name="email" id="">
    <br>
    <label>Date of Birth:</label>
    <input type="date" name="date" id="">
    <br>
    <label>Address:</label>
    <br>
    <textarea name="address" id="" cols="30" rows="10"></textarea>
    <br>
    <br>
    <button>Submit</button>
    </form>
</body>
</html>