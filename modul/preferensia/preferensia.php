<?php


switch ($_GET['act']) {
    case 'read':?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Preferensia</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="my-2">
                            <a href="input-preferensia.html" class="btn btn-sm btn-primary"><i class="fa fa-add"></i>
                                Aumenta</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th class="py-1">No</th>
                                <th class="py-1">Preferensia</th>
                                <th class="py-1">Ativasaun</th>
                                <th class="py-1">Asaun</th>
                            </thead>
                            <tbody>

                                <?php
                                 $no = 1;

        $pre = $preferensia->preferensia();
        foreach ($pre  as $row) {?>
                                <tr>
                                    <td class="py-1"><?= $no++; ?></td>
                                    <td class="py-1"><?= $row['preferensia'] ?></td>
                                    <td class="py-1">
                                        <?php
        if ($row['status'] == "") { ?>
                                        <center>
                                            <a href="modul/preferensia/aksi.php?act=update_all&id_pre=<?=$row['id_preferensia']?>"
                                                class="btn btn-sm py-0">
                                                <i class="fa fa-remove text-danger"></i>
                                            </a>
                                        </center>
                                        <?php } else {?>
                                        <center>
                                            <a href="modul/preferensia/aksi.php?act=update_all&id_pre=<?=$row['id_preferensia']?>"
                                                class="btn btn-sm py-0">
                                                <i class="fa fa-check text-success"></i>
                                            </a>
                                        </center>
                                        <?php } ?>
                                    </td>
                                    <td class="py-1">
                                        <a href="update-preferensia-<?=$row['id_preferensia']; ?>.html"
                                            class="btn btn-sm btn-warning py-0"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="modul/preferensia/aksi.php?act=delete&id_pre=<?=$row['id_preferensia']; ?>"
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
        <div class="col-md-6">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Valor Preferensia</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="my-2">
                            <a href="input-valor-pre.html" class="btn btn-sm btn-primary"><i class="fa fa-add"></i>
                                Aumenta</a>
                        </div>
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <th class="py-1">No</th>
                                <th class="py-1">Valor Preferensia</th>
                                <th class="py-1">Asaun</th>
                            </thead>
                            <tbody class="text-center">

                                <?php
             $no = 1;

        $vpre = $preferensia->Valor_preferensia();
        foreach ($vpre  as $row) {?>
                                <tr>
                                    <td class="py-1"><?= $no++; ?></td>
                                    <td class="py-1"><?= $row['valor']; ?> %</td>
                                    <td class="py-1">
                                        <a href="update-valor-pre-<?=$row['id_valor']; ?>.html"
                                            class="btn btn-sm btn-warning py-0"><i class="fa fa-edit"></i>
                                        </a>
                                        <a href="modul/preferensia/aksi_valor.php?act=delete&id_valor=<?=$row['id_valor']; ?>"
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
    case 'input_pre': ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Registu Preferensia</h5>
                <div class="card-body">
                    <form action="modul/preferensia/aksi.php?act=input" method="post">
                        <label for="">Preferenia Baseia ba Kasu</label>
                        <input type="text" name="preferensia" class="form-control form-control-sm rounded-1"
                            placeholder="Prense Preferensia" required>
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
    case 'update_prefe':
        $uppre = $preferensia->pre_form($_GET['id_pre']);
        ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Registu Preferensia</h5>
                <div class="card-body">
                    <form action="modul/preferensia/aksi.php?act=update&id_pre=<?=$_GET['id_pre'];?>" method="post">
                        <label for="">Preferenia Baseia ba Kasu</label>
                        <input type="text" name="preferensia" class="form-control form-control-sm rounded-1"
                            placeholder="Prense Preferensia" value="<?=$uppre[0]['preferensia']; ?>" required>
                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                            <button type="reset" onclick="return self.history.back(); "
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
    case 'input_valor_pre':?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Registu Valor Preferensia</h5>
                <div class="card-body">
                    <form action="modul/preferensia/aksi_valor.php?act=input" method="post">
                        <label for="">Preferenia</label>
                        <select name="id_preferensia" class="form-control form-control-sm rounded-1" id="" readonly>
                            <?php $id_pre = $preferensia->pre_status(); ?>
                            <option value="<?= $id_pre[0]['id_preferensia']; ?>" selected hidden>
                                <?= $id_pre[0]['preferensia']; ?> </option>
                        </select>

                        <label for="">Valor Preferenia</label>
                        <input type="number" name="valor" class="form-control form-control-sm rounded-1"
                            placeholder="Prense Preferensia" max="99" min="0" required>
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
    case 'update_valor_pre':

        $up_valor = $preferensia->select_form_valor($_GET['id_valor']);

        ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Registu Valor Preferensia</h5>
                <div class="card-body">
                    <form action="modul/preferensia/aksi_valor.php?act=update&id_valor=<?=$_GET['id_valor'];?>"
                        method="post">
                        <label for="">Preferenia</label>
                        <select name="id_preferensia" class="form-control form-control-sm rounded-1" id="" readonly>

                            <option value="<?= $up_valor[0]['id_preferensia']; ?>" selected hidden>
                                <?= $up_valor[0]['preferensia']; ?> </option>
                        </select>

                        <label for="">Valor Preferenia</label>
                        <input type="number" value="<?= $up_valor[0]['valor']; ?>" name="valor"
                            class="form-control form-control-sm rounded-1" placeholder="Prense Preferensia" max="99"
                            min="0" required>
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
<?php break; ?>
<?php } ?>