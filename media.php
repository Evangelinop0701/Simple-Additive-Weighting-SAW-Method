<?php
error_reporting(0);
include "class/class.php";
include "class/adisaun.php";
$db = new database();
$result = new rezultado();
$kasu = new kasu();
$pesoa = new pessoa();
$kriteria = new Kriteria();
$regis = new registu_krt();
$valor_pre = new valor_preferensia();
$alt = new alternativu();
$dt_alt = new detalho_alt();
$preferensia = new preferensia();
$rank = new Ranking();
$sub = new subkriteria();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SAD</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href=".assets/css/styles.css" rel="stylesheet" />
    <link href=".assets/css/local.css" rel="stylesheet" />
    <link href=".assets/icon/all.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <?php include "nav.php"; ?>
    <!-- Page content-->

    <?php include "conten.php"; ?>

    <footer class="py-5 bg-dark" style="#background-color:gray;">
        <div class="container px-4">
            <p class="m-0 text-center text-white">Copyright &copy; ESTUDANTE DEI <?= date('Y'); ?></p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src=".assets/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src=".assets/js/scripts.js"></script>
    <script src=".assets/icon/all.js"></script>
</body>

</html>