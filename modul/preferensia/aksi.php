<?php


include "../../class/class.php";
$db = new database();
$crud = new CRUD();
$pre = new preferensia();

$date = date('Y-m-d');


switch ($_GET['act']) {
    case 'input':

        $arrayData = array(
                          'preferensia' => $_POST['preferensia'],
                          'status' => '',
                          'data' => $date,

            );

        $data = $crud->insert_data('t_preferensia', $arrayData);

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
                    "preferensia='" . $_POST['preferensia'] . "'",
);

        $data = $crud->update_data('t_preferensia', $arrayData, 'id_preferensia', $_GET['id_pre']);

        if($data) {
            echo "<script>alert('Hadia dadus ho sucessu...!')</script>";
            echo "<script>window.location='../../preferensia.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            header('location: preferensia.html');
        }

        break;

    case 'delete':
        $id = $_GET['id_pre'];
        $data = $crud->delete_data('t_preferensia', 'id_preferensia', $id);
        if($data) {
            echo "<script>alert('Hamos dados ho sucessu...!')</script>";
            echo "<script>window.location='../../preferensia.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../preferensia.html'</script>";

        }
        break;
    case 'update_all':

        $id = $_GET['id_pre'];
        $data = $pre->update_status($id);
        if(!$data) {
            // echo "<script>alert('Estadu Update ho sucessu...!')</script>";
            echo "<script>window.location='../../preferensia.html'</script>";
        } else {
            echo "<script>alert('ERROR!')</script>";
            echo "<script>window.location='../../preferensia.html'</script>";

        }


        break;
}
