<div class="table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%;">
        <thead>
            <tr>
                <th class="text-uppercase text-center">
                    tgl
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
                    plafond
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasilpencairan as $hasilpencairan) { ?>
                <tr>
                    <td>
                        <?= date("d-m-Y", strtotime($hasilpencairan->sysupdatedate)) ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->pensiunan ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->tgl_lahir_pensiunan ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->penerima ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->tgl_lahir_penerima ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->alamat . " KEL. " . $hasilpencairan->kelurahan . " KEC. " . $hasilpencairan->kecamatan ?>
                    </td>
                    <td>
                        <?= $hasilpencairan->telepon ?>
                    </td>
                    <td id="nom_plafond">
                        <?= "Rp. " . $hasilpencairan->nom_tb ?>
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