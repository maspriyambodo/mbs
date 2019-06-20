<div class="text-right">
    <a href="<?= base_url('Sales/Caridata/index'); ?>" class="btn btn-danger text-uppercase">back</a>
</div>
<form method="post" action="#">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
            <thead>
                <tr role="row">
                    <th class="text-uppercase text-center"></th>
                    <th class="hidden"></th>
                    <th class="text-uppercase text-center">Nama Pensiunan</th>
                    <th class="text-uppercase text-center">usia Pensiunan</th>
                    <th class="text-uppercase text-center">Penerima</th>
                    <th class="text-uppercase text-center">usia Penerima</th>
                    <th class="text-uppercase text-center">Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($value as $value) { ?>
                    <tr>
                        <td></td>
                        <td hidden="true"><?= $value->notas ?></td>
                        <td>
                            <?= $value->namapensiunan; ?>
                        </td>
                        <td class="text-center">
                            <?php
                            $tgl = $value->tgl_lahir_pensiunan;
                            $diff = (date('Y') - date('Y', strtotime($tgl)));
                            echo $diff;
                            ?>
                        </td>
                        <td><?= $value->nama_penerima; ?></td>
                        <td class="text-center"><?php
                            $tgl = $value->tgl_lahir_penerima;
                            $diff = (date('Y') - date('Y', strtotime($tgl)));
                            echo $diff;
                            ?></td>
                        <td><?= $value->alm_peserta . ', kel. ' . $value->kelurahan . ', kec. ' . $value->kecamatan . ', kab. ' . $value->kota_kab . ", prov. " . $value->provinsi; ?></td>
        <!--                    <td class="text-center">
                            <input type="button" value="simpan" name="svbtn" class="btn btn-success text-uppercase btn-xs" onclick="simpan('<?= $value->notas ?>')"/>
                        </td>-->
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-uppercase text-center"></th>
                    <th class="hidden"></th>
                    <th class="text-uppercase text-center">Nama Pensiunan</th>
                    <th class="text-uppercase text-center">usia Pensiunan</th>
                    <th class="text-uppercase text-center">Penerima</th>
                    <th class="text-uppercase text-center">usia Penerima</th>
                    <th class="text-uppercase text-center">Alamat</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <textarea class="form-control hidden" name="hasil" id="hasil" readonly="readonly"></textarea>
    <div style="clear:both;margin:10px;"></div>
    <button class="btn btn-success" onclick="simpanbtn()" type="button">Simpan</button>
</form>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    window.onload = function () {
        var table = $('.table').DataTable({
            dom: 'lfrtip',
            responsive: true,
            fixedHeader: true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            info: true,
            language: {
                select: {
                    rows: {
                        _: "%d data dipilih"
                    }
                }
            },
            select: {
                style: 'multi'
            },
            columnDefs: [{
                    orderable: false,
                    'targets': 0,
                    className: 'select-checkbox'
                }]
        });
        table
                .on('select', function () {
                    $('textarea[name=hasil]').val("");
                    var rowData = table.rows('.selected').data();
                    var tmpData, hasiltxt;
                    $.each(rowData, function (i) {
                        tmpData = rowData[i];
                        hasiltxt = $('textarea[name=hasil]').val();
                        $('textarea[name=hasil]').val(hasiltxt + tmpData[1] + ' ');
                    });
                })
                .on('deselect', function () {
                    $('textarea[name=hasil]').val("");
                    var rowData = table.rows('.selected').data();
                    var tmpData, hasiltxt;
                    $.each(rowData, function (i) {
                        tmpData = rowData[i];
                        hasiltxt = $('textarea[name=hasil]').val();
                        $('textarea[name=hasil]').val(hasiltxt + tmpData[1] + ' ');
                    });
                });
    };
    function simpanbtn() {
        var a = $('textarea[name=hasil]').val();
        $.ajax({
            url: "<?= base_url('Sales/Caridata/Simpan'); ?>",
            dataType: 'JSON',
            type: 'POST',
            data: {
                hasil: a
            },
            success: function (data) {
                alert(data.msg);
                location.reload();
            },
            error: function (data) {
                alert(data.msg);
                location.reload();
            }
        });
    }
    function Simpan(obj) {

        $.ajax({
            url: "<?= base_url('Sales/Caridata/Simpan'); ?>",
            dataType: 'JSON',
            type: 'POST',
            data: {
                NOTAS: obj
            },
            success: function (data) {
                if (data.status == 'success') {
                    alert(data.msg);
                    window.location.reload();
                } else {
                    alert(data.msg);
                    window.location.reload();
                }
            }
        });
    }
</script>