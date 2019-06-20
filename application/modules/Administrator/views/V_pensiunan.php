<div class="form-group text-right">
    <a href="<?= base_url('Administrator/Pensiunan/index/'); ?>" class="btn btn-default btn-success text-uppercase">kembali</a>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">NOTAS</th>
                <th class="text-center text-uppercase">NAMAPENSIUNAN</th>
                <th class="text-center text-uppercase">PENPOK</th>
                <th class="text-center text-uppercase">ALAMAT</th>
                <th class="text-center text-uppercase">NMKANBYR</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($value as $value) { ?>
                <tr>
                    <td>
                        <?= $value->notas ?>
                    </td>
                    <td>
                        <?= $value->namapensiunan ?>
                    </td>
                    <td>
                        <?= $value->penpok ?>
                    </td>
                    <td>
                        <?= $value->alamat ?>
                    </td>
                    <td>
                        <?= $value->nmkanbyr ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    window.onload = function () {
        $('table').dataTable({
            dom: 'Blftipr',
            buttons: [
                'colvis', 'copy', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            "paging": true,
            "ordering": true,
            "info": true
        });
    };
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
</script>