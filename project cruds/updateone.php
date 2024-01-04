<?php
$conn = mysqli_connect('localhost', 'root', '', 'card');
if($_GET['myId']){
    $stat_up="select * from cruds where id=$_GET[myId]";
    $quary_up=mysqli_query($conn,$stat_up);
    $date_up=mysqli_fetch_assoc($quary_up);
}else{
    echo'inerror';
}

if(isset($_POST['submitt'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $taxes = $_POST['taxes'];
    $ads = $_POST['ads'];
    $discount = $_POST['discount'];
    $count = $_POST['count'];
    $catgory = $_POST['catgory'];
    
    $state="update cruds set title='$title',price= '$price' ,taxes='$taxes',ads='$ads',discount='$discount',catgory='$catgory' where id = $_GET[myId]" ;
    
            $quaryy=mysqli_query($conn,$state);
            header('location:projectone.php');
            


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="projectone.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&family=Roboto:wght@500&family=Tajawal:wght@300&display=swap" rel="stylesheet">

    <title> project one js</title>
</head>

<body>
    <div class="crud container">
        <div class="header">
            <h1>CRUDS</h1>
            <P>PROJECT MANAGEMENT SYSTEM</P>
        </div>

        <div class="inputs">
            <form method='POST' action="">
                <input type="text" name="title" value="<?=$date_up['title']?>"   id="title" placeholder="title">




                <div class="prices ">

                    <input type="number" name="price" value="<?=$date_up['price']?>"    id="price" placeholder="price">
                    <input type="number" name="taxes" value="<?=$date_up['taxes']?>"  id="taxes" placeholder="taxes">
                    <input type="number" name="ads" value="<?=$date_up['ads']?>" id="ads" placeholder="ads">
                    <input type="number" name="discount" value="<?=$date_up['discount']?>"   id="discount" placeholder="discount">
                    <small id="Total">4684</small>

                </div>


                <input type="number" name="count"   id="count" placeholder="count">
                <input type="text" name="catgory" value="<?=$date_up['catgory']?>"  id="category" placeholder="category">

                <button id="submit" name="submitt" >Update</button>
                <!--<button id="submit">Creat</button>-->


            </form>


        </div>

        
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js.map"></script>
    <script src="js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="projectone.js"></script>

</body>

</html>
