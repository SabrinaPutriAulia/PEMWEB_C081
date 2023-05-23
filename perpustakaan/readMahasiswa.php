<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA MAHASISWA</title>
    <!-- load css boostrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Perpustakaan <br> UPN Veteran Jatim</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:15px;">
               <li class="nav-item">
               <a class="nav-link bg-light" href="<?php echo "index.php"; ?>">Halaman Utama</a>
               <!-- Data Perpustakaan -->
                <ul class="nav flex-column">
                <a class="nav-link bg-light">Data Perpustakaan</a>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px; color: white" href="<?php echo "readBuku.php"; ?>">- Buku</a></li>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px; color: white" href="<?php echo "readMahasiswa.php"; ?>">- Mahasiswa</a></li>
                </ul>
                <!-- Tambah Data Perpustakaan -->
                <ul class="nav flex-column">
                <a class="nav-link bg-light">Input Data Perpustakaan</a>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px; color: white" href="<?php echo "formBuku.php"; ?>">- Buku</a></li>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px; color: white" href="<?php echo "formMahasiswa.php"; ?>">- Mahasiswa</a></li>
                </ul>
               </li>
              </ul>
          </div>
        </nav>
      </div>
    </div>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         <?php

              if(isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "berhasil") {
                  echo'<br><br><div class="alert alert-primary" role="alert">
                  Berhasil Mengubah Data Mahasiswa </div>';
                }
                elseif ($_GET['pesan'] == "gagal") {
                  echo'<br><br><div class="alert alert-danger" role="alert">
                  Gagal Mengubah Data Mahasiswa </div>';
                }
                elseif ($_GET['pesan'] == "hapus") {
                  echo'<br><br><div class="alert alert-primary" role="alert">
                  Berhasil Menghapus Data Mahasiswa </div>';
                }
                elseif ($_GET['pesan'] == "gagalhapus") {
                  echo'<br><br><div class="alert alert-danger" role="alert">
                  Gagal Menghapus Data Mahasiswa </div>';
                }
              }
          ?>
          
          <h2 style="margin: 30px 0 30px 0;">Data Mahasiswa</h2>

          <form action="readMahasiswa.php" method="GET">
            <div class="form-group">
              <label>Cari: (berdasarkan NPM dan Nama Mahasiswa)</label>
              <input type="text" class="form-control" name="cari" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" value="Cari">Cari</button>
          </form>

          <div class="table-responsive" style="margin: 30px 0 30px 0;">
            <table class="table table-striped table-sm" style="text-align: center">
              <thead>
                <tr>
                  <th>NPM</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Jurusan</th>
                  <th>Nomor Telepon</th>
                  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if (isset($_GET['cari'])) {
                    $cari = $_GET['cari'];
                    $query = "SELECT * FROM mahasiswa WHERE npm like '%".$cari."%' or namaMahasiswa like '%".$cari."%'";
                  } else {
                    $query = "SELECT * FROM mahasiswa";
                  }
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                      <td><?php echo $data['npm'];  ?></td>
                      <td><?php echo $data['namaMahasiswa'];  ?></td>
                      <td><?php echo $data['jenisKelamin'];  ?></td>
                      <td><?php echo $data['jurusan'];  ?></td>
                      <td><?php echo $data['noTelepon'];  ?></td>
                      <td><?php echo $data['alamat'];  ?></td>
                      <td>
                      <a href="<?php echo "updateMahasiswa.php?npm=".$data['npm']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteMahasiswa.php?npm=".$data['npm']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
  </body>
</html>
