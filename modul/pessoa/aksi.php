<?php


include "../../class/class.php";
$db = new database();
$pessoa = new pessoa();
$crud = new CRUD();


switch ($_GET['act']) {
    case 'input':

        $arrayData = array(
                          'naran' => $_POST['naran'],
                          'sexu' => $_POST['sexu'],
                          'data_moris' => $_POST['data_moris'],
                          'id_kasu' => $_POST['id_kasu'],
                          'abilidade' => $_POST['abilidade'],
                          'nivel_edu' => $_POST['nivel_edu']
            );

        $data = $crud->insert_data('t_pessoa', $arrayData);
        $id = $_GET['id'];
        if($data) {
            echo "<script>alert('Aumeta dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../dadus-pessoa-".$id.".html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: populasaun.html');
        }


        break;
    case 'update':

        $id = $_GET['id'];

        $arrayData = array(
                    "naran='" . $_POST['naran'] . "'",
                    "sexu='" . $_POST['sexu'] . "'",
                    "id_kasu='" . $id . "'",
                    "data_moris='" . $_POST['data_moris'] . "'",
                    "abilidade='" . $_POST['abilidade'] . "'",
                    "nivel_edu='" . $_POST['nivel_edu'] . "'"
);

        $data = $crud->update_data('t_pessoa', $arrayData, 'id_pessoa', $_GET['id_pessoa']);

        if($data) {
            echo "<script>alert('Hadia dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../dadus-pessoa-".$id.".html'</script>";

        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: populasaun.html');
        }

        break;

    case 'delete':
        $id = $_GET['id_pessoa'];
        $data = $crud->delete_data('t_pessoa', 'id_pessoa', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";

            echo "<script>window.location='../../dadus-pessoa-".$_GET['id_kasu'].".html'</script>";
            ;
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../kasu.html'</script>";

        }
        break;
}
