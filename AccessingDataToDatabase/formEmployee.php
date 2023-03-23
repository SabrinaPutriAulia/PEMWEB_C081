<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //Employee
    $employeeNumber = $_POST['employeeNumber'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $extension = $_POST['extension'];
    $email = $_POST['email'];
    $officeCode = $_POST['officeCode'];
    $reportsTo = $_POST['reportsTo'];
    $jobTitle = $_POST['jobTitle'];
    
    //query SQL
    $query = "INSERT INTO employees VALUES ('$employeeNumber', '$lastName', '$firstName', '$extension', '$email', '$officeCode', '$reportsTo', '$jobTitle')";
    
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
    <title>FORM EMPLOYEES</title>
    <!-- load css boostrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "index.php"; ?>">All Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "form.php"; ?>">Tambah Data Customers</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Employees berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Employees gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Employees</h2>
          <form action="formEmployee.php" method="POST">
            
            <div class="form-group">
              <label>Employee Number</label>
              <input type="text" class="form-control" placeholder="employee number" name="employeeNumber" required="required">
            </div>

            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" placeholder="last name" name="lastName" required="required">
            </div>

            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" placeholder="first name" name="firstName" required="required">
            </div>

            <div class="form-group">
              <label>Extension</label>
              <input type="text" class="form-control" placeholder="extension" name="extension" required="required">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="email" name="email" required="required">
            </div>

            <div class="form-group">
              <label>Office Code</label>
              <input type="text" class="form-control" placeholder="office code" name="officeCode" required="required">
            </div>

            <div class="form-group">
              <label>Reports To</label>
              <input type="text" class="form-control" placeholder="reports to" name="reportsTo" required="required">
            </div>

            <div class="form-group">
              <label>Job Title</label>
              <input type="text" class="form-control" placeholder="job title" name="jobTitle" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>