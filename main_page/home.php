<?php require_once 'koneksi.php'; ?>

<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="main_page/img/carousel-3.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 text-start">
                                <p class="fs-4 text-white animated slideInRight">Welcome to
                                    <strong>Cafe Twins</strong>
                                </p>
                                <h4 class="display-1 text-white mb-4 animated slideInRight">Tempat enjoy buat kalian untuk bersantai dan menikmati makanan dan minuman yang Tersedia</h4>
                                <a href="index.php?page=about" class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">More Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="main_page/img/carousel-4.jpeg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-lg-7 text-end">
                                <p class="fs-4 text-white animated slideInLeft">Welcome to <strong>Cafe Twins</strong>
                                </p>
                                <h1 class="display-1 text-white mb-5 animated slideInLeft">Haus dan Lapar?gas kemarih ada makanan dan minuman yang enak dan seger</h1>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft">More
                                    Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
<!-- Foods Start -->
<div class="container-xxl pt-5">
    <div class="container">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium text-primary">Menu Makanan</p>
            <h1 class="display-5 mb-5">Tersedia banyak menu makanan</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php
            require_once 'koneksi.php';
            $sql = "SELECT * FROM foods ORDER BY id DESC";
            $query = mysqli_query($koneksi, $sql);
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <div class="project-item mb-5">
                    <div class="position-relative">
                        <img class="img-fluid" src="admin_page/<?= $data['img'] ?>" alt="">
                        <div class="project-overlay">
                            <a class="btn btn-lg-square btn-light rounded-circle m-1" href="admin_page/<?= $data['img'] ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="d-block h5" href=""><?= $data['name'] ?></h3>
                        <span>Price: <?= $data['price'] ?> | Quantity: <?= $data['qty'] ?></span>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- Foods End -->

<!-- Beverages Start -->
<div class="container-xxl pt-5">
    <div class="container">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium text-primary">Menu Minuman</p>
            <h1 class="display-5 mb-5">Menu Minuman Yang Seger</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php
            require_once 'koneksi.php';
            $sql = "SELECT * FROM beverages ORDER BY id DESC";
            $query = mysqli_query($koneksi, $sql);
            $no = 1;
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <div class="project-item mb-5">
                    <div class="position-relative">
                        <img class="img-fluid" src="admin_page/<?= $data['img'] ?>" alt="">
                        <div class="project-overlay">
                            <a class="btn btn-lg-square btn-light rounded-circle m-1" href="admin_page/<?= $data['img'] ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="d-block h5" href=""><?= $data['name'] ?></h3>
                        <span>Price: <?= $data['price'] ?> | Quantity: <?= $data['qty'] ?></span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Beverages End -->
