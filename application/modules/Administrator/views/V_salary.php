<div class="text-center">
    <h4 class="text-uppercase"><?= date("25/m/Y", strtotime("-1 month")) . " - " . date("d/m/Y"); ?></h4>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead>
            <tr>
                <th class="text-uppercase text-center">
                    SALES
                </th>
                <th class="text-uppercase text-center">
                    BRANCH
                </th>
                <th class="text-uppercase text-center">
                    GAJI
                </th>
                <th class="text-uppercase text-center">
                    INSENTIF
                </th>
                <th class="text-uppercase text-center">
                    THP
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reportmonthly as $reportmonthly) { ?>
                <tr>
                    <td class="text-uppercase">
                        <?= $reportmonthly->uname ?>
                    </td>
                    <td>
                        <?= $reportmonthly->lokasi_kerja ?>
                    </td>
                    <td id="gp" class="gp text-center">
                        <?php
                        $gp = $reportmonthly->hi / 100;
                        echo $reportmonthly->penpok * round($gp, 2);
                        ?>
                    </td>
                    <td id="ins" class="ins text-center">
                        <?php
                        if ($reportmonthly->plaf <= $reportmonthly->limit1) {
                            echo $reportmonthly->plaf * $reportmonthly->persen1;
                        } elseif ($reportmonthly->plaf <= $reportmonthly->limit2) {
                            echo $reportmonthly->plaf * $reportmonthly->persen2;
                        } elseif ($reportmonthly->plaf >= $reportmonthly->limit3) {
                            echo $reportmonthly->plaf * $reportmonthly->persen3;
                        }
                        ?>
                    </td>
                    <td id="thp" class="thp text-center">
                        <?php
                        $gp = $reportmonthly->hi / 100;
                        $penpok = $reportmonthly->penpok * round($gp, 2);
                        if ($reportmonthly->plaf <= $reportmonthly->limit1) {
                            $insentif = $reportmonthly->plaf * $reportmonthly->persen1;
                        } elseif ($reportmonthly->plaf <= $reportmonthly->limit2) {
                            $insentif = $reportmonthly->plaf * $reportmonthly->persen2;
                        } elseif ($reportmonthly->plaf >= $reportmonthly->limit3) {
                            $insentif = $reportmonthly->plaf * $reportmonthly->persen3;
                        }
                        echo $penpok + $insentif;
                        ?>
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
        $(".gp").number(true, 0);
        $(".ins").number(true, 0);
        $(".thp").number(true, 0);
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