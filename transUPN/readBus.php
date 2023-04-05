<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA BUS</title>
    <!-- load css boostrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <style>
      .red{
         background-color: red;
      }
      .green{
        background-color: green;
      }
      .yellow{
        background-color: yellow;
      }
    </style>
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
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Bus berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Bus gagal di-update</div>';
              }

            }
           ?>
          <!--Tabel Bus-->
          <h2 style="margin: 30px 0 30px 0; ">Data Bus</h2>
                <form method = "get">
                    <label for="status">Filter (Berdasarkan Status Bus): </label>
                    <select class="select_filter form-control" id="status_id" name="status" required>
                        <option value="all">-- Pilih status --</option>
                        <option value="1" <?php if (isset($_GET['status']) && $_GET['status'] == 1) {
                            echo " selected";
                        } ?>>
                            Beroperasi / Aktif</option>
                        <option value="2" <?php if (isset($_GET['status']) && $_GET['status'] == 2) {
                            echo " selected";
                        } ?>>
                            Cadangan</option>
                        <option value="0" <?php if (isset($_GET['status']) && $_GET['status'] == 0) {
                            echo " selected";
                        } ?>>
                            Dalam Perbaikan / Rusak</option>
                    </select>
                    <br>
                    <input  type="submit" class="btn btn-primary" value="Filter">
                    </form>

          <div class="table-responsive">
            <br>
            <table class="table table-striped table-sm">
              <thead align="center">
                <tr>
                  <th>ID Bus</th> 
                  <th>Plat</th> 
                  <th>Status</th>
                  <th>Jumlah Kilometer</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    // $query = "SELECT * FROM bus WHERE status = $status";
                    $query = "SELECT bus.id_bus,bus.plat,bus.status,trans_upn.jumlah_km FROM bus JOIN trans_upn ON bus.id_bus = trans_upn.id_trans_upn WHERE status = '$status'";
                } else {
                    // $query = "SELECT * FROM bus";
                    $query = "SELECT bus.id_bus,bus.plat,bus.status,trans_upn.jumlah_km FROM bus JOIN trans_upn ON bus.id_bus = trans_upn.id_trans_upn";
                }
                $result = mysqli_query(connection(), $query);
                ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr align="center" >
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td class="<?php echo $data['status'] == '1' ? 'green' : ($data['status'] == '2' ? 'yellow' : 'red'); ?>"><?php echo $data['status'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td>
                     <a href="<?php echo "updateBus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                     <a href="<?php echo "deleteBus.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
                </tbody>
            </table>
          </div>
        </div>
  </body>
</html>
