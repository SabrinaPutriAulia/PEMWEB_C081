<?php 

function connection() {
   // membuat koneksi ke database system
   $dbServer = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "classicmodels";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

   if(! $conn) {
      die('Connection Failed: ' . mysqli_error());
   } else {
      echo 'Connection Succesful';
      echo '<hr>';
   }
   
   //memilih database yang akan dipakai
   mysqli_select_db($conn,$dbName);
	
   return $conn;
}