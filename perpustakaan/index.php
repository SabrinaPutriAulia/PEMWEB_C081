<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>PERPUSTAKAAN</title>
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
            <ul class="nav flex-column" style="margin-top: 15px;">
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
    <div class="card">
				<div class="card-body">
          <span><h3 style="margin: 10px 0 20px 0; ">Perpustakaan UPN Veteran Jawa Timur</h3></span>
          <span><font size='3'>Perpustakaan UPN "Veteran" Jatim mempunyai peran sebagai Pusat layanan Informasi dan sarana pendukung kegiatan Tri Darma Perguruan Tinggi yaitu Pendidikan,
            Penelitian dan Pengabdian Pada Masyarakat serta tempat pengembangan Ilmu Pengetahuan dan Teknologi . Salah satu perannya sebagai Pusat Layanan Informasi adalah
            memenuhi kebutuhan informasi civitas akademika UPN "Veteran" Jatim dalam proses belajar mengajar dan penelitian.</font></span>
        </div>
		</div>
    </main>


  </body>
</html>
