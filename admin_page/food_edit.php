<?php
require_once "koneksi.php";

// General Var
$name = '';
$price = '';
$qty = '';
// Inisiasi Variabel Untuk Kebutuhan Gambar
$img = '';
$size = 0;
$rand = rand();
$extension = array('png', 'jgp', 'jpeg');
// Notifikasi
$error = '';
$success = '';

// == EDIT DATA == //

if (isset($_GET['op'])) { // Digunakan untuk mengambil operator
    $op = $_GET['op'];
} else {
    $op = '';
}

if ($op == 'edit') { 
    $id = $_GET['id'];
    $sql = "SELECT * FROM foods WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);

    // Use $_POST to get form data
    $name = isset($_POST['name']) ? $_POST['name'] : $data['name'];
    $price = isset($_POST['price']) ? $_POST['price'] : $data['price'];
    $qty = isset($_POST['qty']) ? $_POST['qty'] : $data['qty'];
    
    // Inisiasi khusus untuk gambar
    $img = isset($_FILES['img']['name']) ? $_FILES['img']['name'] : '';
    $file_tmp = isset($_FILES['img']['tmp_name']) ? $_FILES['img']['tmp_name'] : '';
    $ext = pathinfo($img, PATHINFO_EXTENSION);

    if ($img != '') {
        $xx = 'assets/img/' . $rand . '_' . $img;
        move_uploaded_file($file_tmp, $xx);

        $sql1 = "UPDATE foods SET  name = '$name', price = '$price', qty = '$qty', img = '$xx' WHERE id = '$id'";
        $query1 = mysqli_query($koneksi, $sql1);

        if ($query1) {
            $success = "Berhasil Update Data";
        } else {
            $error = "Gagal Update Data";
        }
    } elseif (!in_array($ext, $extension)) {
        $error = "File Gambar Tidak Sesuai";
    } else {
        $error = "Silahkan Lengkapi Data";
    }
}

?>


<div class="pagetitle">
    <h1>Replace</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Data</li>
            <li class="breadcrumb-item active">Foods</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Foods</h5>

                    <!-- NOTIFICATION -->
                    <?php
                    // Digunakan untuk mengambil variabel eror dan sukses
                    if ($error) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    <?php } elseif ($success) { ?>
                        <div class="alert alert-success" role="alert">
                            <?= $success ?>
                        </div>
                    <?php } ?>
                    <!-- END NOTIFICATION -->

                    <!-- == == == EDIT DATA FORM == == == -->

                    <!-- EDIT DATA -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input id="name" name="name" type="text" class="form-control" value="<?= $data['name'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input id="price" name="price" type="number" class="form-control" value="<?= $data['price']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input id="qty" name="qty" type="number" class="form-control" value="<?= $data['qty'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10 d-inline">
                                <input id="img" name="img" class="form-control mb-3" type="file" id="formFile">
                                <!-- Highlight Gambar -->
                                <img src="<?= $data['img'] ?>" class="img" style="width:200px" alt="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Action</label>
                            <div class="col-auto d-inline">
                                <button type="submit" name="save" class="btn btn-md btn-primary">Save</button>
                                <a href="index.php?page=foods" class="btn btn-md btn-danger">Go Back</a>
                            </div>
                        </div>
                    </form><!-- End EDIT DATA -->

                </div>

            </div>
        </div>

    </div>
    </div>
</section>