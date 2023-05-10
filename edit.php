<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "task1";

  $conn = mysqli_connect($servername, $username, $password, $dbname);


// echo "<pre>";
// print_r($GLOBALS);
// echo "</pre>";


  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  //When user clicks on save button This part of code will run. 
  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    $query = "UPDATE Information set Name='$name', Email='$email', Password='$password' WHERE ID=$id";

    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Record updated successfully";
        header("location:listing.php");
    }
     else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} 
else        //this part of code will run when user comes from listing page.
{
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  //$id=1;
  $query = "SELECT * FROM Information WHERE ID=$id";
//   die();
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_assoc($result)){
    $name = $row['Name'];
    $email = $row['Email'];
    $password = $row['Password'];
  }
}

 
  // while ($row = mysqli_fetch_assoc($result)){
  //   echo $row['Name'];
  // }

  // mysqli_close($conn);
?>

    <div class="container">
        <h2 style="text-align:center;">EDIT Form</h2>
        <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" value="<?php echo $id; ?>" id="id" placeholder="ID "
                        name="id">
                    <input type="text" class="form-control" value="<?php echo $name; ?>" id="name"
                        placeholder="Enter Your Name " name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" value="<?php echo $email ; ?>" id="email"
                        placeholder="Enter email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" value="<?php echo $password ; ?>" id="pwd"
                        placeholder="Enter password" name="pwd">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="update">Save</button>
                </div>
            </div>
        </form>
    </div>

    <?php 

 mysqli_close($conn);
?>