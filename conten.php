<?php

if (!isset($_GET['modul'])) {
    include "home.php";
} elseif ($_GET['modul'] == "rezultadu") {
    include "modul/rezultado/rezultadu.php";
} elseif ($_GET['modul'] == "kasu") {
    include "modul/kasu/kasu.php";
} elseif ($_GET['modul'] == "pessoa") {
    include "modul/pessoa/pessoa.php";
} elseif ($_GET['modul'] == "kriteiro") {
    include "modul/kriteria/kriteria.php";
} elseif($_GET['modul'] == "alternativu") {
    include "modul/alternativu/alternativu.php";
} elseif($_GET['modul'] == "preferensia") {
    include "modul/preferensia/preferensia.php";
}