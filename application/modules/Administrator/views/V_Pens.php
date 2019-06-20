<div class="table-responsive">
    <table class="table table-bordered table-striped" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">provinsi</th>
                <th class="text-center text-uppercase">kabupaten</th>
                <th class="text-center text-uppercase">jumlah</th>
                <th class="text-center text-uppercase">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($value as $value) { ?>
                <tr>
                    <td>
                        <?= $value->provinsi ?>
                    </td>
                    <td>
                        <?= $value->kota_kab ?>
                    </td>
                    <td class="text-uppercase text-center">
                        <?= number_format($value->tot) ?>
                    </td>
                    <td class="text-uppercase text-center">
                        <a href="<?php
                        if ($value->kota_kab == '') {
                            $value->kota_kab = ' ';
                        }
                        $data = ['provinsi' => str_replace(' ', '+', $value->provinsi), 'kota_kab' => str_replace(' ', '+', $value->kota_kab)];
                        echo base_url('Administrator/Pensiunan/Getdata/' . $data['provinsi'] . '/' . $data['kota_kab'] . '');
                        ?>"><i class="glyphicon glyphicon-eye-open btn btn-xs btn-default"></i></a>
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
</script>