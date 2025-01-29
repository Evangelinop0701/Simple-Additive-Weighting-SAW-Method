<?php switch ($_GET['act']) {
    case 'read': ?>

<div class="container-fluid my-5 px-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Kriteiros</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="my-2">
                            <a href="input-kriteiro.html" class="btn btn-sm btn-primary"><i class="fa fa-add"></i>
                                Aumenta</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th class="py-1">No</th>
                                <th class="py-1">Kriteria</th>
                                <th class="py-1">Estadu</th>
                                <th class="py-1">Asaun</th>
                            </thead>
                            <tbody>

                                <?php
                                 $no = 1;

        $kt = $kriteria->kriteria();
        foreach ($kt  as $row) {?>
                                <tr>
                                    <td class="py-1"><?= $no++; ?></td>
                                    <td class="py-1"><a href="registu-kriteiro-<?=$row['id_kriteiro'] ?>.html"
                                            class="text-decoration-none"><?= $row['kriteiro'] ?></a></td>
                                    <td class="py-1">
                                        <?php
        if ($row['status'] == "") { ?>
                                        <center>
                                            <a href="modul/kriteria/aksi.php?act=update_all&id=<?=$row['id_kriteiro']?>"
                                                class="btn btn-sm py-0">
                                                <i class="fa fa-remove text-danger"></i>
                                            </a>
                                        </center>
                                        <?php } else {?>
                                        <center>
                                            <a href="modul/kriteria/aksi.php?act=update_all&id=<?=$row['id_kriteiro']?>"
                                                class="btn btn-sm py-0">
                                                <i class="fa fa-check text-success"></i>
                                            </a>
                                        </center>
                                        <?php } ?>
                                    </td>
                                    <td class="py-1">
                                        <a href="edit-kriteria-<?=$row['id_kriteiro']; ?>.html"
                                            class="btn btn-sm btn-warning py-0"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="modul/kriteria/aksi.php?act=delete&id=<?=$row['id_kriteiro']; ?>"
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
            <hr class="border border-primary">
        </div>

        <div class="col-md-12">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Registu Kriteria</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="my-2">
                            <a href="regis-input.html" class="btn btn-sm btn-primary"><i class="fa fa-add"></i>
                                Aumenta</a>
                        </div>
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <th class="py-1">No</th>
                                <th class="py-1">Kriteria</th>
                                <th class="py-1">Kriteria no Subkriteria</th>
                                <th class="py-1">Karakter. Kreteria</th>
                                <th class="py-1">Valor Preferensia</th>
                                <th class="py-1">Asaun</th>
                            </thead>
                            <tbody class="text-center">

                                <?php
                                                $no = 1;

        $kt = $regis->regis_kriteria();
        foreach ($kt  as $row) {?>
                                <tr>
                                    <td class="py-1"><?= $no++; ?></td>
                                    <td class="py-1"><?=$row['naran_kriteiro'] ?> <a
                                            href="input-subkriteria-<?=$row['id_reagis']?>.html"
                                            class="btn py-0 btn-sm btn-success rounded-5" style="font-size:12px;">
                                            Subkriteria</a></td>
                                    <td class="py-1">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="py-0 text-center" colspan="5" style="font-size:15px;">
                                                    <?= $row['deskrisaun_krt']; ?></td>
                                            </tr>


                                            <?php
        $sub_krt = $sub->sub_kriteria($row['id_reagis']);
            foreach ($sub_krt as $key) { ?>

                                            <tr>
                                                <td class="py-0 text-center" style="font-size:15px;">
                                                    <?=$key['subkriteria'] ?></td>

                                                <td class="py-0 text-center" style="font-size:15px;">
                                                    <?=$key['valor_sub_krt'] ?></td>


                                                <td class="py-0 text-center" style="font-size:15px;">
                                                    <a href="update-subkriteria-<?=$key['id_sub'] ?>.html"
                                                        class="btn py-0 btn-sm btn-primary rounded-1 px-1"
                                                        style="font-size:9px;">
                                                        <i class="fa fa-edit"></i></a>
                                                    <a href="modul/kriteria/aksi.php?act=delete_sub&id_sub=<?=$key['id_sub'] ?>"
                                                        class="btn py-0 btn-sm btn-danger rounded-1 px-1"
                                                        style="font-size:9px;">
                                                        <i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </td>
                                </tr>

                        </table>
                        </td>
                        <td class="py-1"><?= $row['karakter_kriteiro']; ?></td>
                        <td class="py-1"><?= $row['valor']; ?> %</td>
                        <td class="py-1">
                            <a href="regis-update-<?=$row['id_reagis']; ?>.html" class="btn btn-sm btn-warning py-0"><i
                                    class="fa fa-edit"></i>
                            </a>
                            <a href="modul/kriteria/aksi_res.php?act=delete&id=<?=$row['id_reagis']; ?>"
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
    </div>
</div>

<?php break;
    case 'input':
        ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Kriteiro</h5>
                <div class="card-body">
                    <form action="modul/kriteria/aksi.php?act=input" method="post">
                        <label for="">Kriterio Baseia ba kasu</label>
                        <input type="text" name="kriteiro" class="form-control form-control-sm rounded-1"
                            placeholder="Prense kriteiro" required>
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

        $upk = $kriteria->krt_from($_GET['id']);

        ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Update Kriteiro</h5>
                <div class="card-body">
                    <form action="modul/kriteria/aksi.php?act=update&id=<?=$_GET['id']?>" method="post">
                        <label for="">Kriterio Baseia ba kasu</label>
                        <input type="text" name="kriteiro" value="<?=$upk[0]['kriteiro']; ?>"
                            class="form-control form-control-sm rounded-1" placeholder="Prense kriteiro" required>
                        <div class="my-3">
                            <button type="Update" class="btn btn-sm btn-success">Update</button>
                            <button type="reset" class="btn btn-sm btn-secondary"
                                onclick="return history.back();">Kansela</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php break;
    case 'registu_krt':?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Registu Kriteiro</h5>
                <div class="card-body">
                    <form action="modul/kriteria/aksi_res.php?act=input" method="post">

                        <div class="my-3">
                            <label for="">Naran Kriterio</label>
                            <input type="text" name="naran_kriteiro" class="form-control form-control-sm rounded-1"
                                placeholder="Prense  kriteiro" required>
                        </div>
                        <div class="my-3">
                            <label for="">Deskrisaun</label>
                            <input type="text" name="deskrisaun_krt" class="form-control form-control-sm rounded-1"
                                placeholder="Prense deskrisaun kriteiro" required>
                        </div>
                        <div class="my-3">
                            <label for="">Karakteristika Kriteria</label>
                            <select name="karakter_kriteiro" id="" class="form-control form-control-sm rounded-1"
                                required>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>

                            </select>
                        </div>
                        <div class="my-3">
                            <label for="">Valor Preferensia</label>
                            <select name="id_valor_prefe" id="" class="form-control form-control-sm rounded-1" required>
                                <option value="" selected hidden>Valor Preferensia</option>
                                <?php
                                $valor = $valor_pre->valor_preferensia();
        foreach ($valor as $row) {?>
                                <option value="<?=$row['id_valor']?>"> Valor preferensia <?= $row['valor'] ?> %</option>
                                <?php } ?>
                            </select>

                        </div>
                        <?php $yes = $kriteria-> krt_yes(); ?>
                        <input type="hidden" value="<?=$yes[0]['id_kriteiro']?>" name="id_kriteiro">
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
    case 'update_res':

        $upres = $regis->regis_form($_GET['id']);

        ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Registu Kriteiro</h5>
                <div class="card-body">
                    <form action="modul/kriteria/aksi_res.php?act=update&id=<?=$_GET['id'] ?>" method="post">

                        <div class="my-3">
                            <label for="">Naran Kriterio</label>
                            <input type="text" value="<?= $upres[0]['naran_kriteiro']; ?>" name="naran_kriteiro"
                                class="form-control form-control-sm rounded-1" placeholder="Prense  kriteiro" required>
                        </div>
                        <div class="my-3">
                            <label for="">Deskrisaun</label>
                            <input type="text" value="<?= $upres[0]['deskrisaun_krt']; ?>" name="deskrisaun_krt"
                                class="form-control form-control-sm rounded-1" placeholder="Prense deskrisaun kriteiro"
                                required>
                        </div>
                        <div class="my-3">
                            <label for="">Karakteristika Kriteria</label>
                            <select name="karakter_kriteiro" id="" class="form-control form-control-sm rounded-1"
                                required>
                                <option value="<?= $upres[0]['karakter_kriteiro']; ?>" selected hidden>
                                    <?= $upres[0]['karakter_kriteiro']; ?></option>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>

                            </select>
                        </div>
                        <div class="my-3">
                            <label for="">Valor Preferensia</label>
                            <select name="id_valor_prefe" id="" class="form-control form-control-sm rounded-1" required>
                                <option value="<?= $upres[0]['id_valor_prefe']; ?>" selected hidden>Valor preferensia
                                    <?= $upres[0]['valor']; ?> %</option>
                                <?php
                                    $valor = $valor_pre->valor_preferensia();
        foreach ($valor as $row) {?>
                                <option value="<?=$row['id_valor']?>"> Valor preferensia <?= $row['valor'] ?> %</option>
                                <?php } ?>
                            </select>

                        </div>
                        <?php $yes = $kriteria->krt_yes(); ?>
                        <input type="hidden" value="<?=$yes[0]['id_kriteiro']?>" name="id_kriteiro">
                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                            <button type="reset" class="btn btn-sm btn-secondary"
                                onclick="return history.back();">Kansela</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php break;
    case 'input_sub':
        $insert = $sub->registu_krt($_GET['id']);
        ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Subkriteria</h5>
                <div class="card-body">
                    <form action="modul/kriteria/aksi.php?act=insert_sub" method="post">
                        <label for="">Naran Kriteria</label>
                        <input type="text" name="subkriteria" class="form-control form-control-sm rounded-1"
                            placeholder="Prense subkriteria" required>
                        <label for="">Valor</label>
                        <input type="text" name="valor_sub_krt" class="form-control form-control-sm rounded-1"
                            placeholder="Prense subkriteria" required>
                        <input type="hidden" name="id_registu_krt" class="form-control form-control-sm rounded-1"
                            placeholder="Prense subkriteria" value="<?=$insert[0]['id_reagis'] ?>" required>
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
    case 'update_sub':
        $up = $sub->select_form($_GET['id_sub']);
        ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Subkriteria</h5>
                <div class="card-body">
                    <form action="modul/kriteria/aksi.php?act=update_sub&id_sub=<?=$_GET['id_sub'] ?>" method="post">
                        <label for="">Naran Kriteria</label>
                        <input type="text" name="subkriteria" value="<?=$up[0]['subkriteria'] ?>"
                            class="form-control form-control-sm rounded-1" placeholder="Prense subkriteria" required>
                        <label for="">Valor</label>
                        <input type="text" name="valor_sub_krt" value="<?=$up[0]['valor_sub_krt'] ?>"
                            class="form-control form-control-sm rounded-1" placeholder="Prense subkriteria" required>
                        <input type="hidden" name="id_registu_krt" class="form-control form-control-sm rounded-1"
                            placeholder="Prense subkriteria" value="<?=$up[0]['id_reagis'] ?>" required>
                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                            <button type="reset" class="btn btn-sm btn-secondary"
                                onclick="return history.back();">Kansela</button>
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