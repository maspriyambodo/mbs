<div class="text-center">
    <h4 class="text-uppercase"><?= date("25/m/Y", strtotime("-1 month")) . " - " . date("d/m/Y"); ?></h4>
</div>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th class="text-uppercase text-center">
                SALES
            </th>
            <th class="text-uppercase text-center">
                BRANCH
            </th>
            <th class="text-uppercase text-center">
                CWD
            </th>
            <th class="text-uppercase text-center">
                RI
            </th>
            <th class="text-uppercase text-center">
                HI
            </th>
            <th class="text-uppercase text-center">
                HP
            </th>
            <th class="text-uppercase text-center">
                CLN
            </th>
            <th class="text-uppercase text-center">
                <small>EFISIENSI</small>
            </th>
            <th class="text-uppercase text-center">
                <small>EFEKTIFITAS</small>
            </th>
            <th class="text-uppercase text-center">
                <small>PRODUKTIFITAS</small>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reportmonthly as $reportmonthly) { ?>
            <tr>
                <td class="text-uppercase" id="uname">
                    <?php
                    $nama = $reportmonthly->uname;
                    $arr = explode(' ', trim($nama));
                    echo $arr[0]; // will print Test
                    ?>
                </td>
                <td>
                    <?= $reportmonthly->lokasi_kerja ?>
                </td>

                <td>
                    <?php
                    if ($reportmonthly->ri < 15) {
                        echo '0';
                    } else {
                        $cwd = $reportmonthly->ri / 15;
                        echo floor($cwd);
                    }
                    ?>
                </td>
                <td class="text-center">
                    <?= $reportmonthly->ri ?>
                </td>
                <td class="text-center">
                    <?= $reportmonthly->hi ?>
                </td>
                <td class="text-center">
                    <?= $reportmonthly->hp ?>
                </td>
                <td class="text-center">
                    <?= $reportmonthly->plaf ?>
                </td>
                <td class="text-center">
                    <?php
                    if ($reportmonthly->hi == 0) {
                        echo '0 %';
                    } elseif ($reportmonthly->ri == 0) {
                        echo '0 %';
                    } elseif ($reportmonthly->hi / $reportmonthly->ri > 100) {
                        echo '100 %';
                    } else {
                        echo round($reportmonthly->hi / $reportmonthly->ri, 2) . " %";
                    }
                    ?>
                </td>
                <td class="text-center">
                    <?php
                    if ($reportmonthly->plaf == 0) {
                        echo '0%';
                    } else {
                        echo round($reportmonthly->plaf / $reportmonthly->hi, 2) . " %";
                    }
                    ?>
                </td>
                <td class="text-center">
                    <?php
                    if (date("l") == "sunday") {
                        $ri = date("d") * 15 - 10;
                    } else {
                        $ri = date("d") * 15;
                    }
                    ?>
                    <?= round($reportmonthly->plaf / $ri, 2) * 100 . " %" ?>
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
    function caribtn() {
    }
    window.onload = function () {
        $('.table').DataTable({
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
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