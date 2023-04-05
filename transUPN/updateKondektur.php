<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_kondektur'])) {
          //query SQL
          $idKondektur_upd = $_GET['id_kondektur'];
          $query = "SELECT * FROM kondektur WHERE id_kondektur = '$idKondektur_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $idKondektur = $_POST['id_kondektur'];
      $nama = $_POST['nama'];

      //query SQL
      $sql = "UPDATE kondektur SET nama='$nama' WHERE id_kondektur='$idKondektur'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: readKondektur.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>UPDATE KONDEKTUR</title>
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
          <h2 style="margin: 30px 0 30px 0;">Update Data Kondektur</h2>
          <form action="updateKondektur.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>ID Kondektur</label>
              <input type="text" class="form-control" placeholder="id kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur'];  ?>" required="required" readonly>
            </div>

            <div class="form-group">
              <label>Nama Kondektur</label>
              <input type="text" class="form-control" placeholder="nama kondektur" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>