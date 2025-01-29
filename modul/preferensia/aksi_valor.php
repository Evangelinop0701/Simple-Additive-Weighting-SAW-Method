<?php


include "../../class/class.php";
$db = new database();
$crud = new CRUD();

$date = date('Y-m-d');


switch ($_GET['act']) {
    case 'input':

        $arrayData = array(
                          'valor' => $_POST['valor'],
                          'id_preferensia' => $_POST['id_preferensia'],
            );

        $data = $crud->insert_data('t_valor_pre', $arrayData);

        if($data) {
            echo "<script>alert('Aumeta dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../preferensia.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: preferensia.html');
        }


        break;
    case 'update':
        $arrayData = array(
                    "valor='" . $_POST['valor'] . "'",
);

        $data = $crud->update_data('t_valor_pre', $arrayData, 'id_valor', $_GET['id_valor']);

        if($data) {
            echo "<script>alert('Hadia dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../preferensia.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: preferensia.html');
        }

        break;

    case 'delete':
        $id = $_GET['id_valor'];
        $data = $crud->delete_data('t_valor_pre', 'id_valor', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../preferensia.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../preferensia.html'</script>";

        }
        break;

}
