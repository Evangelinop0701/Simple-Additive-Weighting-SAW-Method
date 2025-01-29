<?php


include "../../class/class.php";
$db = new database();
$crud = new CRUD();

switch ($_GET['act']) {
    case 'input':

        $arrayData = array(
                          'naran_alt' => $_POST['naran_alt'],
                          'id_pessoa' => $_POST['id_pessoa'],


            );

        $data = $crud->insert_data('t_alternativu', $arrayData);

        if($data) {
            echo "<script>alert('Aumeta dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../alternativu.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: populasaun.html');
        }


        break;
    case 'update':
        $arrayData = array(
                    "naran_alt='" . $_POST['naran_alt'] . "'",
                    "id_pessoa='" . $_POST['id_pessoa'] . "'",
);

        $data = $crud->update_data('t_alternativu', $arrayData, 'id_alt', $_GET['id']);

        if($data) {
            echo "<script>alert('Hadia dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../alternativu.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: ../../alternativu.html');
        }

        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_alternativu', 'id_alt', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../alternativu.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../alternativu.html'</script>";

        }
        break;
    case 'input_dt':

        $arrayData = array(
                                  'id_alt' => $_POST['id_alt'],
                                  'id_regis' => $_POST['id_regis'],
                                  'valors' => $_POST['valors'],


                    );

        $data = $crud->insert_data('t_detalho_krt', $arrayData);

        if($data) {
            echo "<script>alert('Aumeta dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../detallo-krt-".$_GET['id']."-knadidatu-".$_GET['id_pessoa'].".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../detallo-krt-".$_GET['id']."-knadidatu-".$_GET['id_pessoa'].".html'</script>";

        }

        break;
    case 'update_dt':

        $arrayData = array(
                                          "id_alt='" . $_POST['id_alt'] . "'",
                                          "id_regis='" . $_POST['id_regis'] . "'",
                                          "valors='" . $_POST['valors'] . "'",

        );

        $data = $crud->update_data('t_detalho_krt', $arrayData, 'id_detalho', $_GET['id']);

        if($data) {
            echo "<script>alert('Hadia dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../detallo-krt-".$_POST['id_alt']."-knadidatu-".$_GET['id_pessoa'].".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../detallo-krt-".$_GET['id']."-knadidatu-".$_GET['id_pessoa'].".html'</script>";

        }

        break;
    case 'delete_dt':

        $id = $_GET['id_dt'];
        $data = $crud->delete_data('t_detalho_krt', 'id_detalho', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../detallo-krt-".$_GET['id_alt']."-knadidatu-".$_GET['id_pessoa'].".html'</script>";

        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../alternativu.html'</script>";

        }

        break;
}