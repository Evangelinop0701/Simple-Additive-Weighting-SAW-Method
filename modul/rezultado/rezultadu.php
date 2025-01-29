<?php

global $soma;

switch ($_GET['act']) {
    case 'read':?>
<div class="container my-3">
    <div class="row">
        <!-- <div class="col-sm-12">
            <ol class="breadcrumb rounded-1 px-2 py-1">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Rezultadu</li>
            </ol>
        </div> -->
        <div class="col-sm-12">
            <div class="card rounded-1 border-primary">
                <div class="card-header bg-primary rounded-0 text-white">
                    <div class="card-title">
                        <h5>Rezultadu</h5>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-light table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="py-1 bg-dark text-white" colspan="20"
                                            class="text-center text-uppercase">Valores
                                            Kandidatus no
                                            Kriteria</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th class="py-1">No</th>
                                        <th class="py-1">Naran</th>
                                        <?php $head = $result->header_kri();
                    foreach ($head as $row) { ?>
                                        <th class="py-1"><?= $row['deskrisaun_krt']; ?></th>
                                        <?php } ?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                        $no = 1;
                    $alt = $result->alt();

                    foreach ($alt as $row) {?>
                                    <tr>
                                        <td class="py-1"><?=$no; ?></td>
                                        <td class="py-1"><?=$row['naran']; ?></td>
                                        <?php
                    $data = $result->rezultado($row['id_alt']);
                        foreach ($data as $key) {
                            ?>
                                        <td class="py-1 text-center"><?= number_format($key['valors'], 0); ?> </td>
                                        <?php } ?>
                                    </tr>
                                    <?php $no++;
                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- ----------------------------------------- -->
                        <hr class="border border-primary">

                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th class="py-1 bg-dark text-white" colspan="6">Kriteria</th>
                                    </tr>
                                    <tr>
                                        <th class="py-1">No</th>
                                        <th class="py-1">Kriteria</th>
                                        <th class="py-1">Kriteria no Subkriteria</th>
                                        <th class="py-1">Karakter. Kreteria</th>
                                        <th class="py-1">Valor Preferensia</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                    <?php
                                                $no = 1;

                    $kt = $regis->regis_kriteria();
                    foreach ($kt  as $row) {?>
                                    <tr>
                                        <td class="py-1"><?= $no++; ?></td>
                                        <td class="py-1"><?=$row['naran_kriteiro'] ?></td>
                                        <td class="py-1">
                                            <?php $sub_krt = $sub->sub_kriteria($row['id_reagis']);

                        if (empty($sub_krt)) {
                            echo $row['deskrisaun_krt'];

                        } else { ?>
                                            <table class="table table-bordered border-dark my-1">

                                                <tr>
                                                    <td class="py-0 text-center fw-bold" colspan="5"
                                                        style="font-size:15px;">
                                                        <?= $row['deskrisaun_krt']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th class="py-0 text-center">Subkriteria</th>
                                                    <th class="py-0 text-center">valor</th>
                                                </tr>

                                                <?php

                                               foreach ($sub_krt as $key) { ?>

                                                <tr>
                                                    <td class="py-0 text-center" style="font-size:15px;">
                                                        <?=$key['subkriteria'] ?></td>

                                                    <td class="py-0 text-center" style="font-size:15px;">
                                                        <?=$key['valor_sub_krt'] ?></td>
                                                </tr>
                                                <?php } ?>
                                        </td>
                                    </tr>

                            </table>
                            <?php } ?>



                            </td>
                            <td class="py-1"><?= $row['karakter_kriteiro']; ?></td>
                            <td class="py-1"><?= $row['valor']; ?> %</td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            </table>
                        </div>
                    </div>




                    <hr class="border border-primary">

                    <table class="table table-light table-bordered table-hover">
                        <thead class="text-center">
                            <tr class="bg-success text-center">
                                <th class="py-1 bg-dark text-white" colspan="20">Valores Kandidatus no
                                    Kriteria</th>
                            </tr>
                            <tr>
                                <th class="py-1">No</th>
                                <th class="py-1">Alternativu</th>
                                <?php $head = $result->header_kri();
                    foreach ($head as $row) { ?>
                                <th class="py-1"><?= $row['deskrisaun_krt']; ?></th>
                                <?php } ?>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php

                                        $no = 1;
                    $alt = $result->alt();

                    foreach ($alt as $row) {?>
                            <tr>
                                <td class="py-1"><?=$no; ?></td>
                                <td class="py-1"><?=$row['naran_alt']; ?></td>
                                <?php
                        $data = $result->rezultado($row['id_alt']);

                        $ipc = $data[0]['valors'];
                        $valor = $data[1]['valors'];
                        $rend = $data[2]['valors'];
                        foreach ($data as $key) {
                            $benefit = $result->valores_benefit($key['id_regis']);

                            ?>
                                <td class="py-1 text-center">

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
                                                    echo number_format($vl, 2);
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
                    <hr class="border border-primary">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- hamodd husi calss RANKING -->
                            <?php
$rank->delete_soma();
                    ?>
                            <table class="table table-light table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th class="py-1 bg-dark text-white" scope="col" colspan="10">
                                            Valores Preferensia
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="py-1" scope="col">No</th>
                                        <th class="py-1" scope="col">Alternativu</th>
                                        <?php $head = $result->header_kri();


                    foreach ($head as $row) { ?>

                                        <th class="py-1" scope="col"><?= $row['deskrisaun_krt']; ?></th>
                                        <?php } ?>
                                        <th class="py-1" scope="col">Somatorio Kada Kriteria</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center">


                                    <?php

                                                       $no = 1;
                    $alt = $result->alt();

                    foreach ($alt as $row) {?>
                                    <tr>
                                        <td class="py-1"><?=$no; ?></td>
                                        <td class="py-1"><?=$row['naran_alt']; ?></td>
                                        <?php
                                $data = $result->rezultado($row['id_alt']);



                        foreach ($data as $key) {
                            $benefit = $result->valores_benefit($key['id_regis']);

                            ?>
                                        <td class="py-1">

                                            <?php if ($key['karakter_kriteiro'] == "Benefit") {

                                                $rs = $key['valors'] / $benefit[0]['valor_max'];
                                                $w1 = ($key['valor'] / 100) * $rs;
                                                $rank->insert_valor_soma($key['id_alt'], $key['id_regis'], $w1);
                                                echo number_format($w1, 4);

                                            } else {
                                                $rs = $benefit[0]['valor_min'] / $key['valors'];
                                                $w2 = ($key['valor'] / 100) * $rs;

                                                $rank->insert_valor_soma($key['id_alt'], $key['id_regis'], $w2);


                                                echo number_format($w2, 4);



                                            }

                            $soma = $rank->soma_valor_alt($key['id_alt']);




                            ?>

                                        </td>



                                        <?php } ?>

                                        <?php
                                $data4 = $result->validate($row['id_alt']);
                        if ($data4 > 0) {

                        } else {

                            $rank->insert_ranking($row['id_alt'], $soma[0]['soma_valor']);

                        }


                        ?>
                                        <td class="py-1">
                                            <?php

                                                                          echo number_format($soma[0]['soma_valor'], 4);
                        ?>
                                        </td>

                                    </tr>
                                    <?php $no++;
                    } ?>

                                </tbody>
                            </table>
                        </div>


                        <div class="col-lg-4">
                            <table class="table table-light table-bordered table-hover rounded-5">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th class="py-1" colspan="5">Ranking <a
                                                href="modul/rezultado/aksi.php?act=delete_all"
                                                class="px-3 text-decoration-none" style="font-size: 14px;"><i
                                                    class="fa fa-refresh"></i>
                                                Referes</a></th>
                                    </tr>
                                    <tr>
                                        <th class="py-1">#</th>
                                        <th class="py-1">Alternativu</th>
                                        <th class="py-1">Valor</th>
                                        <th class="py-1">Ranking</th>
                                    </tr>

                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $predict = $rank->PrediksaunRanking();
                    $valor_max = $rank->valor_max();

                    $no = 1;

                    foreach ($predict as $row) {?>
                                    <tr>
                                        <td class="py-1"><?=$no; ?></td>
                                        <td class="py-1"><?=$row['naran_alt']; ?></td>
                                        <td class="py-1"><?= $row['valor'] ?></td>
                                        <td class="py-1"><?=$no; ?></td>
                                    </tr>
                                    <?php $no++;
                    } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>


                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php break; ?>
<?php } ?>