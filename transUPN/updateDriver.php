<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_driver'])) {
          //query SQL
          $idDriver_upd = $_GET['id_driver'];
          $query = "SELECT * FROM driver WHERE id_driver = '$idDriver_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $idDriver = $_POST['id_driver'];
      $nama = $_POST['nama'];
      $noSim = $_POST['no_sim'];
      $alamat = $_POST['alamat'];

      //query SQL
      $sql = "UPDATE driver SET nama='$nama', no_sim='$noSim', alamat='$alamat' WHERE id_driver='$idDriver'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: readDriver.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>UPDATE DRIVER</title>
    <!-- load css boostrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Bus Trans UPN</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
               <li class="nav-item">
                <a class="nav-link active" href="<?php echo "index.php"; ?>">Halaman Utama</a>
                <ul class="nav flex-column">
                <a class="nav-link">Data Perusahaan</a>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px" href="<?php echo "readBus.php"; ?>">Bus</a></li>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px" href="<?php echo "readDriver.php"; ?>"">Driver</a></li>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px" href="<?php echo "readKondektur.php"; ?>"">Kondektur</a></li>
                </ul>
               </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2 style="margin: 30px 0 30px 0;">Update Data Driver</h2>
          <form action="updateDriver.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="id driver" name="id_driver" value="<?php echo $data['id_driver'];  ?>" required="required" readonly>
            </div>

            <div class="form-group">
              <label>Nama Driver</label>
              <input type="text" class="form-control" placeholder="nama driver" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>No SIM Driver</label>
              <input type="text" class="form-control" placeholder="no sim driver" name="no_sim" value="<?php echo $data['no_sim'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Alamat Driver</label>
              <input type="text" class="form-control" placeholder="alamat driver" name="alamat" value="<?php echo $data['alamat'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>