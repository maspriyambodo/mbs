<div class="text-right">
    <button data-toggle="modal" data-target="#myModal" class="btn btn-primary" onclick="addbtn()"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
</div>
<div class="table-responsive">
    <table id="datatable-buttons" class="table table-striped table-bordered table-hover" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">
                    nama
                </th>
                <th class="text-center text-uppercase">
                    nik
                </th>
                <th class="text-center text-uppercase">
                    provinsi
                </th>
                <th class="text-center text-uppercase">
                    kabupaten
                </th>
                <th class="text-center text-uppercase">
                    kecamatan
                </th>
                <th class="text-center text-uppercase">
                    kelurahan
                </th>
                <th class="text-center text-uppercase no-print">
                    actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salesarea as $salesarea) { ?>
                <tr>
                    <td class="text-uppercase"><?= $salesarea->nama_karyawan; ?></td>
                    <td><?= $salesarea->nik ?></td>
                    <td><?= $salesarea->provinsi ?></td>
                    <td><?= $salesarea->kabupaten ?></td>
                    <td><?= $salesarea->kecamatan ?></td>
                    <td><?= $salesarea->kelurahan ?></td>
                    <td class="text-center text-uppercase no-print">
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-xs btn-warning" onclick="editbtn(<?= $salesarea->id ?>)"><i class="glyphicon glyphicon-edit"></i> edit</button>
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-uppercase">nama</label>
                            <input type="text" name="namatxt" id="namatxt" readonly="readonly" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-uppercase">nik</label>
                            <input type="text" name="niktxt" id="niktxt" readonly="readonly" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div style="clear:both;margin:20px 0px;"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-uppercase">provinsi</label>
                            <input type="search" list="provinsi" name="provtxt" class="form-control"/>
                            <datalist id="provinsi">
                                <?php foreach ($prov as $prov) { ?>
                                    <option value="<?= $prov->provinsi ?>"></option>
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">kota kabupaten</label>
                            <input type="search" list="kab" name="kabtxt" class="form-control"/>
                            <datalist id="kab">
                                <?php foreach ($kab as $kab) { ?>
                                    <option value="<?= $kab->kabupaten ?>"></option>
                                <?php } ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-uppercase">kecamatan</label>
                            <input type="search" list="kec" name="camattxt" class="form-control"/>
                            <datalist id="kec">
                                <?php foreach ($kec as $kec) { ?>
                                    <option value="<?= $kec->kecamatan ?>"></option>
                                <?php } ?>
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label class="text-uppercase">kelurahan</label>
                            <input type="search" list="kel" name="lurahtxt" class="form-control"/>
                            <datalist id="kel">
                                <?php foreach ($kel as $kel) { ?>
                                    <option value="<?= $kel->kelurahan ?>"></option>
                                <?php } ?>
                            </datalist>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="text-uppercase btn btn-default" data-dismiss="modal">batal</button>
                <button type="button" id="svbtn" class="text-uppercase btn btn-primary" onclick="simpan()">simpan</button>
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
        $('.table').DataTable({
            dom: 'Blfrtip',
            responsive: true,
            buttons: {
                buttons: [{
                        extend: 'print',
                        messageTop: '<h1>Laporan Sales Area </h1>',
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
                        messageTop: '<h1>Laporan Sales Area </h1>',
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
                        messageTop: '<h1>Laporan Sales Area </h1>',
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
                        messageTop: '<h1>Laporan Sales Area </h1>',
                        messageBottom: '<i>* The information in this table is copyright to PT Marsit Bangun Sejahtera</i>',
                        text: '<i class="fa fa-file-excel-o"></i> Excel  ',
                        title: $('h1').text(),
                        exportOptions: {
                            columns: ':not(.no-print)'
                        },
                        footer: true
                    }
                ]
            }
        });
    };
    function addbtn() {
        document.getElementById('niktxt').readOnly = false;
        document.getElementById("svbtn").innerText = "Simpan";
        $('input[name=namatxt]').val("");
        $('input[name=niktxt]').val("");
        $('input[name=provtxt]').val("");
        $('input[name=kabtxt]').val("");
        $('input[name=camattxt]').val("");
        $('input[name=lurahtxt]').val("");
        document.getElementById("myModalLabel").innerHTML = "tambah sales area";
    }

    function simpan() {
        var a, b, c, d, e, btn;
        btn = document.getElementById("svbtn").textContent;
        a = $('input[name=niktxt]').val();
        b = $('input[name=provtxt]').val();
        c = $('input[name=kabtxt]').val();
        d = $('input[name=camattxt]').val();
        e = $('input[name=lurahtxt]').val();
        if (btn === "Simpan") {
            $.ajax({
                url: "<?= base_url('Administrator/Salesarea/Simpan'); ?>",
                type: 'POST',
                data: {NIK: a, provinsi: b, kabupaten: c, kecamatan: d, kelurahan: e},
                success: function (data) {
                    if (data.status === "success") {
                        alert(data.msg);
                        location.reload();
                    } else if (data.status === "simpanerror") {
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                        location.reload();
                    }

                }
            });
        } else {
            $.ajax({
                url: "<?= base_url('Administrator/Salesarea/Update'); ?>",
                type: 'POST',
                data: {NIK: a, provinsi: b, kabupaten: c, kecamatan: d, kelurahan: e},
                success: function (data) {
                    if (data.status === "success") {
                        alert(data.msg);
                        location.reload();
                    } else {
                        alert(data.msg);
                        location.reload();
                    }

                }
            });
        }
    }

    function editbtn(obj) {
        document.getElementById("svbtn").innerText = "Perbarui";
        document.getElementById('namatxt').readOnly = true;
        document.getElementById('niktxt').readOnly = true;
        var id = obj;
        $.ajax({
            url: "<?= base_url('Administrator/Salesarea/GetSalesArea/'); ?>",
            type: 'POST',
            data: {id: id},
            success: function (data) {
                $('input[name=namatxt]').val(data.namakaryawan);
                $('input[name=niktxt]').val(data.niksalesarea);
                $('input[name=provtxt]').val(data.provsalesarea);
                $('input[name=kabtxt]').val(data.kabsalesarea);
                $('input[name=camattxt]').val(data.camatsalesarea);
                $('input[name=lurahtxt]').val(data.lurahsalesarea);
            },
            error: function (data) {
                alert('Error, Sistem gagal mendapatkan data!');
            }
        });
        document.getElementById("myModalLabel").innerHTML = "ubah sales area";
    }
</script>