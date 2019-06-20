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
                    <input type="text" class="text-uppercase form-control" name="provtxt" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-uppercase">kabupaten :</label>
                    <input type="text" class="text-uppercase form-control" name="kabtxt" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-uppercase">kecamatan :</label>
                    <input type="text" class="text-uppercase form-control" name="kectxt" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="text-uppercase">kelurahan :</label>
                    <input type="text" class="text-uppercase form-control" name="keltxt" required="" autocomplete="off">
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
    function tambahbtn() {
        var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p;
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
        l = $('input[name=provtxt]').val();
        m = $('input[name=kabtxt]').val();
        n = $('input[name=kectxt]').val();
        o = $('input[name=keltxt]').val();
        p = $('textarea[name=almttxt]').val();
        if (a == "" || b == "" || c == "" || d == "" || e == "" || f == "" || g == "" || h == "" || i == "" || j == "" || k == "" || l == "" || m == "" || p == "") {
            alert('mohon lengkapi data karyawan');
        } else {
            $.ajax({
                url: "<?= base_url('Administrator/Sales/Simpan'); ?>",
                type: 'POST',
                data: {namatxt: a, niktxt: b, jktxt: c, ttltxt: d, tlptxt: e, mailtxt: f, stattxt: g, kartxt: h, tmttxt: i, loktxt: j, penpoktxt: k, provtxt: l, kabtxt: m, kectxt: n, keltxt: o, almttxt: p},
                success: function (data) {
                    alert(data.status + " " + data.msg);
                }, error: function (data) {
                    alert(data.status + " " + data.msg);
                }
            });
        }
    }
</script>