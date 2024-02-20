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
   
    $sql = "SELECT * FROM `temp`;";
    $result = $conn->query($sql);
    $dataArray = array();
    if ($result->num_rows > 0) {
       
    }


// Close the connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Spin Wheel App</title>
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="wrapper">
      <div id="data">
      <div class="container">
        <canvas id="wheel"></canvas>
        <button id="spin-btn">Spin</button>
        <img src="icons8-arrow-64.png" alt="spinner-arrow" />
      </div>
      <div id="final-value">
        <p>Click On The Spin Button To Start</p>
      </div>
  </div>
      <div class="win" id="w">
      <form action="post">
        <span id="fv" name="fvp"></span>
        <h1 id="fv"></h1>
        <p><?php
        while ($row = $result->fetch_assoc()) {
          $dataArray[] = $row;
      }
        foreach ($dataArray as $data) {
          
          echo $data['des']."<br>";
         
      }
      ?>
        
        </p>
        <button type="submit" name="search">submit</button>
      </form></div>
    </div>
    <div class="win">
        
    </div>
    <!-- Chart JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <!-- Chart JS Plugin for displaying text over chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"></script>
    <!-- Script -->
    <script src="script.js"></script>
  </body>
</html>