<form method="post" action="#">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase">nopen</label>
                <input type="search" class="form-control" list="nopen" name="noptxt">
                <datalist id="nopen">
                    <?php
                    foreach ($pens as $pens) {
                        echo '<option value="' . $pens->nopen . '">' . $pens->nopen . ' ' . $pens->pensiunan . '</option>';
                    }
                    ?>
                </datalist>
            </div>
            <div class="form-group">
                <label class="text-uppercase">tanggal pencairan</label>
                <div class="input-group date">
                    <input name="tglcairtxt" type="text" data-provide="datepicker" class="form-control"  required="" readonly="readonly" data-date-format="yyyy-mm-dd"/>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="text-uppercase">nominal pencairan</label>
                <input type="text" name="plaftxt" class="form-control" required="" placeholder="Nominal Plafond" data-inputmask="'alias': 'decimal', 'groupSeparator': '.', 'autoGroup': true, 'digits':0, 'digitsOptional': false, 'placeholder': '0'"/>
            </div>
        </div>
    </div>
    <div class="form-group btn-group" role="group">
        <button type="button" data-toggle="modal" data-target="#simpan" class="btn btn-success text-uppercase">simpan</button>
        <button type="button" data-toggle="modal" data-target="#batal" class="btn btn-danger text-uppercase">batal</button>
    </div>
    <div class="modal animated flipInX" id="simpan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase text-success"><i class="glyphicon glyphicon-info-sign"></i> simpan data</h5>
                </div>
                <div class="modal-body">
                    <p class="text-center text-uppercase">simpan data ini ?</p>
                </div>
                <div class="modal-footer">
                    <input type="button" onclick="simpan()" name="btnsub" class="btn btn-success" value="YA"/>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">TIDAK</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal animated rubberBand" id="batal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase text-danger"><i class="glyphicon glyphicon-warning-sign text-danger"></i> Batalkan menyimpan</h5>
                </div>
                <div class="modal-body">
                    <p class="text-center text-uppercase">anda yakin ingin membatalkan ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                    <button type="button" onclick="batal()" class="btn btn-danger">Iya</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    window.onload = function () {
        $("input[name=plaftxt]").number(true, 0);
    };
    function simpan() {
        var b, c, d;
        b = $("input[name='noptxt']").val();
        c = $("input[name='tglcairtxt']").val();
        d = $("input[name='plaftxt']").val();
//        d = d.split(',').join('');
        if (b, c, d === "") {
            alert('mohon lengkapi data form');
        } else {
            $.ajax({
                url: "<?= base_url('Sales/Pencairan/Simpan/'); ?>",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {notas: b, tgl_pencairan: c, nom_plafond: d},
                statusCode: {
                    200: function (data) {
                        alert(data.msg);
                        window.location.href = '<?= base_url('Sales/Pencairan/Hasil'); ?>';
                    },
                    202: function (data) {
                        alert(data.msg);
                    },
                    400: function () {
                        alert('Error while saving data !');
                    },
                    500: function () {
                        alert('Fatal error !');
                        location.reload();
                    }
                }
            });
        }
    }

    function batal() {
        window.location = "<?= base_url('Sales/Dashboard/index'); ?>";
    }
</script>