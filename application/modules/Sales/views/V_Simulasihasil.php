<div class="table-responsive">
    <table id="datatable-buttons" class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">
                    tgl
                </th>
                <th class="text-center text-uppercase">
                    nopen
                </th>
                <th class="text-center text-uppercase">
                    pensiunan
                </th>
                <th class="text-center text-uppercase">
                    penerima
                </th>
                <th class="text-center text-uppercase">
                    alamat
                </th>
                <th class="text-center text-uppercase">
                    telepon
                </th>
                <th class="text-center text-uppercase">
                    image
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasilpencairan as $hasilpencairan) { ?>
                <tr>
                    <td>
                        <?= $hasilpencairan->syscreatedate ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->nopen ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->pensiunan ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->penerima ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->alamat . " KEL. " . $hasilpencairan->kelurahan . " KEC. " . $hasilpencairan->kecamatan ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->telepon ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= $hasilpencairan->pict ?>" target="_blank" class="btn btn-default text-uppercase">lihat</a>
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