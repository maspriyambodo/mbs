<form method="post">
    <?php foreach ($interaksi as $interaksi) { ?>
        <div class="row">
            <div class="col-md-6">
                <!--========================================================================================================-->

                <!--========================================================================================================-->
                <div class="form-group">
                    <label class="text-uppercase">nopen<small class="text-danger"> *</small></label>
                    <input type="text" name="nopen" class="form-control" value="<?= $interaksi->notas; ?>" readonly="" required="" autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">nama pensiunan<small class="text-danger"> *</small></label>
                    <input type="text" name="pensiunan" class="form-control" value="<?= $interaksi->namapensiunan; ?>" required="" autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">nama penerima<small class="text-danger"> *</small></label>
                    <input type="text" name="penerima" class="form-control" value="<?= $interaksi->nama_penerima; ?>" required="" autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">alamat<small class="text-danger"> *</small></label>
                    <textarea class="form-control" minlength="15" name="alamatxt" required=""><?= $interaksi->alm_peserta; ?></textarea>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">provinsi<small class="text-danger"> *</small></label>
                    <select class="form-control text-uppercase" name="provtxt" onchange="Kabshow()">
                        <option value="0">PILIH PROVINSI</option>
                        <?php
                        foreach ($provinsi as $provinsi) {
                            echo '<option class="text-uppercase" value="' . $provinsi->provinsi . '">' . $provinsi->provinsi . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group" style="display:none;" id="kabupaten">
                    <label class="text-uppercase">kabupaten<small class="text-danger"> *</small></label>
                    <select name="kotkabtxt" id="kotkabtxt" class="form-control" onchange="Kecshow()">
                    </select>
                </div>
                <div class="form-group" style="display:none;" id="kecamatan">
                    <label class="text-uppercase">kecamatan<small class="text-danger"> *</small></label>
                    <select name="kectxt" id="kectxt" class="form-control" onchange="Kelshow()">

                    </select>
                </div>
                <div class="form-group" style="display:none;" id="kelurahan">
                    <label class="text-uppercase">kelurahan<small class="text-danger"> *</small></label>
                    <select name="keltxt" id="keltxt" class="form-control" onchange="Kdposshow()">

                    </select>
                </div>
                <div class="form-group" style="display:none;" id="kodepos">
                    <label class="text-uppercase">kode pos<small class="text-danger"> *</small></label>
                    <input type="text" name="kdpostxt" class="form-control" required="" readonly="true">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-uppercase" for="sel1">sales feedback<small class="text-danger"> *</small></label>
                    <select class="form-control" name="kodetxt" required="" onchange="getval(this);">
                        <option value="">pilih keterangan</option>
                        <?php
                        foreach ($get_option as $get_option) {
                            echo '<option value="' . $get_option->kode_kunjungan . '">' . $get_option->kode_kunjungan . ' ' . $get_option->keterangan . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">keterangan / catatan<small class="text-danger"> *</small></label>
                    <textarea name="kettxt" minlength="25" class="form-control" rows="3" placeholder="keterangan interaksi kunjungan" required=""></textarea>
                </div>
                <div style="clear:both;margin:25px 0px;"></div>
                <div class="form-group">
                    <label class="text-uppercase">alamat valid<small class="text-danger"> * </small></label>
                    <select class="form-control" name="validaddtxt">
                        <option value="">pilih</option>
                        <option value="y" onclick="validya()">ya, alamat valid</option>
                        <option value="n" onclick="tidakvalid()">tidak, alamat tidak valid</option>
                    </select>
                    <div style="clear:both;margin:20px 0px;"></div>
                    <div class="form-group" style="display:none;" id="newadd">
                        <label class="text-uppercase">masukkan alamat terbaru</label>
                        <textarea name="newaddtxt" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">bertemu pensiunan<small class="text-danger"> * </small></label>
                    <select class="form-control" name="meetpens">
                        <option value="">pilih</option>
                        <option value="y">ya, bertemu dengan pensiunan</option>
                        <option value="n">tidak, tidak bertemu dengan pensiunan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">manfaat pensiunan<small class="text-danger"> * </small></label>
                    <select name="manfaat" class="form-control">
                        <option value="">pilih</option>
                        <option value="y">ya, pensiun masih terima gaji</option>
                        <option value="n">tidak, pensiun sudah tidak terima gaji</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">hot prospek<small class="text-danger"> * </small></label>
                    <select name="interest" class="form-control">
                        <option value="">pilih</option>
                        <option value="1" onclick="hotprospek()">ya, pensiun berniat meminjam</option>
                        <option value="2" onclick="nothp()">tidak, pensiun belum butuh pinjaman</option>
                    </select>
                </div>
                <div style="clear:both;margin:25px 0"></div>
                <div class="form-group nominal" style="display:none;">
                    <label class="text-uppercase">nominal</label>
                    <div class="input-group">
                        <input type="text" name="hp_nominal" class="form-control" placeholder="nominal hot prospek" autocomplete="off" data-inputmask="'alias': 'decimal', 'groupseparator': '.', 'autogroup': true, 'digits':0, 'digitsoptional': false, 'placeholder': '0'" style="text-align:right"/>
                        <span class="input-group-btn">
                            <a href="<?= base_url('sales/simulasi/index/' . $interaksi->notas . ''); ?>" target="_blank" class="btn btn-default">simulasi kredit</a>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">telepon<small class="text-danger"> *</small></label>
                    <input type="tel" name="telpemtxt" class="form-control" placeholder="p c a t" value="<?= $interaksi->telepon; ?>" required="" autocomplete="off" minlength="10" onkeypress="return isNumber(event)" />
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <h4 class="text-uppercase">tanda tangan pensiunan</h4>
                        <canvas id="signature-pad" class="signature-pad panel panel-default"></canvas>
                    </div>
                    <input type="text" name="ttd" class="form-control hide" readonly="" required=""/>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-default" id="clear">hapus tanda tangan</button>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="dropzone form-group">
        <div class="dz-message">
            <h3><i class="glyphicon glyphicon-cloud-upload infinite animated slideOutUp"></i></h3>
            <h3 class="text-uppercase text-info">Upload foto selfie</h3>
        </div>
    </div>
    <div class="btn-group" role="group">
        <button type="button" onclick="simpanbtn()" class="simpan btn btn-success">
            Simpan
        </button>
        <a href="<?= base_url('Sales/Dashboard/index'); ?>" class="btn btn-danger">Batal</a>
    </div>
</form>
<div class="modal bounceIn animated" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="text-center">
                    <h4 class="modal-title text-uppercase" id="myModalLabel"><i class="glyphicon glyphicon-info-sign text-info"></i> simpan data interaksi</h4>
                </div>
            </div>
            <div class="modal-body">
                Anda yakin ingin simpan data ini?
                <br>
                data yang tersimpan tidak dapat diubah
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="button" onclick="cancelbtn()" class="btn btn-default" style="background-color:orange;" data-dismiss="modal"><i class="glyphicon glyphicon-floppy-remove"></i> Cancel</button>
                    <button type="button" onclick="simpan()" class="btn btn-default simpaninteraksi" style="background-color:orange;"><i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
                </div>
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
    function Kabshow() {
        $('#kotkabtxt').children('option').remove();
        $('#kectxt').children('option').remove();
        $('#keltxt').children('option').remove();
        $('input[name=kdpostxt]').val("");
        var a, b;
        a = $('select[name=provtxt]').val();
        b = a.replace(' ', '+');
        $.ajax({
            async: false,
            dataType: 'JSON',
            type: 'GET',
            url: "<?= base_url('Sales/Interaksi/Getkabupaten/'); ?>" + b,
            statusCode: {
                200: function (data) {
                    $('#kabupaten').show('slow');
                    var i;
                    for (i = 0; i < data.length; i++) {
                        //document.getElementById('kabupaten').append(data[i].kabupaten);
                        var sel = document.getElementById("kotkabtxt");
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
        c = $('select[name=kotkabtxt]').val();
        b = a.replace(' ', '+');
        d = c.replace(' ', '+');
        $.ajax({
            async: false,
            dataType: 'JSON',
            type: 'GET',
            url: "<?= base_url('Sales/Interaksi/Getkecamatan/'); ?>" + b + "/" + d,
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
        c = $('select[name=kotkabtxt]').val();
        e = $('select[name=kectxt]').val();
        b = a.replace(' ', '+');
        d = c.replace(' ', '+');
        f = e.replace(' ', '+');
        $.ajax({
            async: false,
            dataType: 'JSON',
            type: 'GET',
            url: "<?= base_url('Sales/Interaksi/Getkelurahan/'); ?>" + b + "/" + d + "/" + f,
            statusCode: {
                200: function (data) {
                    $('#kelurahan').show('slow');
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
        c = $('select[name=kotkabtxt]').val();
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
            url: "<?= base_url('Sales/Interaksi/Getkodepos/'); ?>" + b + "/" + d + "/" + f + "/" + h,
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
    function simpan() {
        $('.simpaninteraksi').addClass("hide");
        var a, b, c, e, i, l, d, o, m, p, s, f, u, r, N, v, x, g, T, w, q;
        a = $("input[name=nopen]").val();
        b = $("input[name=pensiunan]").val();
        e = $("input[name=penerima]").val();
        l = $("textarea[name=alamatxt]").val();
        d = $("textarea[name=newaddtxt]").val();
        o = $("select[name=keltxt]").val();
        m = $("select[name=kectxt]").val();
        p = $("select[name=kotkabtxt]").val();
        s = $("select[name=provtxt]").val();
        f = $("input[name=kdpostxt]").val();
        u = $("input[name=telpemtxt]").val();
        r = $("select[name=kodetxt]").val();
        N = $("textarea[name=kettxt]").val();
        v = $("select[name=validaddtxt]").val();
        x = $("select[name=meetpens]").val();
        g = $("select[name=manfaat]").val();
        T = $("select[name=interest]").val();
        w = $("input[name=hp_nominal]").val();
        q = $("input[name=ttd]").val();
        if (a === "" || b === "" || u === "" || l === "" || r === "" || N === "" || v === "" || x === "" || g === "" || T === "") {
            alert("mohon lengkapi form interaksi");
            $("#myModal").hide("slow");
            $('.simpan').removeClass("hide");
            $('.simpaninteraksi').removeClass("hide");
        } else if (u.length <= 9 || u.length > 13) {
            alert("mohon masukkan telepon valid");
            $("#myModal").hide("slow");
            $('.simpan').removeClass("hide");
            $('.simpaninteraksi').removeClass("hide");
        } else if (N.length <= 25) {
            alert("mohon masukkan keterangan lebih jelas");
            $("#myModal").hide("slow");
            $('.simpan').removeClass("hide");
            $('.simpaninteraksi').removeClass("hide");
        } else {
            $.ajax({
                url: "<?= base_url('Sales/Interaksi/Simpan'); ?>",
                dataType: "JSON",
                type: "POST",
                async: false,
                data: {
                    notas: a,
                    namapensiunan: b,
                    tgl_lahir_pensiunan: c,
                    namapenerima: e,
                    tgl_lahir_penerima: i,
                    alamat: l,
                    newadd: d,
                    kelurahan: o,
                    kecamatan: m,
                    kota_kab: p,
                    provinsi: s,
                    kodepos: f,
                    telepon: u,
                    kode_interaksikunj: r,
                    keterangan: N,
                    alamat_valid: v,
                    bertemu_pens: x,
                    manfaatpens_btpn: g,
                    hp_status: T,
                    hp_nominal: w,
                    ttd: q
                },
                statusCode: {
                    200: function () {
                        alert("data berhasil disimpan !"), $("#myModal").hide("slow"), window.location.href = "<?= base_url('Sales/Daftarkunjungan/index'); ?>";
                    },
                    500: function () {
                        alert('Error while saving data !'), $("#myModal").hide("slow");
                        $('.simpan').removeClass("hide");
                        $('.simpaninteraksi').removeClass("hide");
                        location.reload();
                    }
                }
            });
        }
    }
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    function cancelbtn() {
        $("#myModal").hide("slow");
        $('.simpan').removeClass("hide");
        $('.simpaninteraksi').removeClass("hide");
    }
    function simpanbtn() {
        $("#myModal").show();
        $('.simpan').addClass("hide");
    }
    function validya() {
        if ($("#newadd").is(":visible")) {
            $("#newadd").slideUp("slow");
        }
    }
    function tidakvalid() {
        if ($("#newadd").is(":hidden")) {
            $("#newadd").slideDown("slow");
        }
    }
    function getval(a) {
        a.value;
    }
    function hotprospek() {
        if ($(".nominal").is(":hidden")) {
            $(".nominal").slideDown("slow");
        }
//        $(".nominal").is(":hidden") ? $(".nominal").slideDown("slow") : $(".nominal").slideUp("slow");
    }
    function nothp() {
        if ($(".nominal").is(":visible")) {
            $(".nominal").slideUp("slow");
        } else {

        }
    }
</script>