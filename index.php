<?php
// include file header.php
require_once 'main_page/header.php';
?>


<main id="main">
<!-- //Bagian ini menangani pemilihan dan inklusi dinamis dari halaman berdasarkan nilai parameter page yang mungkin ada dalam URL. Jika page diatur, maka file dengan nama yang sesuai akan dimuat. Jika tidak, atau jika nilai page kosong, halaman default (home.php) akan dimuat. -->
    <?php
    if (isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
        if (!empty($page)) {
            require_once 'main_page' . '/' . $page . '.php';
        } else {
            require_once 'main_page/home.php';
        }
    } else {
        $page = 'home';
        require_once 'main_page/home.php';
    }
    ?>

</main>

<?php
// include file header.php
require_once 'main_page/footer.php';
?>