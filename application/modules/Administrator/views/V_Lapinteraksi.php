<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" style="width:100%;">
        <thead>
            <tr>
                <th class="text-uppercase text-center">
                    tgl laporan
                </th>
                <th class="text-uppercase text-center">
                    sales
                </th>
                <th class="text-uppercase text-center">
                    nopen
                </th>
                <th class="text-uppercase text-center">
                    pensiunan
                </th>
                <th class="text-uppercase text-center">
                    action
                </th>
            </tr>
        </thead>
    </table>
</div>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    window.onload = function () {
        var table = $('.table').DataTable({
            dom: 'Blfrtip',
            responsive: true,
            fixedHeader: true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            info: true,
            "order": [[0, "desc"]],
            "ajax": {
                url: "<?= base_url('Administrator/Lap_interaksi/Getreport'); ?>",
                dataSrc: '',
                type: 'POST',
                async: false
            },
            columns: [
                {data: "syscreatedate"},
                {data: "nama_karyawan"},
                {data: "nopen"},
                {data: "pensiunan"},
                {"targets": -1, data: null,
                    className: "center",
                    defaultContent: '<center><button class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></button></center>'}
            ]
        });
        $('.table tbody').on('click', 'button', function () {
            var data = table.row($(this).parents('tr')).data();
            window.open('<?= base_url('Administrator/Lap_interaksi/Getdetail/'); ?>' + data["nopen"], '_blank');
        });
    };
</script>