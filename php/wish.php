<?php
include 'connection.php';
$shout_query = "SELECT * FROM tr_ucapan ORDER BY ucapanId DESC";
$shouts = mysqli_query($conn, $shout_query);
// $Submit = isset($_POST['Submit']) ? $_POST['Submit'] : false;
// $Name = isset($_POST['Name']) ? $_POST['Name'] : '';
// $Ucapan = isset($_POST['Ucapan']) ? $_POST['Ucapan'] : '';
// if($Submit){
//  echo $Name;
//  echo $Ucapan;
// }

$name = isset($_POST['name']) ? $_POST['name'] : '';
$wish = isset($_POST['wish']) ? $_POST['wish'] : '';


// //nilai variable diambil dari tag name
// //id auto
// //date auto
// $name = $_POST["name"];
// $ucapan = $_POST["ucapan"];

mysqli_query($conn, "SELECT * FROM tr_ucapan");
mysqli_query($conn, "INSERT INTO `tr_ucapan` (`ucapanId`, `date`, `nama`, `ucapan`) VALUES (NULL, current_timestamp(), '$name', '$wish');");
//header("Location:/undangan/php/wish.php");
?>