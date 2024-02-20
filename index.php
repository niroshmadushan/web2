<?php
// Step 1: Establish a connection to the database
$servername = "localhost"; // Or your database server address
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "game"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search functionality
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];
    $sql = "SELECT * FROM `user` WHERE id = '$searchTerm'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Data found, display alert
        echo "<script>alert('found!');</script>";
      
    } else {
        // Data not found, display alert
        echo "<script>alert('Data not found in the database.');</script>";
        $sql = "INSERT INTO `temp`(`des`) VALUES ('$searchTerm')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        header("Location: game.php");
    }
}

// Close the connection
$conn->close();
?>


<html>
    <head>
        <title>

        </title>
    </head>
    <body>
        <form method="post">
            <input type="text" id="id" name="searchTerm"/>
            <button type="submit" name="search">submit</button>
        </form>
    </body>
</html>