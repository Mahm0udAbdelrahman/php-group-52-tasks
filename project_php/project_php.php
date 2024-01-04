<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>project php</title>
    <style>
        body{
           margin: 0;
           padding: 0;
           background-image: url(data:image/jpeg;base64,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);
           background-color:whitesmoke;
           background-repeat: no-repeat;
           background-size:cover;
           font-family: 'Tajawal', sans-serif;
            }
            #Mother{
                width:100%;
                font-size:20px;
            }
            main{
                float: left;
                padding: 5px ;
                border: 1px solid gray;
            }
            input{
                padding: 5px;
                border: 2px solid black;
                text-align:center;
                font-size:17px;
               font-family: 'Tajawal', sans-serif;

            }
            aside{
                width:300px;
                padding: 10px;
                border: 2px solid black;
                text-align:center;
                float: right;
                font-size:20px;
                background-color:silver;
                color : white;     
            }
            #tbl{
                width:890px;
                color:white;
                font-size:20px;
                text-align:center;
                
            }
            #tbl tr:hover{
                background-color:red;
            }
            #tbl th{
                color : black;
                background-color:silver;
                padding: 10px;
                font-size:20px;
            }
            button{
                padding: 10px;
                width:200px;
                margin-top:7px;
                font-size: 20px;
               font-family: 'Tajawal', sans-serif;
               font-weight:bold;
            }

    </style>
    <script>
        // Get the client's entered date
//var clintDate = new Date(prompt("Enter a date (YYYY-MM-DD):"));

// Get today's date
var today = new Date();

// Compare the dates
//if (today > "ttoo") {
       //("Warning: Today's date is greater than the client's date!");
//}
    </script>
</head>
<body   dir="">
    <div id="Mother" >
        <form method="POST">
            <aside>
                <div id="home_php">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnw5eJD_tN-NekgSW9yxj1SfaDPiJGdIULuw&usqp=CAU" alt="No photo" width="200px" >
                    <h3>Shudent</h3>
                    <label for="">ID</label><br>
                    <input type="text" id="id" name="id"><br>
                    <label for="">Name</label><br>
                    <input type="text" id="name" name="name"><br>
                    <label for="">Address</label><br>
                    <input type="text" id="address" name="address"><br>
                    <label for="">from</label><br>
                    <input type="date" id="frroomm" name="frroomm"><br>
                    <label for="">to</label><br>
                    <input type="date" id="ttoo" name="ttoo"><br>
                    <button name="add">ADD</button><br>
                    <button name="del">DELETE</button><br>
                </div>
                <?php
                $host="localhost";
                $user="root";
                $pass="";
                $db="sdd";
                $conn=mysqli_connect($host,$user,$pass,$db);
                $q=mysqli_query($conn,"select * from student");
                $id="";
                $name="";
                $address="";
                $from="";
                $to="";
                if(isset($_POST["id"])){
                    $id=$_POST["id"];
                }
                if(isset($_POST["name"])){
                    $name=$_POST["name"];
                }
                if(isset($_POST["address"])){
                    $address=$_POST["address"];
                }
                if(isset($_POST["frroomm"])){
                    $from=$_POST["frroomm"];

                }if(isset($_POST["ttoo"])){
                    $to=$_POST["ttoo"];
                }
                $sqls="";
                if(isset($_POST["add"])){
                    $sqls="insert into student values ($id ,'$name','$address' , '$from' , '$to')";
                    mysqli_query($conn,$sqls);
                    header("location:project_php.php");
                }
                if(isset($_POST["del"])){
                    $sqls="delete from student where $id=id";
                    mysqli_query($conn,$sqls);
                    header("location:project_php.php");
                }               
                ?>
            </aside>
            <main>
                <table id="tbl">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>From</th>
                        <th>To</th>

                    </tr>
                    <?php
                    while($row=mysqli_fetch_array($q)){
                        echo"<tr>";
                        echo"<td>".$row["id"]."</td>";
                        echo"<td>".$row["name"]."</td>";
                        echo"<td>".$row["address"]."</td>";
                        echo"<td>".$row["frroomm"]."</td>";
                        echo"<td>".$row["ttoo"]."</td>";
                        echo"</tr>";

                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>
<?php
ob_end_flush();
?>