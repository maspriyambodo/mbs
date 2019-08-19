<div class="table-responsive">
    <table class="table table-bordered table-striped" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">provinsi</th>
                <th class="text-center text-uppercase">kabupaten</th>
                <th class="text-center text-uppercase">jumlah</th>
                <th class="text-center text-uppercase no-print">action</th>
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
                    <td class="text-uppercase text-center no-print">
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
            buttons: {
                buttons: [
                    {
                        extend: 'colvis'
                    },
                    {
                        extend: 'print',
                        messageTop: '<h1>Master data pensiun </h1>',
                        messageBottom: '<i>* The information in this table is copyright to PT Marsit Bangun Sejahtera</i>',
                        text: '<i class="fa fa-print"></i> Print',
                        title: $('h1').text(),
                        exportOptions: {
                            columns: ':not(.no-print)'
                        },
                        footer: true,
                        autoPrint: true
                    },
                    {
                        extend: 'pdf',
                        messageTop: '<h1>Master data pensiun </h1>',
                        messageBottom: '<i>* The information in this table is copyright to PT Marsit Bangun Sejahtera</i>',
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        title: $('h1').text(),
                        exportOptions: {
                            columns: ':not(.no-print)'
                        },
                        footer: true
                    },
                    {
                        extend: 'copy',
                        messageTop: '<h1>Master data pensiun </h1>',
                        messageBottom: '<i>* The information in this table is copyright to PT Marsit Bangun Sejahtera</i>',
                        text: '<i class="fa fa-files-o"></i> Copy',
                        title: $('h1').text(),
                        exportOptions: {
                            columns: ':not(.no-print)'
                        },
                        footer: true
                    },
                    {
                        extend: 'excel',
                        messageTop: '<h1>Master data pensiun </h1>',
                        messageBottom: '<i>* The information in this table is copyright to PT Marsit Bangun Sejahtera</i>',
                        text: '<i class="fa fa-file-excel-o"></i> Excel  ',
                        title: $('h1').text(),
                        exportOptions: {
                            columns: ':not(.no-print)'
                        },
                        footer: true
                    }
                ]
            },
            responsive: true,
            "paging": true,
            "ordering": true,
            "info": true
        });
    };
</script>