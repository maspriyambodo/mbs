<div class="table-responsive">
    <table class="table table-bordered table-striped" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">kelurahan</th>
                <th class="text-center text-uppercase">kecamatan</th>
                <th class="text-center text-uppercase">kabupaten</th>
                <th class="text-center text-uppercase">provinsi</th>
                <th class="text-center text-uppercase">kodepos</th>
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
        $('table').dataTable({
            dom: 'Blftipr',
            buttons: [
                'colvis', 'copy', 'excel', 'pdf', 'print'
            ],
            responsive: true,
            "order": [[3, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "ajax": {
                method: "GET",
                async: false,
                url: "<?= base_url('Administrator/Kodepos/Getkdpos'); ?>",
                dataSrc: ''
            },
            columns: [
                {data: "kelurahan"},
                {data: "kecamatan"},
                {data: "kabupaten"},
                {data: "provinsi"},
                {data: "kodepos"}
            ]
        });
    };
</script>