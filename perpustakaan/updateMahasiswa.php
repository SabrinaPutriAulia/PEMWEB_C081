<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['npm'])) {
          //query SQL
          $npm_upd = $_GET['npm'];
          $query = "SELECT * FROM mahasiswa WHERE npm = '$npm_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $npm = $_POST['npm'];
      $namaMahasiswa = $_POST['namaMahasiswa'];
      $jenisKelamin = $_POST['jenisKelamin'];
      $jurusan = $_POST['jurusan'];
      $noTelepon = $_POST['noTelepon'];
      $alamat = $_POST['alamat'];

      //query SQL
      $sql = "UPDATE mahasiswa SET namaMahasiswa='$namaMahasiswa', jenisKelamin='$jenisKelamin', jurusan='$jurusan',
      noTelepon='$noTelepon', alamat='$alamat' WHERE npm='$npm'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        header("location:readMahasiswa.php?pesan=berhasil");
      }else{
        header("location:readMahasiswa.php?pesan=gagal");
      }
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>UPDATE MAHASISWA</title>
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
          <h2 style="margin: 30px 0 30px 0;">Update Data Mahasiswa</h2>
          <form action="updateMahasiswa.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>NPM Mahasiswa</label>
              <input type="text" class="form-control" placeholder="npm" name="npm" value="<?php echo $data['npm'];  ?>" required="required" readonly>
            </div>

            <div class="form-group">
              <label>Nama Mahasiswa</label>
              <input type="text" class="form-control" placeholder="nama" name="namaMahasiswa" value="<?php echo $data['namaMahasiswa'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Jenis Kelamin Mahasiswa</label>
              <input type="text" class="form-control" placeholder="jenis kelamin" name="jenisKelamin" value="<?php echo $data['jenisKelamin'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Jurusan Mahasiswa</label>
              <input type="text" class="form-control" placeholder="jurusan" name="jurusan" value="<?php echo $data['jurusan'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Nomor Telepon Mahasiswa</label>
              <input type="text" class="form-control" placeholder="nomor telepon" name="noTelepon" value="<?php echo $data['noTelepon'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Alamat Mahasiswa</label>
              <input type="text" class="form-control" placeholder="alamat" name="alamat" value="<?php echo $data['alamat'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>