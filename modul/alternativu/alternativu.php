<?php

switch ($_GET['act']) {
    case 'read':
        ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Registu Alternativus</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="">
                            <div class="alert alert-success py-1">

                                <li>Klin iha naran kandidatu hodi registu kriteria</li>

                            </div>
                        </div>
                        <div class="my-2">
                            <a href="input-alternativu.html" class="btn btn-sm btn-primary"><i class="fa fa-add"></i>
                                Aumenta</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th class="py-1">No</th>
                                <th class="py-1">Alternativu</th>
                                <th class="py-1">Kandidatu</th>
                                <th class="py-1">Asaun</th>
                            </thead>
                            <tbody>

                                <?php
                                 $no = 1;

        $al = $alt->alternativu();
        foreach ($al  as $row) {?>
                                <tr>
                                    <td class="py-1"><?= $no++; ?></td>
                                    <td class="py-1"><?= $row['naran_alt'] ?></td>
                                    <td class="py-1"><a
                                            href="detallo-krt-<?=$row['id_alt']?>-knadidatu-<?=$row['id_pessoa'] ?>.html"
                                            class="text-decoration-none"><?= $row['naran'] ?></a>
                                    </td>

                                    <td class="py-1">
                                        <a href="update-alternativu-<?=$row['id_alt']; ?>.html"
                                            class="btn btn-sm btn-warning py-0"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="modul/alternativu/aksi.php?act=delete&id=<?=$row['id_alt']; ?>"
                                            class="btn btn-sm btn-dark py-0"><i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php break;
    case 'input': ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Registu Alternativu</h5>
                <div class="card-body">
                    <form action="modul/alternativu/aksi.php?act=input" method="post">

                        <div class="my-3">
                            <label for="">Alternativu</label>
                            <input type="text" name="naran_alt" class="form-control form-control-sm rounded-1"
                                placeholder="A1, A2, A3 etc..." required>
                        </div>


                        <div class="my-3">
                            <label for="">Kandidatus</label>
                            <select name="id_pessoa" id="" class="form-control form-control-sm rounded-1" required>
                                <option value="" selected hidden>--Hili kandidatu--</option>
                                <?php
                                    $pes = $pesoa->dados_pessoa();
        foreach ($pes as $row) {?>
                                <option value="<?=$row['id_pessoa']?>"> <?= $row['naran'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                            <button type="reset" class="btn btn-sm btn-secondary">Kansela</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php break;
    case 'update':
        $up_alt = $alt->alt_form($_GET['id']);
        ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Update Alternativu</h5>
                <div class="card-body">
                    <form action="modul/alternativu/aksi.php?act=update&id=<?=$_GET['id'] ?>" method="post">

                        <div class="my-3">
                            <label for="">Alternativu</label>
                            <input type="text" name="naran_alt" class="form-control form-control-sm rounded-1"
                                placeholder="A1, A2, A3 etc..." value="<?=$up_alt[0]['naran_alt'] ?>" required>
                        </div>


                        <div class="my-3">
                            <label for="">Kandidatus</label>
                            <select name="id_pessoa" id="" class="form-control form-control-sm rounded-1" required>
                                <option value="<?=$up_alt[0]['id_pessoa'] ?>" selected hidden><?= $up_alt[0]['naran'] ?>
                                </option>
                                <?php
                                        $pes = $pesoa->dados_pessoa();
        foreach ($pes as $row) {?>
                                <option value="<?=$row['id_pessoa']?>"> <?= $row['naran'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                            <button type="reset" onclick="return history.back();"
                                class="btn btn-sm btn-secondary">Kansela</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php break;
    case 'detallo_krt':
        $name = $dt_alt->detalho_kandidatu($_GET['id_pessoa']);
        ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Kriteiro husi knadidatu - [<?= $name[0]['naran'] ?>]
                </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="my-2">
                            <a href="input-detallo-<?=$_GET['id']?>-pessoa-<?=$_GET['id_pessoa']?>.html"
                                class="btn btn-sm btn-primary"><i class="fa fa-add"></i>
                                Aumenta</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th class="py-1">No</th>
                                <th class="py-1">Kriteria</th>
                                <th class="py-1">Deskrisaun</th>
                                <th class="py-1">Karakter Kriteiro</th>
                                <th class="py-1">Valor</th>
                                <th class="py-1">Asaun</th>
                            </thead>
                            <tbody>

                                <?php
                                 $no = 1;

        $detallo = $dt_alt->detallo_alt($_GET['id']);
        foreach ($detallo  as $row) {?>
                                <tr>
                                    <td class="py-1"><?= $no++; ?></td>
                                    <td class="py-1"><?= $row['naran_kriteiro'] ?></td>
                                    <td class="py-1"><?= $row['deskrisaun_krt'] ?></td>
                                    <td class="py-1"><?= $row['karakter_kriteiro'] ?></td>
                                    <td class="py-1"><?= number_format($row['valors'], 0) ?></td>

                                    <td class="py-1">
                                        <a href="update-detallo-<?=$row['id_detalho']; ?>-pessoa-<?=$_GET['id_pessoa']?>.html"
                                            class="btn btn-sm btn-warning py-0"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="modul/alternativu/aksi.php?act=delete_dt&id_dt=<?=$row['id_detalho']; ?>&id_pessoa=<?=$_GET['id_pessoa'];?>&id_alt=<?=$row['id_alt'] ?>"
                                            class="btn btn-sm btn-dark py-0"><i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<?php break;
    case 'detallo_input': ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Input Valor</h5>
                <div class="card-body">
                    <form
                        action="modul/alternativu/aksi.php?act=input_dt&id=<?=$_GET['id']?>&id_pessoa=<?=$_GET['id_pessoa'] ?>"
                        method="post">
                        <div class="my-2">
                            <label for="">Naran Kandidatu</label>
                            <?php $alt_name = $alt->alt_form($_GET['id']); ?>
                            <select name="id_alt" id="" class="form-control form-control-sm rounded-1" required
                                readonly>
                                <option value="<?=$alt_name[0]['id_alt'] ?>" hidden><?= $alt_name[0]['naran']; ?>
                                </option>
                            </select>
                        </div>
                        <div class="my-2">
                            <label for="">Kriteria</label>
                            <select name="id_regis" id="" class="form-control form-control-sm rounded-1" required>
                                <option value="" selected hidden>Kriteria</option>
                                <?php

                                $krt = $regis->regis_kriteria();
        foreach ($krt as $row) { ?>
                                <option value="<?= $row['id_reagis']; ?>">
                                    <?=$row['naran_kriteiro'] ?> - <?=$row['deskrisaun_krt'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="my-2">
                            <label for="">Valor</label>
                            <input type="text" name="valors" class="form-control form-control-sm rounded-1"
                                placeholder="Prense Valor" required>
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                            <button type="reset" class="btn btn-sm btn-secondary">Kansela</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php break;
    case 'update_detallu':
        $updetallu = $dt_alt->detallo_form($_GET['id']);
        ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Update Valor</h5>
                <div class="card-body">
                    <form
                        action="modul/alternativu/aksi.php?act=update_dt&id_pessoa=<?=$_GET['id_pessoa'] ?>&id=<?=$_GET['id']?>"
                        method="post">
                        <div class="my-2">
                            <label for="">Naran Kandidatu</label>
                            <?php $alt_name = $alt->alt_form($_GET['id_pessoa']); ?>
                            <select name="id_alt" id="" class="form-control form-control-sm rounded-1" required
                                readonly>
                                <option value="<?=$alt_name[0]['id_alt'] ?>" hidden><?= $alt_name[0]['naran']; ?>
                                </option>
                            </select>
                        </div>
                        <div class="my-2">
                            <label for="">Kriteria</label>
                            <select name="id_regis" id="" class="form-control form-control-sm rounded-1" required>
                                <option value="<?=$updetallu[0]['id_regis'] ?>" selected hidden>
                                    <?=$updetallu[0]['naran_kriteiro']; ?> <?=$updetallu[0]['deskrisaun_krt']; ?>
                                </option>
                                <?php

                                    $krt = $regis->regis_kriteria();
        foreach ($krt as $row) { ?>
                                <option value="<?= $row['id_reagis']; ?>">
                                    <?=$row['naran_kriteiro'] ?> - <?=$row['deskrisaun_krt'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="my-2">
                            <label for="">Valor</label>
                            <input type="text" name="valors" class="form-control form-control-sm rounded-1"
                                placeholder="Prense Valor" value="<?=$updetallu[0]['valors'] ?>" required>
                        </div>
                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                            <button type="reset" class="btn btn-sm btn-secondary"
                                onclick="return self.history.back();">Kansela</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php break; ?>
<?php } ?>