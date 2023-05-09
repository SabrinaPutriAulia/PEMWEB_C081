<?php
    require_once "Product.php";
    require_once "CDMusic.php";
    require_once "CDCabinet.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>printProduct</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                <div class="sidebar-sticky">
                </div>
            </nav>
        </div>
    </div>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="table-responsive">
        <h2 style="margin: 30px 0 30px 0;">Product</h2>

        <form method="post" action="">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama Produk" name="name" required="required">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" class="form-control" placeholder="Harga Produk" name="price" required="required">
            </div>

            <div class="form-group">
                <label>Diskon</label>
                <input type="text" class="form-control" placeholder="Diskon Produk" name="discount" required="required">
            </div>

            <div class="form-group">
                <label>Artis</label>
                <input type="text" class="form-control" placeholder="Artis CD Musik" name="artist" required="required">
            </div>

            <div class="form-group">
                <label>Genre</label>
                <input type="text" class="form-control" placeholder="Genre CD Musik" name="genre" required="required">
            </div>

            <div class="form-group">
                <label>Kapasitas</label>
                <input type="text" class="form-control" placeholder="Kapasitas CD Kabinet" name="capacity" required="required">
            </div>

            <div class="form-group">
                <label>Model</label>
                <input type="text" class="form-control" placeholder="Model CD Kabinet" name="model" required="required">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit" style="margin-bottom: 20px">
        </form>

        <?php
            if (isset($_POST['submit'])) {
                echo '<br><table class="table table-striped table-sm" style="margin: 10px 0 30px 0;">';
                echo '<thead align="center">';
                echo '<tr>';
                echo '<th colspan="3" style="background-color: #343A40; color: white;">PRODUCT</th>';
                echo '<th colspan="5" style="background-color: #8B8B8B; color: white;">CD MUSIC</th>';
                echo '<th colspan="5" style="background-color: #343A40; color: white;"">CD CABINET</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>Nama</th>';
                echo '<th>Harga</th>';
                echo '<th>Diskon</th>';
                echo '<th>Nama</th>';
                echo '<th>Artis</th>';
                echo '<th>Genre</th>';
                echo '<th>Harga</th>';
                echo '<th>Diskon</th>';
                echo '<th>Nama</th>';
                echo '<th>Kapasitas</th>';
                echo '<th>Model</th>';
                echo '<th>Harga</th>';
                echo '<th>Diskon</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody align="center">';
                $item = new Product();
                $item->setName($name = $_POST['name']);
                $item->setPrice($price = $_POST['price']);
                $item->setDiscount($discount = $_POST['discount']);
                echo "<td>".$item -> getName()."</td>";
                echo "<td>Rp".$item -> getPrice()."</td>";
                echo "<td>Rp".$item -> getDiscount()."</td>";
                $item = new CDMusic();
                $item->setArtist($artist = $_POST['artist']);
                $item->setGenre($genre = $_POST['genre']);
                echo "<td>".$item -> getNameCDMusic()."</td>";
                echo "<td>".$item -> getArtist()."</td>";
                echo "<td>".$item -> getGenre()."</td>";
                echo "<td>Rp".$item -> getPriceCDMusic()."</td>";
                echo "<td>Rp".$item -> getDiscountCDMusic()."</td>";
                $item = new CDCabinet();
                $item->setCapacity($capacity = $_POST['capacity']);
                $item->setModel($model = $_POST['model']);
                echo "<td>".$item -> getNameCDCabinet()."</td>";
                echo "<td>".$item -> getCapacity()."</td>";
                echo "<td>".$item -> getModel()."</td>";
                echo "<td>Rp".$item -> getPriceCDCabinet()."</td>";
                echo "<td>Rp".$item -> getDiscountCDCabinet()."</td>";
                echo '';
                echo '</tbody>';
                echo '</table>';
            }
        ?>
    </div>
    </main>
</body>
</html>