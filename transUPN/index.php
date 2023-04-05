<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>MAIN PAGE</title>
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
    <div class="card">
				<div class="card-body">
          <span><h3 style="margin: 10px 0 20px 0; ">Perusahaan Bus Trans UPN</h3></span>
          <span><font size='3'>Bus Trans UPN adalah sebuah perusahaan penyedia layanan transportasi umum. Trans UPN menerapkan sistem bus rapid transit (BRT) pada jaringan antarkota dan/atau kabupaten dalam satu lingkup wilayah aglomerasi perkotaan.</font></span>
        </div>
		</div>
    </main>


  </body>
</html>
