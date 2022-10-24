<?php
$servername = "localhost";
$username = "root";
$password = '';

try {
  $conn = new PDO("mysql:host=$servername;dbname=thi_m2", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "đã kết nối thành công";
} catch(PDOException $e) {
  // echo "kết nối thất bại " . $e->getMessage();
}
?>