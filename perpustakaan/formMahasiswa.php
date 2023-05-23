<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $npm = $_POST['npm'];
    $namaMahasiswa = $_POST['namaMahasiswa'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $jurusan = $_POST['jurusan'];
    $noTelepon = $_POST['noTelepon'];
    $alamat = $_POST['alamat'];
    
    //query SQL
    $query = "INSERT INTO mahasiswa VALUES ('$npm', '$namaMahasiswa', '$jenisKelamin', '$jurusan', '$noTelepon', '$alamat')";
    
    //eksekusi query
    $result = mysqli_query(connection(),$query);
    if($result){
      header("location:formMahasiswa.php?pesan=berhasil");
    } else {
      header("location:formMahasiswa.php?pesan=gagal");
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>FORM MAHASISWA</title>
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
          
          <?php

              if(isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "berhasil") {
                  echo'<br><br><div class="alert alert-primary" role="alert">
                  Berhasil Menambahkan Data Mahasiswa </div>';
                }
                elseif ($_GET['pesan'] == "gagal") {
                  echo'<br><br><div class="alert alert-danger" role="alert">
                  Gagal Menambahkan Data Mahasiswa </div>';
                }
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Mahasiswa</h2>
          <form action="formMahasiswa.php" method="POST">
            
            <div class="form-group">
              <label>NPM Mahasiswa</label>
              <input type="text" class="form-control" placeholder="npm" name="npm" required="required">
            </div>

            <div class="form-group">
              <label>Nama Mahasiswa</label>
              <input type="text" class="form-control" placeholder="nama" name="namaMahasiswa" required="required">
            </div>

            <div class="form-group">
              <label>Jenis Kelamin Mahasiswa</label>
              <select class="custom-select" name="jenisKelamin" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label>Jurusan Mahasiswa</label>
              <input type="text" class="form-control" placeholder="jurusan" name="jurusan" required="required">
            </div>

            <div class="form-group">
              <label>Nomor Telepon Mahasiswa</label>
              <input type="text" class="form-control" placeholder="no telepon" name="noTelepon" required="required">
            </div>

            <div class="form-group">
              <label>Alamat Mahasiswa</label>
              <input type="text" class="form-control" placeholder="alamat" name="alamat" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary" style="margin-bottom: 25px;">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>