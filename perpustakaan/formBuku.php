<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $kodeBuku = $_POST['kodeBuku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahunTerbit = $_POST['tahunTerbit'];
    $jumlahHalaman = $_POST['jumlahHalaman'];
    $kategori = $_POST['kategori'];
    $foto_nama = $_FILES['foto']['name'];
    $foto_size = $_FILES['foto']['size'];

    if ($foto_size > 2097152) {
      // Jika File lebih dari 2 MB maka akan gagal mengupload File
      header("location:formBuku.php?pesan=size");
    }else{
      // Mengecek apakah Ada file yang diupload atau tidak
      if ($foto_nama != "") {
    
        // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
        $ekstensi_izin = array('png','jpg','jpeg');
        // Memisahkan nama file dengan Ekstensinya
        $pisahkan_ekstensi = explode('.', $foto_nama); 
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        // Nama file yang berada di dalam direktori temporer server
        $file_tmp = $_FILES['foto']['tmp_name'];   
        // Membuat angka/huruf acak berdasarkan waktu diupload
        $tanggal = md5(date('Y-m-d h:i:s'));
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $foto_nama_new = $tanggal.'-'.$foto_nama; 
    
        // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
        if(in_array($ekstensi, $ekstensi_izin) === true)  {
          // Memindahkan File kedalam Folder "FOTO"
                move_uploaded_file($file_tmp, 'foto/'.$foto_nama_new);
    
                // Query untuk memasukan data kedalam table Buku
                $query = "INSERT INTO buku VALUES ('$kodeBuku', '$judul', '$penulis', '$penerbit', '$tahunTerbit', '$jumlahHalaman', '$kategori', '$foto_nama_new')";
    
                $result = mysqli_query(connection(),$query);
                // Mengecek apakah data gagal diinput atau tidak
                if($result){
                  header("location:formBuku.php?pesan=berhasil");
                } else {
                    header("location:formBuku.php?pesan=gagal");
                }
    
            } else { 
              // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
              header("location:formBuku.php?pesan=ekstensi");        }
    
        }else{
    
          // Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
                $query = "INSERT INTO buku (kodeBuku, judul, penulis, penerbit, tahunTerbit, jumlahHalaman, kategori) VALUES ('$kodeBuku', '$judul', '$penulis', '$penerbit', '$tahunTerbit', '$jumlahHalaman', '$kategori')";
    
                $result = mysqli_query(connection(), $query);

                // Mengecek apakah data gagal diinput atau tidak
                if($result){
                  header("location:formBuku.php?pesan=berhasil");
                } else {
                  header("location:formBuku.php?pesan=gagal");
                }
        }
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>FORM BUKU</title>
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
                  Berhasil Menambahkan Data Buku </div>';
                }
                elseif ($_GET['pesan'] == "gagal") {
                  echo'<br><br><div class="alert alert-danger" role="alert">
                  Gagal Menambahkan Data Buku </div>';
                }
                elseif ($_GET['pesan'] == "ekstensi") {
                  echo'<br><br><div class="alert alert-warning" role="alert">
                  Ekstensi File Harus PNG Dan JPG </div>';
                }
                elseif ($_GET['pesan'] == "size") {
                  echo'<br><br><div class="alert alert-warning" role="alert">
                  Size File Tidak Boleh Lebih Dari 2 MB </div>';
                }
              }
          ?>

          <h2 style="margin: 30px 0 30px 0;">Form Buku</h2>
          <form action="formBuku.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
              <label>Kode Buku</label>
              <input type="text" class="form-control" placeholder="kode" name="kodeBuku" required="required">
            </div>

            <div class="form-group">
              <label>Judul Buku</label>
              <input type="text" class="form-control" placeholder="judul" name="judul" required="required">
            </div>

            <div class="form-group">
              <label>Penulis Buku</label>
              <input type="text" class="form-control" placeholder="penulis" name="penulis" required="required">
            </div>

            <div class="form-group">
              <label>Penerbit Buku</label>
              <input type="text" class="form-control" placeholder="penerbit" name="penerbit" required="required">
            </div>

            <div class="form-group">
              <label>Tahun Terbit Buku</label>
              <input type="text" class="form-control" placeholder="tahun terbit" name="tahunTerbit" required="required">
            </div>

            <div class="form-group">
              <label>Jumlah Halaman Buku</label>
              <input type="text" class="form-control" placeholder="jumlah halaman" name="jumlahHalaman" required="required">
            </div>

            <div class="form-group">
              <label>Kategori Buku</label>
              <input type="text" class="form-control" placeholder="kategori" name="kategori" required="required">
            </div>

            <div class="form-group">
              <label>Sampul Buku</label>
              <input type="file" class="form-control" name="foto">
            </div>
            
            <button type="submit" class="btn btn-primary" style="margin-bottom: 25px;">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>