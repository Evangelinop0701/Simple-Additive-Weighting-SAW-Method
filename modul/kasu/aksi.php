<?php


include "../../class/class.php";
$db = new database();
$kasu = new kasu();
$crud = new CRUD();

$date = date('Y-m-d');


switch ($_GET['act']) {
    case 'input':

        $arrayData = array(
                          'naran_kasu' => $_POST['naran_kasu'],
                          'data_registu' => $date,
                          'status' => '',

            );

        $data = $crud->insert_data('t_kasu', $arrayData);

        if($data) {
            echo "<script>alert('Aumeta dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../kasu.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: populasaun.html');
        }


        break;
    case 'update':
        $arrayData = array(
                    "naran_kasu='" . $_POST['naran_kasu'] . "'",
);

        $data = $crud->update_data('t_kasu', $arrayData, 'id_kasu', $_GET['id']);

        if($data) {
            echo "<script>alert('Hadia dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../kasu.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: populasaun.html');
        }

        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_kasu', 'id_kasu', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../kasu.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../kasu.html'</script>";

        }
        break;
    case 'yes':

        $id = $_GET['id'];
        $data = $kasu->update_all($id);
        if(!$data) {
            // echo "<script>alert('Estadu Update ho sucessu...!')</script>";
            echo "<script>window.location='../../kasu.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../kasu.html'</script>";

        }


        break;
}