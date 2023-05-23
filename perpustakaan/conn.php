<?php 

function connection() {
   // membuat koneksi ke database system
   $dbServer = 'localhost:8111';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "perpustakaan";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

   if(! $conn) {
      die('Connection Failed: ' . mysqli_error());
   }
   
   //memilih database yang akan dipakai
   $data = mysqli_select_db($conn,$dbName);
	
   return $conn;
}