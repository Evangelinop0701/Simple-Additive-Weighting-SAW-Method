<?php

switch ($_GET['act']) {
    case 'read':
        ?>


<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Kasu</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="my-2">
                            <div class="alert alert-success py-1">
                                <li>Resgistu kasu no Registu Aplikante</li>
                            </div>
                            <a href="input-kasu.html" class="btn btn-sm btn-primary"><i class="fa fa-add"></i>
                                Aumenta</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th class="py-1">No</th>
                                <th class="py-1">Kasu</th>
                                <th class="py-1">Data Registu</th>
                                <th class="py-1">Estadu</th>
                                <th class="py-1">Asaun</th>
                            </thead>
                            <tbody>

                                <?php
                                 $no = 1;

        $dkasu = $kasu->read_kasu();
        foreach ($dkasu as $row) {?>
                                <tr>
                                    <td class="py-1"><?= $no++; ?></td>
                                    <td class="py-1"><a href="dadus-pessoa-<?=$row['id_kasu'] ?>.html"
                                            class="text-decoration-none"><?= $row['naran_kasu'] ?></a></td>
                                    <td class="py-1"><?=$row['data_registu'] ?></td>
                                    <td class="py-1">
                                        <?php
                if ($row['status'] == "") { ?>
                                        <center>
                                            <a href="modul/kasu/aksi.php?act=yes&id=<?=$row['id_kasu']; ?>"
                                                class="btn btn-sm py-0">
                                                <i class="fa fa-remove text-danger"></i>
                                            </a>
                                        </center>
                                        <?php } else {?>
                                        <center>
                                            <a href="modul/kasu/aksi.php?act=yes&id=<?=$row['id_kasu']; ?>"
                                                class="btn btn-sm py-0">
                                                <i class="fa fa-check text-success"></i>
                                            </a>
                                        </center>
                                        <?php } ?>
                                    </td>
                                    <td class="py-1">
                                        <a href="edit-kasu-<?=$row['id_kasu']; ?>.html"
                                            class="btn btn-sm btn-warning py-0"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="modul/kasu/aksi.php?act=delete&id=<?=$row['id_kasu']; ?>"
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
                <h5 class="card-header rounded-0" id="card-head">Form Input Kasu</h5>
                <div class="card-body">
                    <form action="modul/kasu/aksi.php?act=input" method="post">
                        <label for="">Naran Kasu</label>
                        <input type="text" name="naran_kasu" class="form-control form-control-sm rounded-1"
                            placeholder="Prense Kasu" required>
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
    case 'edit':

        $up = $kasu->kasu_form($_GET['id']);

        ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Edit Kasu</h5>
                <div class="card-body">
                    <form action="modul/kasu/aksi.php?act=update&id=<?=$_GET['id'];?>" method="post">
                        <label for="">Naran Kasu</label>
                        <input type="text" value="<?=$up[0]['naran_kasu']; ?>" name="naran_kasu"
                            class="form-control form-control-sm rounded-1" placeholder="Prense Kasu" required>
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
<?php break; ?>
<?php } ?>