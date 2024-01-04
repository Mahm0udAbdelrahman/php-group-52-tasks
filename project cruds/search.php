<?php

if(isset($_POST['search'])){
    $search=$_POST['Search_By_Title'];
    $conn = mysqli_connect('localhost', 'root', '', 'card');
    $stat_search="select * from cruds where concat(title) like '%$search%'";
    $quary_search=mysqli_query($conn,$stat_search);
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
                <input type="text" name="title" id="title" placeholder="title">




                <div class="prices ">

                    <input type="number" name="price" id="price" placeholder="price">
                    <input type="number" name="taxes" id="taxes" placeholder="taxes">
                    <input type="number" name="ads" id="ads" placeholder="ads">
                    <input type="number" name="discount" id="discount" placeholder="discount">
                    <small id="Total">4684</small>

                </div>


                <input type="number" name="count" id="count" placeholder="count">
                <input type="text" name="category" id="category" placeholder="category">

                <button id="submit">Creata</button>
                <!--<button id="submit">Creat</button>-->


            </form>


        </div>

        <div class="output">
            <div class="searckBlock">
                <form method="POST">

                    <input type="text" id="Search" name="search" placeholder="Search">
                    <div class="btnSearch ">
                        <button name="Search_By_Title"  id="searchTitle ">Search By Title</button>
                        <button name="Search_By_Category" id="searchCategory ">Search By Category</button>

                    </div>
                </form>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>price</th>
                    <th>taxes</th>
                    <th>ads</th>
                    <th>discount</th>
                    <th>total</th>
                    <th>count</th>
                    <th>catgory</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>

                <tbody>
                    <?php if(mysqli_num_rows($quary_search)>0) : ?>
                    <?php while ($row = mysqli_fetch_assoc($quary_search)) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['taxes'] ?></td>
                            <td><?= $row['ads'] ?></td>
                            <td><?= $row['discount'] ?></td>
                            <td><?= $row['total'] ?></td>
                            <td><?= $row['count'] ?></td>
                            <td><?= $row['catgory'] ?></td>

                            <td><a href="updateone.php?myId=<?= $row['id'] ?>" class="btn btn-info" id="updata">updata</a></td>
                            <form method='POST'>
                                <input type="hidden" name="del" value="<?= $row['id'] ?> ">
                                <td><button type="submit" onclick="if(!confirm('Are you sure?')){return false}" id="delete"><span>deleta</span></button></td>
                            </form>
                        </tr>
                    <?php endwhile ?>
                    <?php endif ?>
                </tbody>
            </table>
            <?php

            ?>

        </div>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js.map"></script>
    <script src="js/code.jquery.com_jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="projectone.js"></script>

</body>

</html>