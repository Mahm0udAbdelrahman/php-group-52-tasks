<?php
$name='mahmoud';
$pass=15358;
$flag=0;
$users =[
    ['name'=>'mahmoud','pass'=>'15358'],
    ['name'=>'mohamed','pass'=>'23667'],
    ['name'=>'hassan','pass'=>'32545']
];

foreach($users as $user){
    if($user['name']==$name && $user['pass']==$pass){
        $flag=1;
        break;
    }
}
if($flag==1){
    header('location:home.php');
}else{
    header('location:404.php');
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
        <h1>Login</h1>
    <label>Username:</label>
    <input type="text" name="name" id="">
    <br>
    <label>Password:</label>
    <input type="password" name="pass" id="">
    <br>
    <button>Login</button>



    </form>
</body>
</html>