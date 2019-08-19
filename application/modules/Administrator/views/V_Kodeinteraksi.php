<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
    <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">
                    KD GROUP
                </th>
                <th class="text-center text-uppercase">
                    kd kunjungan
                </th>
                <th class="text-center text-uppercase">
                    keterangan
                </th>
                <th class="text-center text-uppercase no-print">
                    actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kodeint as $kodeint) { ?>
                <tr>
                    <td>
                        <?= $kodeint->kode_group ?>
                    </td>
                    <td>
                        <?= $kodeint->kode_kunjungan ?>
                    </td>
                    <td>
                        <?= $kodeint->keterangan ?>
                    </td>
                    <td class="text-center no-print">
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-xs btn-default btn-warning" onclick="editbtn('<?= $kodeint->kode_kunjungan ?>')"><i class="glyphicon glyphicon-edit"></i></button>
                        <a href="#" class="btn btn-xs btn-default btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center text-uppercase" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <label class="text-uppercase">Keterangan</label>
                <input type="text" id="niktxt" class="form-control" name="ket">
                <input type="text" class="hide" name="kd">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpan()">Save changes</button>
            </div>
        </div>
    </div>
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
                        messageBottom: '<i>* The information in this table is copyright to PT Marsit Bangun Sejahtera</i>',
                        text: '<i class="fa fa-print"></i> Print',
                        title: 'Master data kode interaksi',
                        pageSize: 'A4',
                        customize: function (win) {
                            $(win.document.body).append('<div style="clear:both;margin:10% 0px"></div><div class="row"><div class="col-md-4"></div><div class="col-md-4"></div><div class="col-md-4"><div style="clear:both;margin:10px 0px"><p class="text-center"> Jakarta, <?= date("d F Y"); ?></p></div></div></div><div class="row"><div class="col-md-4"><div class="text-center"><p class="text-uppercase"> disetujui oleh</p><div style="margin:100px 0px"></div><p class="text-uppercase"> ( MARULI TUA H. SITOHANG, SE. MM )</p></div></div><div class="col-md-4"><div class="text-center"><p class="text-uppercase"> diperiksa oleh</p><div style="margin:100px 0px"></div><p class="text-uppercase"> ( M. BRIAN A )</p></div></div><div class="col-md-4"><div class="text-center"><p class="text-uppercase"> dibuat oleh</p><div style="margin:100px 0px;margin-right:50%;"></div><p class="text-uppercase"> ( <?= $this->session->userdata('nama'); ?> )</p></div></div></div>');
                            $(win.document.body).find('h1').css('text-align', 'center');
                            $(win.document.body).find('h1').css('font-size', '12pt');
                            $(win.document.body).find('th').addClass('display').css('text-align', 'center');
                            $(win.document.body).css('font-size', '12pt');
                            $(win.document.body).css('background-color', 'white');
                        },
                        exportOptions: {
                            columns: ':not(.no-print)'
                        },
                        footer: true,
                        autoPrint: true
                    },
                    {
                        extend: 'pdf',
                        messageBottom: '<i>* The information in this table is copyright to PT Marsit Bangun Sejahtera</i>',
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        title: 'Master data kode interaksi',
                        exportOptions: {
                            columns: ':not(.no-print)'
                        },
                        footer: true
                    },
                    {
                        extend: 'copy',
                        messageBottom: '<i>* The information in this table is copyright to PT Marsit Bangun Sejahtera</i>',
                        text: '<i class="fa fa-files-o"></i> Copy',
                        title: 'Master data kode interaksi',
                        exportOptions: {
                            columns: ':not(.no-print)'
                        },
                        footer: true
                    },
                    {
                        extend: 'excel',
                        messageBottom: '<i>* The information in this table is copyright to PT Marsit Bangun Sejahtera</i>',
                        text: '<i class="fa fa-file-excel-o"></i> Excel  ',
                        title: 'Master data kode interaksi',
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
    function editbtn(obj) {
        $('input[name=kd]').val(obj);
    }
    function simpan() {
        var a, b;
        a = $('input[name=ket]').val();
        b = $('input[name=kd]').val();
        $.ajax({
            url: "<?= base_url('Administrator/Kodeinteraksi/Edit'); ?>",
            type: 'POST',
            data: {keterangan: a, kode_kunjungan: b},
            success: function (data) {
                alert(data.msg);
                location.reload();
            },
            error: function (data) {
                alert(data.msg);
            }
        });
    }
</script>