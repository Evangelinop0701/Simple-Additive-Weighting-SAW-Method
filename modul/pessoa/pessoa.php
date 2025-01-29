<?php


switch ($_GET['act']) {
    case 'read':?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <?php $kas = $kasu->kasu_form($_GET['id']); ?>
                <h5 class="card-header rounded-0" id="card-head">Kasu - [<?=$kas[0]['naran_kasu'];  ?>] - ba Aplikante
                </h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="my-2">
                            <a href="input-pessoa-<?=$_GET['id']?>.html" class="btn btn-sm btn-primary"><i
                                    class="fa fa-add"></i>
                                Aumenta</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th class="py-1">No</th>
                                <th class="py-1">Naran</th>
                                <th class="py-1">Sexu</th>
                                <th class="py-1">Data Moris</th>
                                <th class="py-1">Asaun</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
        $data_pess = $pesoa->pessoa_pessoa($_GET['id']);

        foreach ($data_pess as $row) {?>
                                <tr>
                                    <td class="py-1"><?=$no; ?></td>
                                    <td class="py-1"><a href="" class="text-decoration-none"><?=$row['naran']; ?></a>
                                    </td>
                                    <td class="py-1"><?=$row['sexu']; ?></td>
                                    <td class="py-1"><?=$row['data_moris']; ?></td>
                                    <td class="py-1">
                                        <a href="edit-pessoa-<?=$row['id_pessoa']?>-kasu-<?=$row['id_kasu']?>.html"
                                            class="btn btn-sm py-0 btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="modul/pessoa/aksi.php?act=delete&id_kasu=<?=$row['id_kasu']?>&id_pessoa=<?=$row['id_pessoa']?>"
                                            class="btn btn-sm py-0 btn-dark"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $no++;
        } ?>

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
                <h5 class="card-header rounded-0" id="card-head">Form Input Kandidatu</h5>
                <div class="card-body">
                    <form action="modul/pessoa/aksi.php?act=input&id=<?=$_GET['id']?>" method="post">
                        <div class="my-2">
                            <label for="">Naran Kanditau</label>
                            <input type="text" name="naran" class="form-control form-control-sm rounded-1"
                                placeholder="Prense Naran" required>
                        </div>
                        <div class="my-2">
                            <label for="">Sexu</label>
                            <select name="sexu" id="" class="form-control form-control-sm rounded-1" required>
                                <option value="" selected hidden>Sexu</option>
                                <option value="Mane">Mane</option>
                                <option value="Feto">Feto</option>
                            </select>
                        </div>

                        <div class="my-2">
                            <label for="">Data Moris</label>
                            <input type="date" name="data_moris" class="form-control form-control-sm rounded-1"
                                placeholder="" required>
                        </div>
                        <div class="my-2">
                            <label for="">Abilidade</label>
                            <textarea name="abilidade" class="form-control form-control-sm rounded-1"
                                placeholder="Text..." cols="10" rows="" required></textarea>
                        </div>
                        <div class="my-2">
                            <label for="">Nivel Edukasaun</label>
                            <textarea name="nivel_edu" class="form-control form-control-sm rounded-1"
                                placeholder="Text..." cols="10" rows="" required></textarea>
                        </div>
                        <input type="hidden" name="id_kasu" value="<?=$_GET['id']?>">
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

        $up_pess = $pesoa->pessoa_from($_GET['id']);

        ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card rounded-0">
                <h5 class="card-header rounded-0" id="card-head">Form Input Kandidatu</h5>
                <div class="card-body">
                    <form
                        action="modul/pessoa/aksi.php?act=update&id=<?=$_GET['id']?>&id_pessoa=<?=$_GET['id_pessoa']?>"
                        method="post">
                        <div class="my-2">
                            <label for="">Naran Kanditau</label>
                            <input type="text" value="<?=$up_pess[0]['naran'] ?>" name="naran"
                                class="form-control form-control-sm rounded-1" placeholder="Prense Naran" required>
                        </div>
                        <div class="my-2">
                            <label for="">Sexu</label>
                            <select name="sexu" id="" class="form-control form-control-sm rounded-1" required>
                                <option value="<?= $up_pess[0]['sexu']; ?>" selected hidden>
                                    <?= $up_pess[0]['sexu']; ?></option>
                                <option value="Mane">Mane</option>
                                <option value="Feto">Feto</option>
                            </select>
                        </div>

                        <div class="my-2">
                            <label for="">Data Moris</label>
                            <input type="date" value="<?=$up_pess[0]['data_moris'] ?>" name="data_moris"
                                class="form-control form-control-sm rounded-1" placeholder="" required>
                        </div>
                        <div class="my-2">
                            <label for="">Abilidade</label>
                            <textarea name="abilidade" class="form-control form-control-sm rounded-1"
                                placeholder="Text..." cols="10" rows=""
                                required><?= $up_pess[0]['abilidade'] ?></textarea>
                        </div>
                        <div class="my-2">
                            <label for="">Nivel Edukasaun</label>
                            <textarea name="nivel_edu" class="form-control form-control-sm rounded-1"
                                placeholder="Text..." cols="10" rows=""
                                required><?= $up_pess[0]['abilidade'] ?></textarea>
                        </div>
                        <input type="hidden" name="id_kasu" value="<?=$_GET['id']?>">
                        <div class="my-3">
                            <button type="submit" class="btn btn-sm btn-success">Update</button>
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