<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task1";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Step 1: Get the ID of the record to be deleted.
    $sql = "SELECT * FROM Information WHERE ID = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    // Step 2: Delete the record from the database.
    $delete_rec = "DELETE FROM Information WHERE ID = $id";
    $obj = mysqli_query($conn, $delete_rec);
    echo $obj;
    

    // Step 3: Select all records from the table with IDs greater than the deleted record's ID.
    $sql = "SELECT * FROM Information WHERE ID > $id";
    $sql = "SELECT * FROM Information";
    $result = mysqli_query($conn, $sql);

    // Step 4: Decrement the IDs of each selected record by 1.
    while ($row = mysqli_fetch_assoc($result)) {
        $new_id = $row['ID'] - 1;

        // Step 5: Update the IDs of the selected records in the database.
        $sql = "UPDATE Information SET ID = $new_id WHERE ID = " . $row['ID'];
        mysqli_query($conn, $sql);

//         // Step 6: Get the maximum ID value and increment it by 1.
// $sql = "SELECT MAX(ID) AS max_id FROM Information";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);
// $new_id = $row['max_id'] + 1;

// // Step 7: Insert the new record with the new ID value.
// $sql = "INSERT INTO Information (ID, Name, Email, Password) VALUES ($new_id, 'John Doe', 'john@example.com', 'password')";
// mysqli_query($conn, $sql);
    }
    
}

header("location:listing.php");

mysqli_close($conn);
?>