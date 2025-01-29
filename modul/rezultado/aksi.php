<?php



include "../../class/class.php";
$db = new database();
$rank = new Ranking();

if ($_GET['act'] == "delete_all") {
    $rank->delete_all();
    header('location: ../../rezultadu.html');
}