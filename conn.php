<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = 'db name here';
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          echo "Cant connect db.";
        }
?>