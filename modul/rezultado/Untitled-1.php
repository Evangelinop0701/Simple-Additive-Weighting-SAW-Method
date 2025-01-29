<table class="table table-bordered border-dark my-1">

    <tr>
        <td class="py-0 text-center fw-bold" colspan="5" style="font-size:15px;">
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