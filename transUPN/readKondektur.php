<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA KONDEKTUR</title>
    <!-- load css boostrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>

  <body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Bus Trans UPN</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:10px;">
               <li class="nav-item">
               <a class="nav-link active" href="<?php echo "index.php"; ?>">Halaman Utama</a>
               <!-- Data Perusahaan -->
                <ul class="nav flex-column">
                <a class="nav-link">Data Perusahaan</a>
                  <li class="nav-item"><a class="nav-link active" style="margin-left: 20px" href="<?php echo "readBus.php"; ?>">- Bus</a></li>
                  <li class="nav-item"><a class="nav-link active" style="margin-left: 20px" href="<?php echo "readDriver.php"; ?>">- Driver</a></li>
                  <li class="nav-item"><a class="nav-link active" style="margin-left: 20px" href="<?php echo "readKondektur.php"; ?>">- Kondektur</a></li>
                </ul>
                <!-- Tambah Data Perusahaan -->
                <ul class="nav flex-column">
                <a class="nav-link">Input Data Perusahaan</a>
                  <li class="nav-item"><a class="nav-link active" style="margin-left: 20px" href="<?php echo "formBus.php"; ?>">- Bus</a></li>
                  <li class="nav-item"><a class="nav-link active" style="margin-left: 20px" href="<?php echo "formDriver.php"; ?>">- Driver</a></li>
                  <li class="nav-item"><a class="nav-link active" style="margin-left: 20px" href="<?php echo "formKondektur.php"; ?>">- Kondektur</a></li>
                </ul>
                <!-- Hitung Gaji Pegawai -->
                <ul class="nav flex-column">
                <a class="nav-link">Gaji Pegawai</a>
                  <li class="nav-item"><a class="nav-link active" style="margin-left: 20px" href="<?php echo "gajiDriver.php"; ?>">- Driver</a></li>
                  <li class="nav-item"><a class="nav-link active" style="margin-left: 20px" href="<?php echo "gajiKondektur.php"; ?>">- Kondektur</a></li>
                </ul>
               </li>
             </ul>
          </div>
        </nav>
      </div>
    </div>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Kondektur berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Kondektur gagal di-update</div>';
              }

            }
           ?>
          <!--Tabel Kondektur-->
          <div id="Customers">
          <h2 style="margin: 30px 0 30px 0;">Data Kondektur</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>ID Kondektur</th>
                  <th>Nama Kondektur</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM kondektur";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                      <td><?php echo $data['id_kondektur'];  ?></td>
                      <td><?php echo $data['nama'];  ?></td>
                      <td>
                      <a href="<?php echo "updateKondektur.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "deleteKondektur.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
  </body>
</html>
