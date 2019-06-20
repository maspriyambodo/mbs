<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead>
            <tr>
                <th class="text-uppercase text-center">
                    NAMA
                </th>
                <th class="text-uppercase text-center">
                    NIK
                </th>
                <th class="text-uppercase text-center">
                    TLP
                </th>
                <th class="text-uppercase text-center">
                    LAHIR
                </th>
                <th class="text-uppercase text-center">
                    ALAMAT
                </th>
                <th class="text-uppercase text-center">
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sales as $sales) { ?>
                <tr>
                    <td>
                        <a href="<?= base_url('administrator/sales/details/' . $sales->nik . ''); ?>"><?= $sales->nama_karyawan ?></a>
                    </td>
                    <td>
                        <?= $sales->nik ?>
                    </td>
                    <td>
                        <?= $sales->telepon1 . " <br> " . $sales->telepon2 ?>
                    </td>
                    <td>
                        <?= $sales->tgl_lahir ?>
                    </td>
                    <td>
                        <?= $sales->alamat . "kel. " . $sales->kelurahan . "kec. " . $sales->kecamatan . "kota/kab " . $sales->kota ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= base_url('administrator/sales/ubah/' . $sales->nik . ''); ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"  onclick="hapusbtn('<?= $sales->nama_karyawan ?>', '<?= $sales->nik ?>')">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus data</h4>
            </div>
            <div class="modal-body">
                <p>anda yakin ingin menghapus data sales <b id="nmsales">a</b></p>
                <input type="text" readonly="" class="form-control hide" name="niktxt">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" onclick="hapusproses()">Ya</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    function hapusproses() {
        var a = $('input[name=niktxt]').val();
        $.ajax({
            url: "<?= base_url('Administrator/Sales/Hapus/'); ?>",
            type: 'POST',
            async: false,
            data: {nik: a},
            dataType: 'JSON',
            success: function (data) {
                alert(data.msg);
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + ' ' + errorThrown);
                location.reload();
            }
        });
    }
    function hapusbtn(nama_karyawan, nik) {
        document.getElementById("nmsales").innerHTML = nama_karyawan + ' ?';
        $('input[name=niktxt]').val(nik);

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
                    title: "DATA SALES",
                    pageSize: 'A4',
                    customize: function (win) {
                        $(win.document.body).append('<div style="clear:both;margin:10% 0px"></div><div class="row"><div class="col-md-4"></div><div class="col-md-4"></div><div class="col-md-4"><div style="clear:both;margin:10px 0px"><p class="text-center"> Jakarta, <?= date("d F Y"); ?></p></div></div></div><div class="row"><div class="col-md-4"><div class="text-center"><p class="text-uppercase"> disetujui oleh</p><div style="margin:100px 0px"></div><p class="text-uppercase"> ( MARULI TUA H. SITOHANG, SE. MM )</p></div></div><div class="col-md-4"><div class="text-center"><p class="text-uppercase"> diperiksa oleh</p><div style="margin:100px 0px"></div><p class="text-uppercase"> ( M. BRIAN A )</p></div></div><div class="col-md-4"><div class="text-center"><p class="text-uppercase"> dibuat oleh</p><div style="margin:100px 0px;margin-right:50%;"></div><p class="text-uppercase"> ( <?= $this->session->userdata('nama'); ?> )</p></div></div></div>');
                        $(win.document.body).find('h1').css('text-align', 'center');
                        $(win.document.body).find('h1').css('font-size', '12pt');
                        $(win.document.body).find('th').addClass('display').css('text-align', 'center');
                        $(win.document.body).css('font-size', '12pt');
                        $(win.document.body).css('background-color', 'white');
                    }
                }
            ],
            responsive: true
        });
    };
    function nonaktif() {

    }
</script>