<?php
$classadd;
$msg;
if ($hitung[0]->nopen >= 15) {
    $classadd = 'd-block';
    $msg = '';
} else {
    $classadd = 'hide';
    $msg = 'Anda belum membuat rencana kunjungan hari ini !</br><a href="' . base_url('Sales/Caridata/index/') . '">buat rencana kunjungan</a>';
}
?>
<h2><?= $msg; ?></h2>
<div class="table-responsive <?= $classadd; ?>">
    <table class="table table-striped table-bordered table-hover" style="width:100%;">
        <thead>
            <tr role="row">
                <th class="text-uppercase text-center">Nama Pensiunan</th>
                <th class="text-uppercase text-center">usia Pensiunan</th>
                <th class="text-uppercase text-center">Penerima</th>
                <th class="text-uppercase text-center">usia Penerima</th>
                <th class="text-uppercase text-center">Alamat</th>
                <th class="text-uppercase text-center">action's</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Value as $Value) { ?>
                <tr>
                    <td>
                        <?= $Value->NAMAPENSIUNAN; ?>
                    </td>
                    <td class="text-center">
                        <?php
                        $now = new DateTime();
                        $dob = new DateTime(date($Value->TGL_LAHIR_PENSIUNAN));
                        $age = $now->diff($dob);
                        echo $age->y;
                        ?>
                    </td>
                    <td><?= $Value->NAMA_PENERIMA; ?></td>
                    <td class="text-center">
                        <?php
                        $now1 = new DateTime();
                        $dob1 = new DateTime(date($Value->TGL_LAHIR_PENERIMA));
                        $age1 = $now1->diff($dob1);
                        echo $age1->y;
                        ?>
                    </td>
                    <td><?= $Value->ALM_PESERTA . ', KEL. ' . $Value->KELURAHAN . ', KEC. ' . $Value->KECAMATAN . ', KAB. ' . $Value->KOTA_KAB . ", PROV. " . $Value->PROVINSI; ?></td>
                    <td class="text-center">
                        <a href="<?= base_url('Sales/Interaksi/index/' . $Value->NOTAS . ''); ?>" class="btn btn-xs"><i class="fa fa-edit"></i> Interaksi </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-uppercase text-center">Nama Pensiunan</th>
                <th class="text-uppercase text-center">usia Pensiunan</th>
                <th class="text-uppercase text-center">Penerima</th>
                <th class="text-uppercase text-center">usia Penerima</th>
                <th class="text-uppercase text-center">Alamat</th>
                <th class="text-uppercase text-center">action's</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    window.onload = function () {
        $('.table').DataTable({
            responsive: true,
            fixedHeader: true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            dom: 'lfrtip'
        });
    };
</script>