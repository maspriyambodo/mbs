<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-uppercase">Tambah data sales</h2>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="text-uppercase">nama :</label>
                    <input type="text" name="namatxt" class="form-control text-uppercase" required="" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="text-uppercase">tanggal lahir :</label>
                    <div class="input-group date" id="myDatepicker2">
                        <input type="text" class="form-control" name="ttltxt" readonly="readonly" autocomplete="off">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">status :</label>
                    <select class="form-control text-uppercase" name="stattxt">
                        <option value="">
                            pilih kawin
                        </option>
                        <option value="1">
                            lajang
                        </option>
                        <option value="2">
                            menikah
                        </option>
                        <option value="3">
                            duda / janda
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">lokasi kerja :</label>
                    <input type="text" name="loktxt" class="form-control text-uppercase" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="text-uppercase">n i k :</label>
                    <input type="text" name="niktxt" class="form-control text-uppercase" required="" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="text-uppercase">telepon :</label>
                    <input type="text" name="tlptxt" class="form-control text-uppercase" required="" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="text-uppercase">status karyawan :</label>
                    <select class="form-control text-uppercase" name="kartxt">
                        <option value="">
                            pilih status karyawan
                        </option>
                        <option value="1">
                            tetap
                        </option>
                        <option value="2">
                            kontrak
                        </option>
                        <option value="3">
                            freelance
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">gaji pokok:</label>
                    <input type="text" name="penpoktxt" class="form-control text-uppercase" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="text-uppercase">jenis kelamin :</label>
                    <select class="form-control text-uppercase" name="jktxt">
                        <option value="">
                            pilih jenis kelamin
                        </option>
                        <option value="1">
                            laki-laki
                        </option>
                        <option value="2">
                            perempuan
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">email :</label>
                    <input type="email" name="mailtxt" class="form-control text-uppercase" required="" autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="text-uppercase">tanggal masuk :</label>
                    <div class="input-group date" id="myDatepicker3">
                        <input type="text" class="form-control" name="tmttxt" readonly="readonly" autocomplete="off">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">Alamat lengkap:</label>
                    <textarea class="form-control" name="almttxt" required=""></textarea>
                </div>
            </div>
        </div>
        <div style="border:1px solid black;margin:12px 0px;"></div>
        <h2 class="text-uppercase">sales area</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-uppercase">provinsi :</label>
                    <select class="form-control text-uppercase" name="provtxt" required="" onchange="provinsi()" autocomplete="off">
                        <option value="" class="text-uppercase">pilih provinsi</option>
                        <?php foreach ($prov as $prov) { ?>
                            <option value="<?= $prov->provinsi ?>" class="text-uppercase"><?= $prov->provinsi ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-uppercase">kabupaten :</label>
                    <select name="kabtxt" id="kabtxt" class="form-control" onchange="Kecshow()">
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-uppercase">kecamatan :</label>
                    <select name="kectxt" id="kectxt" class="form-control" onchange="Kelshow()">
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-uppercase">kelurahan :</label>
                    <select name="keltxt" id="keltxt" class="form-control" onchange="Kdposshow()">
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">kode pos :</label>
                    <input type="text" name="kdpostxt" class="form-control" readonly="" required="">
                </div>
            </div>
        </div>
        <div style="border:1px solid black;margin:12px 0px;"></div>
        <div class="form-group text-right">
            <button class="btn btn-success text-uppercase" type="button" onclick="tambahbtn()"><i class="glyphicon glyphicon-floppy-saved"></i> simpan</button>
            <a href="<?= base_url('Administrator/Sales/index'); ?>" class="btn btn-danger text-uppercase"><i class="glyphicon glyphicon-level-up"></i> kembali</a>
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
        $('#myDatepicker2').datetimepicker({
            format: 'YYYY-MM-DD',
            ignoreReadonly: true,
            allowInputToggle: true
        });
        $('#myDatepicker3').datetimepicker({
            format: 'YYYY-MM-DD',
            ignoreReadonly: true,
            allowInputToggle: true
        });
    };
    function provinsi() {
        $('#kabtxt').children('option').remove();
        $('#kectxt').children('option').remove();
        $('#keltxt').children('option').remove();
        $('input[name=kdpostxt]').val("");
        var a, b;
        a = $('select[name=provtxt]').val();
        b = a.replace(' ', '+');
        $.ajax({
            url: "<?= base_url('Administrator/Sales/Kabupaten/'); ?>" + b,
            async: false,
            dataType: 'JSON',
            type: 'GET',
            statusCode: {
                200: function (data) {
                    var i;
                    for (i = 0; i < data.length; i++) {
                        var sel = document.getElementById("kabtxt");
                        var opt = document.createElement("option");
                        opt.value = data[i].kabupaten;
                        opt.text = data[i].kabupaten;
                        sel.add(opt, sel.options[i]);
                    }
                },
                500: function () {
                    alert('Error while load data !');
                    location.reload();
                }
            }
        });
    }
    function Kecshow() {
        $('#kectxt').children('option').remove();
        $('#keltxt').children('option').remove();
        $('input[name=kdpostxt]').val("");
        var a, b, c, d;
        a = $('select[name=provtxt]').val();
        c = $('select[name=kabtxt]').val();
        b = a.replace(' ', '+');
        d = c.replace(' ', '+');
        $.ajax({
            async: false,
            dataType: 'JSON',
            type: 'GET',
            url: "<?= base_url('Administrator/Sales/Getkecamatan/'); ?>" + b + "/" + d,
            statusCode: {
                200: function (data) {
                    $('#kecamatan').show('slow');
                    var i;
                    for (i = 0; i < data.length; i++) {
                        var sel = document.getElementById("kectxt");
                        var opt = document.createElement("option");
                        opt.value = data[i].kecamatan;
                        opt.text = data[i].kecamatan;
                        sel.add(opt, sel.options[i]);
                    }
                },
                500: function () {
                    alert('Error while load data !');
                    location.reload();
                }
            }
        });
    }
    function Kelshow() {
        $('#keltxt').children('option').remove();
        $('input[name=kdpostxt]').val("");
        var a, b, c, d, e, f;
        a = $('select[name=provtxt]').val();
        c = $('select[name=kabtxt]').val();
        e = $('select[name=kectxt]').val();
        b = a.replace(' ', '+');
        d = c.replace(' ', '+');
        f = e.replace(' ', '+');
        $.ajax({
            async: false,
            dataType: 'JSON',
            type: 'GET',
            url: "<?= base_url('Administrator/Sales/Getkelurahan/'); ?>" + b + "/" + d + "/" + f,
            statusCode: {
                200: function (data) {
                    var i;
                    for (i = 0; i < data.length; i++) {
                        var sel = document.getElementById("keltxt");
                        var opt = document.createElement("option");
                        opt.value = data[i].kelurahan;
                        opt.text = data[i].kelurahan;
                        sel.add(opt, sel.options[i]);
                    }
                },
                500: function () {
                    alert('Error while load data !');
                    location.reload();
                }
            }
        });
    }
    function Kdposshow() {
        var a, b, c, d, e, f, g, h;
        a = $('select[name=provtxt]').val();
        c = $('select[name=kabtxt]').val();
        e = $('select[name=kectxt]').val();
        g = $('select[name=keltxt]').val();
        b = a.replace(' ', '+');
        d = c.replace(' ', '+');
        f = e.replace(' ', '+');
        h = g.replace(' ', '+');
        $.ajax({
            async: false,
            dataType: 'JSON',
            type: 'GET',
            url: "<?= base_url('Administrator/Sales/Getkodepos/'); ?>" + b + "/" + d + "/" + f + "/" + h,
            statusCode: {
                200: function (data) {
                    $('#kodepos').show('slow');
                    $('input[name=kdpostxt]').val(data[0].kodepos);
                },
                500: function () {
                    alert('Error while load data !');
                    location.reload();
                }
            }
        });
    }
    function tambahbtn() {
        var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q;
        a = $('input[name=namatxt]').val();
        b = $('input[name=niktxt]').val();
        c = $('select[name=jktxt]').val();
        d = $('input[name=ttltxt]').val();
        e = $('input[name=tlptxt]').val();
        f = $('input[name=mailtxt]').val();
        g = $('select[name=stattxt]').val();
        h = $('select[name=kartxt]').val();
        i = $('input[name=tmttxt]').val();
        j = $('input[name=loktxt]').val();
        k = $('input[name=penpoktxt]').val();
        l = $('select[name=provtxt]').val();
        m = $('select[name=kabtxt]').val();
        n = $('select[name=kectxt]').val();
        o = $('select[name=keltxt]').val();
        p = $('textarea[name=almttxt]').val();
        q = $('input[name=kdpostxt]').val();
        if (a == "" || b == "" || c == "" || d == "" || e == "" || f == "" || g == "" || h == "" || i == "" || j == "" || k == "" || l == "" || m == "" || p == "") {
            alert('mohon lengkapi data karyawan');
        } else {
            $.ajax({
                url: "<?= base_url('Administrator/Sales/Simpan'); ?>",
                type: 'POST',
                data: {namatxt: a, niktxt: b, jktxt: c, ttltxt: d, tlptxt: e, mailtxt: f, stattxt: g, kartxt: h, tmttxt: i, loktxt: j, penpoktxt: k, provtxt: l, kabtxt: m, kectxt: n, keltxt: o, almttxt: p, kodepos: q},
                success: function (data) {
                    alert(data.status + " " + data.msg);
                }, error: function (data) {
                    alert(data.status + " " + data.msg);
                }
            });
        }
    }
</script>