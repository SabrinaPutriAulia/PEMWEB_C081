<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idBus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];
    
    //query SQL
    $query = "INSERT INTO bus VALUES ('$idBus', '$plat', '$status')";
    
    //eksekusi query
    $result = mysqli_query(connection(),$query);
    if ($result) {
        $status = 'ok';
    }
    else{
        $status = 'err';
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>FORM BUS</title>
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
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Bus berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Bus gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Bus</h2>
          <form action="formBus.php" method="POST">
            
            <div class="form-group">
              <label>ID Bus</label>
              <input type="text" class="form-control" placeholder="id bus" name="id_bus" required="required">
            </div>

            <div class="form-group">
              <label>Plat</label>
              <input type="text" class="form-control" placeholder="plat" name="plat" required="required">
            </div>

            <div class="form-group">
              <label>Status</label>
              <input type="text" class="form-control" placeholder="status" name="status" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>