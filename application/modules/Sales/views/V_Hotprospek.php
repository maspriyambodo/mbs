<div class="table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%;">
        <thead>
            <tr>
                <th class="text-uppercase text-center">
                    nopen
                </th>
                <th class="text-uppercase text-center">
                    pensiunan
                </th>
                <th class="text-uppercase text-center">
                    lahir pensiunan
                </th>
                <th class="text-uppercase text-center">
                    penerima
                </th>
                <th class="text-uppercase text-center">
                    lahir penerima
                </th>
                <th class="text-uppercase text-center">
                    alamat
                </th>
                <th class="text-uppercase text-center">
                    telepon
                </th>
                <th class="text-uppercase text-center">
                    hot prospek
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pens as $pens) { ?>
                <tr>
                    <td>
                        <?= $pens->nopen ?>
                    </td>
                    <td>
                        <?= $pens->pensiunan ?>
                    </td>
                    <td>
                        <?= $pens->tgl_lahir_pensiunan ?>
                    </td>
                    <td>
                        <?= $pens->penerima ?>
                    </td>
                    <td>
                        <?= $pens->tgl_lahir_penerima ?>
                    </td>
                    <td>
                        <?= $pens->alamat . " KEL. " . $pens->kelurahan . " KEC. " . $pens->kecamatan ?>
                    </td>
                    <td>
                        <?= $pens->telepon ?>
                    </td>
                    <td>
                        <?= "Rp. " . $pens->hp_nominal ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    window.onload = function () {
        $('.table').DataTable({
            responsive: true,
            fixedHeader: true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            dom: 'lfrtip',
            info: true
        });
    };
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
</script>