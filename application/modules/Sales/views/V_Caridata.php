<div class="table-responsive">
    <table class="table table-bordered table-striped" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">
                    provinsi
                </th>
                <th class="text-center text-uppercase">
                    kabupaten
                </th>
                <th class="text-center text-uppercase">
                    kecamatan
                </th>
                <th class="text-center text-uppercase">
                    kelurahan
                </th>
                <th class="text-center text-uppercase">
                    jumlah
                </th>
                <th class="text-center text-uppercase">
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($potensi as $potensi) { ?>
                <tr>
                    <td>
                        <?= $potensi->provinsi ?>
                    </td>
                    <td>
                        <?= $potensi->kota_kab ?>
                    </td>
                    <td>
                        <?= $potensi->kecamatan ?>
                    </td>
                    <td>
                        <?= $potensi->kelurahan ?>
                    </td>
                    <td class="text-center">
                        <?= $potensi->lurah ?>
                    </td>
                    <td class="text-center">
                        <a href="<?php
                        if ($potensi->provinsi == '') {
                            $potensi->provinsi = '+';
                        } elseif ($potensi->kota_kab == '') {
                            $potensi->kota_kab = '+';
                        } elseif ($potensi->kecamatan == '') {
                            $potensi->kecamatan = '+';
                        } elseif ($potensi->kelurahan == '') {
                            $potensi->kelurahan = '+';
                        }echo base_url('Sales/Caridata/Getdata/' . str_replace(" ", "+", $potensi->provinsi) . '/' . str_replace(" ", "+", $potensi->kota_kab) . '/' . str_replace(" ", "+", $potensi->kecamatan) . '/' . str_replace(" ", "+", $potensi->kelurahan) . '');
                        ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
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
            dom: 'lfrtip',
            info: true
        });
    };
</script>