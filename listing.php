<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
     .anchor{
        text-decoration: none;
        color:white;
    } 
    .anchor:hover{
        text-decoration: none;
        color:white;
    }

</style> */
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header">
                <h2 style="text-align:center";>Listing</h2>
            </div>
            <div class="card-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            
                            <th>Action</th>
                            <br>
                            <th>
                                <div class="btn btn-info">
                                    <a href="add.php" class="anchor">ADD</a>
                                </div>
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $severname = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "task1";

                        $conn = mysqli_connect($severname,
                        $username,
                        $password,
                        $dbname);

                        if(!$conn){
                            die("Connection Failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM Information";

                        $result = mysqli_query($conn,$sql);

                        if(!$result){
                            die("Error:" . mysqli_error());
                        }

                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>" . $row["ID"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Password"] . "</td>";
                            echo "<td>";
                            echo "<a href='edit.php?id=". $row['ID'] ."'
                            class='btn btn-primary mr-2'>
                            <i class='fa-regular fa-pen-to-square'></i>
                            Edit </a>";

                            echo "<a href='delete.php? id=". $row['ID'] ."'
                            class='btn btn-danger' 
                            
                            onclick=\"return confirm ('Are you sure you want to delete this record?')\"
                            ><i class='fa-solid fa-trash'></i>
                            Delete </a>";
    
                            echo "</td>";
                            echo "</tr>";
                        }

                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8>
</html>