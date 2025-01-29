<?php


include "../../class/class.php";
$db = new database();
$kasu = new kasu();
$crud = new CRUD();

$date = date('Y-m-d');


switch ($_GET['act']) {
    case 'input':

        $arrayData = array(
                          'naran_kriteiro' => $_POST['naran_kriteiro'],
                          'deskrisaun_krt' => $_POST['deskrisaun_krt'],
                          'id_kriteiro' => $_POST['id_kriteiro'],
                          'karakter_kriteiro' => $_POST['karakter_kriteiro'],
                          'id_valor_prefe' => $_POST['id_valor_prefe']

            );

        $data = $crud->insert_data('t_registu_krt', $arrayData);

        if($data) {
            echo "<script>alert('Aumeta dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: populasaun.html');
        }


        break;
    case 'update':
        $arrayData = array(
                    "naran_kriteiro='" . $_POST['naran_kriteiro'] . "'",
                    "deskrisaun_krt='" . $_POST['deskrisaun_krt'] . "'",
                    "id_kriteiro='" . $_POST['id_kriteiro'] . "'",
                    "karakter_kriteiro='" . $_POST['karakter_kriteiro'] . "'",
                    "id_valor_prefe='" . $_POST['id_valor_prefe'] . "'",
);

        $data = $crud->update_data('t_registu_krt', $arrayData, 'id_reagis', $_GET['id']);

        if($data) {
            echo "<script>alert('Hadia dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: ../../kiteiro.html');
        }

        break;

    case 'delete':

        $data = $crud->delete_data('t_registu_krt', 'id_reagis', $_GET['id']);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";

        }
        break;
    case 'yes':

        $id = $_GET['id'];
        $data = $kasu->update_all($id);
        if(!$data) {
            // echo "<script>alert('Estadu Update ho sucessu...!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";

        }


        break;
}
