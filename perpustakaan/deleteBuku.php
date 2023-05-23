<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['kodeBuku'])) {
          //query SQL
          $kodeBuku_upd = $_GET['kodeBuku'];
          
          // Mengambil data sampul didalam table buku
          $get_foto = "SELECT sampul FROM buku WHERE kodeBuku='$kodeBuku_upd'";
          $data_foto = mysqli_query(connection(), $get_foto); 

          // Mengubah data yang diambil menjadi Array
          $foto_lama = mysqli_fetch_array($data_foto);

          // Menghapus Foto lama didalam folder FOTO
          unlink("foto/".$foto_lama['sampul']);   

          
          $query = "DELETE FROM buku WHERE kodeBuku = '$kodeBuku_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            header("location:readBuku.php?pesan=hapus");
          }else{
            header("location:readBuku.php?pesan=gagalhapus");
          }
      }
    }
?>