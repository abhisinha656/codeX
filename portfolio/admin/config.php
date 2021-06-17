<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE databs";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
 }
//  else{
//    echo "Connected to DataBase : ";
//  }

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "databs";

$conn = mysqli_connect($servername, $username, $password, $database);
if($conn){
    // echo "connect";
}
else{
    echo "not connect";
}
$sql = "CREATE TABLE record (
    Sno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    email VARCHAR(70) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    msage VARCHAR(400) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
        if ($conn->query($sql) === TRUE) {
            echo "database created";
        }

        $sqll = "CREATE TABLE adminn (
            Sno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            code VARCHAR(50) NOT NULL,
            pass VARCHAR(30) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
            
            $sqlll = "INSERT INTO `adminn` (`Sno`, `code`, `pass`, `reg_date`) VALUES ('1', 'Abhineet', '12345', current_timestamp())";
            
                if (($conn->query($sqll) === TRUE) AND ($conn->query($sqlll) === TRUE)) {
                    echo "table created";
                }
?>