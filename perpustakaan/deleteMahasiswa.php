<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['npm'])) {
          //query SQL
          $npm_upd = $_GET['npm'];
          $query = "DELETE FROM mahasiswa WHERE npm = '$npm_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            header("location:readMahasiswa.php?pesan=hapus");
          }else{
            header("location:readMahasiswa.php?pesan=gagalhapus");
          }
      }  
  }