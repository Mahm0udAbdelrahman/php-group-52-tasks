<?php
$conn = mysqli_connect('localhost', 'root', '', 'card');

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $taxes = $_POST['taxes'];
        $ads = $_POST['ads'];
        $discount = $_POST['discount'];
        $count = $_POST['count'];
        $category = $_POST['category'];
        $insert = "insert into cruds(title,price,taxes,ads,discount,catgory) VALUES('$title','$price','$taxes','$ads','$discount','$category')";
        
         if($count>1){
             for($i=0; $i<$count;$i++){
                 $quary_insert = mysqli_query($conn, $insert);
                 header('location:projectone.php');
             }
         }else{
             $quary_insert = mysqli_query($conn, $insert);
                 header('location:projectone.php');
         }
    } else {
        echo 'in error';
    }
    if (isset($_POST['del'])) {

        $del_stat = "delete from cruds where id = $_POST[del]";
        $del_quary = mysqli_query($conn, $del_stat);
        header('location:projectone.php');
    } else {
        echo 'inerror2';
    }
    if (isset($_POST['all_delete'])) {

        $dell_statt = "delete from cruds";
        $dell_quaryy = mysqli_query($conn, $dell_statt);
        
        header('location:projectone.php');
    } else {
        echo 'inerror222';
    }
    
}
$stat = 'select * from cruds';
$quary_all = mysqli_query($conn, $stat);


// Retrieve the search query from the form submission
if (isset($_GET['Search_By_Title'])) {
    $searchQuery = $_GET['search_query'];

    // Connect to your MySQL database


    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct the SQL query to search for matching records
    $query = "SELECT * FROM cruds WHERE title LIKE '%$searchQuery%'";

    // Execute the SQL query
    $result = mysqli_query($conn, $query);

    // Check if any matching records were found
    if (mysqli_num_rows($result) > 0) {
        // Display the search results
        while ($roww = mysqli_fetch_assoc($result)) {
            $columnValue = $roww['title'];
            echo "$columnValue <br>";
        }
            // Access the data from each row
            
        
    } else {
        echo "No results found.";
    }

    // Close the database connection
    mysqli_close($conn);
}
if (isset($_GET['Search_By_Category'])) {
    $search_catgory = $_GET['search_query'];
    $stat_sreach = "select * from cruds where catgory like '%$search_catgory%'";
    $quary_search = mysqli_query($conn, $stat_sreach);
    if (mysqli_num_rows($quary_search) > 0) {
        while ($datte = mysqli_fetch_assoc($quary_search)) {
            $columnValuee = $datte['catgory'];
            echo "$columnValuee <br>";
        }
    } else {
        echo "No results found.";
    }
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
                    <small name="total"  id="Total"><?= 5555// $datee_to['total'] ?></small>

                </div>


                <input type="number" name="count" id="count" placeholder="count">
                <input type="text" name="category" id="category" placeholder="category">

                <button id="submit">Creata</button>
                <!--<button id="submit">Creat</button>-->


            </form>


        </div>

        <div class="output">
            <div class="searckBlock">
                <form method="GET">

                    <input type="text" id="Search" name="search_query" placeholder="Search">
                    <div class="btnSearch ">
                        <button name="Search_By_Title" id="searchTitle ">Search By Title</button>
                        <button name="Search_By_Category" id="searchCategory ">Search By Category</button>

                    </div>
                </form>
                <form method="post">
                    <?php if(mysqli_num_rows($quary_all) >= 1 ) :?>
                        <button name="all_delete" onclick="if(!confirm('Are you sure?')){return false}" id="searchCategory">all Delete</button>                
                    </form>
                        <?php endif?>
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
                    <th>catgory</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>

                <tbody name='tbodyt'>
                    <?php while ($row = mysqli_fetch_assoc($quary_all)) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['taxes'] ?></td>
                            <td><?= $row['ads'] ?></td>
                            <td><?= $row['discount'] ?></td>
                            <td><?= $row['total'] ?></td>
                            <td><?= $row['catgory'] ?></td>

                            <td><a href="updateone.php?myId=<?= $row['id'] ?>" class="btn btn-info" id="updata">updata</a></td>
                            <form method='POST'>
                                <input type="hidden" name="del" value="<?= $row['id'] ?> ">
                                <td><button type="submit" onclick="if(!confirm('Are you sure?')){return false}" id="delete"><span>deleta</span></button></td>
                            </form>
                        </tr>
                    <?php endwhile ?>
                    
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