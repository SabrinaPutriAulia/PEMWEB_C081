<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>GAJI DRIVER</title>
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
        <div id="driver">
        <h2 style="margin: 30px 0 30px 0; ">Gaji driver</h2>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
        <form method="post" action="">
        <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="id driver" name="id_driver" required="required">
        </div>

        <div class="form-group">
        <label for="bulan">Pilih Bulan:</label> <br>
        <select name="bulan" class="form-control" id="bulan">
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Hitung">
      </form>
          <?php 

          if (isset($_POST['submit'])) {
            $id_driver = $_POST['id_driver'];
            $bulan = $_POST['bulan'];
            $query = "SELECT * FROM trans_upn WHERE id_driver = $id_driver AND MONTH(tanggal) = $bulan";
            $result = mysqli_query(connection(),$query);

            $total_gaji_driver = 0;

            while ($row = mysqli_fetch_array($result)) {
              $id_driver = $row['id_driver'];
              $jumlah_km = $row['jumlah_km'];

              $gaji_driver = $jumlah_km * 3000;

              $total_gaji_driver += $gaji_driver;
            }
            echo"<br><br><br><br>";
            echo "<h6 style='margin: 30px 0 15px 0; '>Pendapatan driver dengan ID $id_driver pada bulan " . date("F", mktime(0, 0, 0, $bulan, 10)) . " sebesar: </h6>";
            echo "<div class ='form-control'><b>Rp " . number_format($total_gaji_driver, 0, ',', '.') . "</b></div>";
          }

          ?>
        </main>
      </div>
    </div>
  </body>
</html>
