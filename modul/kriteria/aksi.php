<?php


include "../../class/class.php";
$db = new database();
$krt = new Kriteria();
$crud = new CRUD();


switch ($_GET['act']) {
    case 'input':

        $arrayData = array(
                          'kriteiro' => $_POST['kriteiro'],
                          'status' => '',

            );

        $data = $crud->insert_data('t_kriteiro', $arrayData);

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
                    "kriteiro='" . $_POST['kriteiro'] . "'",
);

        $data = $crud->update_data('t_kriteiro', $arrayData, 'id_kriteiro', $_GET['id']);

        if($data) {
            echo "<script>alert('Hadia dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: ../../kriteiro.html.html');
        }

        break;

    case 'delete':
        $id = $_GET['id'];
        $data = $crud->delete_data('t_kriteiro', 'id_kriteiro', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";

        }
        break;

    case 'update_all':

        $up_all = $krt->update_all_krt($_GET['id']);

        if(!$up_all) {
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";

        }

        break;
    case 'insert_sub':

        $arrayData = array(
                                  'subkriteria' => $_POST['subkriteria'],
                                  'valor_sub_krt' => $_POST['valor_sub_krt'],
                                  'id_registu_krt' => $_POST['id_registu_krt'],


                    );

        $data = $crud->insert_data('t_subkriteria', $arrayData);

        if($data) {
            echo "<script>alert('Aumeta dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: populasaun.html');
        }


        break;
    case 'update_sub':

        $arrayData = array(
                            "subkriteria='" . $_POST['subkriteria'] . "'",
                            "valor_sub_krt='" . $_POST['valor_sub_krt'] . "'",
                            "id_registu_krt='" . $_POST['id_registu_krt'] . "'",
        );

        $data = $crud->update_data('t_subkriteria', $arrayData, 'id_sub', $_GET['id_sub']);

        if($data) {
            echo "<script>alert('Hadia dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: ../../kriteiro.html.html');
        }

        break;

    case 'delete_sub':

        $id = $_GET['id_sub'];

        $data = $crud->delete_data('t_subkriteria', 'id_sub', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../kriteiro.html'</script>";

        }

        break;


}
