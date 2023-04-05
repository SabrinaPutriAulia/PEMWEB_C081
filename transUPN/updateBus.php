<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $idBus_upd = $_GET['id_bus'];
          $query = "SELECT * FROM bus WHERE id_bus = '$idBus_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $idBus = $_POST['id_bus'];
      $plat = $_POST['plat'];
      $status = $_POST['status'];

      //query SQL

      $sql1 = "UPDATE bus SET plat='$plat', status='$status' WHERE id_bus='$idBus'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql1);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //query SQL

      $sql2 = "UPDATE trans_upn SET jumlah_km='$jumlahKM' WHERE id_bus='$idBus'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql2);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: readBus.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>UPDATE BUS</title>
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
          <h2 style="margin: 30px 0 30px 0;">Update Data Bus</h2>
          <form action="updateBus.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>ID Bus</label>
              <input type="text" class="form-control" placeholder="id bus" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required" readonly>
            </div>

            <div class="form-group">
              <label>Plat</label>
              <input type="text" class="form-control" placeholder="plat" name="plat" value="<?php echo $data['plat'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Status</label>
              <input type="text" class="form-control" placeholder="status" name="status" value="<?php echo $data['status'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>