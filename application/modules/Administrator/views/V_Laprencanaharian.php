<div class="text-center">
    <h4 class="text-uppercase"><?= date("25/m/Y", strtotime("-1 month")) . " - " . date("d/m/Y"); ?></h4>
</div>
<table class="table table-bordered table-hover table-striped" style="width:100%;">
    <thead>
        <tr>
            <th class="text-center text-uppercase">
                NAMA
            </th>
            <th class="text-center text-uppercase">
                JAM
            </th>
            <th class="text-center text-uppercase">
                JML RENCANA 
            </th>
            <th class="text-center text-uppercase">
                KETERANGAN
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tot as $tot) { ?>
            <tr>
                <td>
                    <?= $tot->nama_karyawan ?>
                </td>
                <td class="text-center text-uppercase">
                    <?= $tot->jam ?>
                </td>
                <td class="text-center text-uppercase">
                    <?= $tot->rencana ?>
                </td>
                <td class="text-center text-uppercase">

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    window.onload = function () {
        $('.table').DataTable({
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "scrollY": "300px",
            "scrollCollapse": true,
            responsive: true,
            dom: 'lBfrtip',
            buttons: [
                {
                    extend: 'copyHtml5', footer: true
                },
                {
                    extend: 'excelHtml5', footer: true
                },
                {
                    extend: 'csvHtml5', footer: true
                },
                {
                    extend: 'pdfHtml5', footer: true
                },
                {
                    extend: 'print',
                    title: "REPORT MARKETING <?= "25/" . date("m/Y", strtotime("- 1 month")) . " - " . date("d/m/Y") ?>",
                    pageSize: 'A4',
                    orientation: 'landscape',
                    customize: function (win) {
                        $(win.document.body).find('h1').css('text-align', 'center');
                        $(win.document.body).find('h1').css('font-size', '12pt');
                        $(win.document.body).find('th').addClass('display').css('text-align', 'center');
                        $(win.document.body).css('font-size', '10pt');
                        $(win.document.body).css('background-color', 'white');
                        $(win.document.body).css('margin', '1px');
                    }
                }
            ]
        });
    };
</script>