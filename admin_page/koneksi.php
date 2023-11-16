<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'cafe_twins';

$koneksi = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Cek koneksi databsae
if (mysqli_connect_errno()) {
    echo "Gagal menghubungkan ke Database :" . mysqli_connect_error();
}