<?php

switch ($_GET['act']) {
    case 'read':?>
<div class="container my-3">
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb rounded-1 px-2 py-1">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Rezultadu</li>
            </ol>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h5>Resultadu Bolseiro</h5>
                    </div>
                </div>

                <?php

                $kas = $result->logika_kasu();
        $kri = $result->logika_kriteria();

        if (empty($kas) and empty($kri)) { ?>
                <div class="container my-5">
                    <div class="alert alert-danger">
                        Resultadu Sedauk iha
                    </div>
                </div>
                <?php } elseif (!empty($kas) and empty($kri)) {?>
                <div class="container my-5">
                    <div class="alert alert-danger">
                        Resultadu Sedauk iha
                    </div>
                </div>
                <?php } elseif (empty($kas) and !empty($kri)) {?>
                <div class="container my-5">
                    <div class="alert alert-danger">
                        Resultadu Sedauk iha
                    </div>
                </div>
                <?php } else { ?>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th colspan="20" class="text-center text-uppercase">Valores Kandidatus no Kriteria</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Naran</th>
                                <?php $head = $result->header_kri();
                    foreach ($head as $row) { ?>
                                <th><?= $row['deskrisaun_krt']; ?></th>
                                <?php } ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                        $no = 1;
                    $alt = $result->alt();

                    foreach ($alt as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran']; ?></td>
                                <?php
                        $data = $result->rezultado($row['id_alt']);

                        // $ipc = $data[0]['valors'];
                        // $valor = $data[1]['valors'];
                        // $rend = $data[2]['valors'];
                        foreach ($data as $key) {
                            ?>
                                <td>

                                    <?php

                                        // if ($valor) {
                                        //     if ($ipc == $key['valors']) {
                                        //         echo $key['valors'];
                                        //     } elseif ($valor == $key['valors']) {
                                        //         echo (int)$key['valors']. " Km";
                                        //     } elseif ($rend == $key['valors']) {
                                        //         echo "$ " .  $key['valors'];
                                        //     } else {
                                        //         echo (int)$key['valors'];
                                        //     }
                                        // }


echo $key['valors'];



                            ?>

                                </td>
                                <?php } ?>
                            </tr>
                            <?php $no++;
                    } ?>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-warning">
                                <th colspan="20" class="text-center text-uppercase">Karakteristika kriteria</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Kriteria</th>
                                <th>Karakteristika</th>
                            </tr>
                        </thead>
                    <tbody>
                            <?php $kar_kri = $result->header_kri();
                    $no = 1;
                    foreach ($kar_kri as $row) { ?>
                            <tr>
                                <td><?= $no;  ?></td>
                                <td><?= $row['deskrisaun_krt'];  ?></td>
                                <td><?= $row['karakter_kriteiro'];  ?></td>
                            </tr>
                            <?php $no++;
                    } ?>
                        </tbody>
                    </table>



                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-success text-white">
                                <th colspan="20" class="text-center text-uppercase">Valores Kandidatus no Kriteria</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Alternativu</th>
                                <?php $head = $result->header_kri();
                    foreach ($head as $row) { ?>
                                <th><?= $row['deskrisaun_krt']; ?></th>
                                <?php } ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                        $no = 1;
                    $alt = $result->alt();

                    foreach ($alt as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran_alt']; ?></td>
                                <?php
                        $data = $result->rezultado($row['id_alt']);

                        $ipc = $data[0]['valors'];
                        $valor = $data[1]['valors'];
                        var_dump($ipc);
                        $rend = $data[2]['valors'];
                        foreach ($data as $key) {
                            $benefit = $result->valores_benefit($key['id_regis']);

                            ?>
                                <td>

                                    <?php

                                        if ($valor) {
                                            if ($ipc == $key['valors']) {
                                                if ($key['karakter_kriteiro'] == "Benefit") {
                                                    $rs = $key['valors'] / $benefit[0]['valor_max'];
                                                    echo number_format($rs, 2);
                                                } else {

                                                    $rs = $benefit[0]['valor_min'] / $key['valors'];
                                                    echo number_format($rs, 2);

                                                }

                                            } elseif ($valor == $key['valors']) {


                                                if ($key['karakter_kriteiro'] == "Benefit") {
                                                    $vl = (int)$key['valors'] / $benefit[0]['valor_max'];
                                                    echo $vl;
                                                } else {

                                                    $rs = $benefit[0]['valor_min'] / $key['valors'];
                                                    echo number_format($rs, 2);

                                                }


                                            } elseif ($rend == $key['valors']) {

                                                if ($key['karakter_kriteiro'] == "Benefit") {
                                                    $rn = $key['valors'] / $benefit[0]['valor_max'];
                                                    echo number_format($rn, 2);
                                                } else {
                                                    $rn = $benefit[0]['valor_min'] / $key['valors'];
                                                    echo
                                                                    number_format($rn, 2);
                                                    ;
                                                }
                                            } else {

                                                if ($key['karakter_kriteiro'] == "Benefit") {
                                                    $rankin = $key['valors'] / $benefit[0]['valor_max'];
                                                    echo number_format($rankin, 2);
                                                    ;
                                                } else {
                                                    $rankin = $benefit[0]['valor_min'] / $key['valors'];
                                                    echo number_format($rankin, 2);
                                                    ;
                                                }

                                            }
                                        }


                            ?>

                                </td>
                                <?php } ?>
                            </tr>
                            <?php $no++;
                    } ?>
                        </tbody>
                    </table>







                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-danger text-white">
                                <th colspan="20" class="text-center text-uppercase">Valores Preferensia baseia ba
                                    Kriteria</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Alternativu</th>
                                <?php $head = $result->header_kri();
                    foreach ($head as $row) { ?>
                                <th><?= $row['deskrisaun_krt']; ?></th>
                                <?php } ?>

                                <th>dsdsa</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                                                $no = 1;
                    $alt = $result->alt();

                    foreach ($alt as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['naran_alt']; ?></td>
                                <?php
                        $data = $result->rezultado($row['id_alt']);
                        $ipc = $data[0]['valors'];
                        $valor = $data[1]['valors'];
                        
                        $rend = $data[2]['valors'];
                        foreach ($data as $key) {
                            $benefit = $result->valores_benefit($key['id_regis']);
                            ?>
                                <td>

                                    <?php

                                        if ($valor) {
                                            if ($ipc == $key['valors']) {

                                                if ($key['karakter_kriteiro'] == "Benefit") {
                                                    $rs = $key['valors'] / $benefit[0]['valor_max'];
                                                    $w1 = ($key['valor'] / 100) * $rs;
                                                    echo number_format($w1, 2);
                                                } else {

                                                    $rs = $benefit[0]['valor_min'] / $key['valors'];
                                                    $w1 = ($key['valor'] / 100) * $rs;

                                                    echo number_format($w1, 2);



                                                }

                                            } elseif ($valor == $key['valors']) {


                                                if ($key['karakter_kriteiro'] == "Benefit") {
                                                    $vl = (int)$key['valors'] / $benefit[0]['valor_max'];

                                                    $w2 = ($key['valor'] / 100) * $vl;
                                                    echo number_format($w2, 2);

                                                } else {

                                                    $vl = $benefit[0]['valor_min'] / $key['valors'];
                                                    $w2 = ($key['valor'] / 100) * $vl;
                                                    echo number_format($w2, 2);


                                                }


                                            } elseif ($rend == $key['valors']) {

                                                if ($key['karakter_kriteiro'] == "Benefit") {
                                                    $rn = $key['valors'] / $benefit[0]['valor_max'];

                                                    $w3 = ($key['valor'] / 100) * $rn;
                                                    echo number_format($w3, 2);

                                                } else {
                                                    $w3 = ($key['valor'] / 100) * $rn;
                                                    echo number_format($w3, 2);
                                                }
                                            } else {

                                                if ($key['karakter_kriteiro'] == "Benefit") {
                                                    $rankin = $key['valors'] / $benefit[0]['valor_max'];

                                                    $w4 = ($key['valor'] / 100) * $rankin;

                                                    echo number_format($w4, 2);


                                                } else {
                                                    $total = $w1 + $w2 + $w3;


                                                    echo number_format($total, 2);

                                                }

                                            }
                                        }


                            ?>

                                </td>

                                <?php } ?>
                                <!-- <td><?= (int)$key['valors']; ?></td> -->
                                <td><?php


                                            $ranking =  number_format($total, 2);

                        echo (int)$key['valors'];




                        ?></td>

                            </tr>

                            <?php $no++;
                    } ?>


                        </tbody>
                    </table>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php break; ?>
<?php } ?>