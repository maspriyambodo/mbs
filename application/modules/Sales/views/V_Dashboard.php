<div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="glyphicon glyphicon-list-alt"></i> Rencana kunjungan</span>
        <div class="count">
            <?php
            if ($value[0]->totrencana == 0) {
                echo '0';
            } else {
                echo $value[0]->totrencana;
            }
            ?>
        </div>
        <span class="count_bottom"><i class="green"><?= 15 * date('d'); ?> </i> target rencana kunjungan</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Interaksi Kunjungan</span>
        <div class="count">
            <?php
            if ($value[0]->totinteraksi == 0) {
                echo '0';
            } else {
                echo $value[0]->totinteraksi;
            }
            ?>
        </div>
        <span class="count_bottom"><i class="green"><?= 7 * date('d'); ?> </i> target interaksi kunjungan</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Hot Prospek</span>
        <div class="count green">
            <?php
            if ($value[0]->tothp == 0) {
                echo '0';
            } else {
                echo $value[0]->tothp;
            }
            ?>
        </div>
        <span class="count_bottom"><i class="green"><?= 5 * date('d'); ?> </i> target hot prospek</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="glyphicon glyphicon-usd"></i> Nom Hot Prospek</span>
        <div class="count">
            <?php
            if ($value[0]->nomhp == 0) {
                echo '0';
            } else {
                echo $value[0]->nomhp . ' JT';
            }
            ?>
        </div>
        <span class="count_bottom"><i class="green"><?= 15 * date('d'); ?> jt </i> target hot prospek</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Pencairan</span>
        <div class="count">
            <?php
            if ($value[0]->totcair == 0) {
                echo '0';
            } else {
                echo $value[0]->totcair;
            }
            ?>
        </div>
        <span class="count_bottom"><i class="green"><?= 3 * date('d'); ?> </i> target pencairan</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="glyphicon glyphicon-usd"></i> Nom Pencairan</span>
        <div class="count">
            <?php
            if ($value[0]->nomcair == 0) {
                echo '0';
            } else {
                echo $value[0]->nomcair . ' JT';
            }
            ?>
        </div>
        <span class="count_bottom"><i class="green"><?= 15 * date('d'); ?> jt</i> target pencairan</span>
    </div>
</div>
<canvas id="mybarChart" class="chartjs-render-monitor" style="height:450px"></canvas>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    window.onload = function () {
        var ctx = document.getElementById("mybarChart");
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                        label: '# Nasabah <?= $uname . ' tahun ' . date("Y") ?>',
                        data: [<?= $chart[0]->jan . ', ' . $chart[0]->feb . ', ' . $chart[0]->mar . ', ' . $chart[0]->apr . ', ' . $chart[0]->mei . ', ' . $chart[0]->jun . ', ' . $chart[0]->jul . ', ' . $chart[0]->ags . ', ' . $chart[0]->sep . ', ' . $chart[0]->okt . ', ' . $chart[0]->nov . ', ' . $chart[0]->des ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
            },
            options: {
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                }
            }
        });
    };
</script>