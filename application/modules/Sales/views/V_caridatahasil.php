<form method="post" action="<?= base_url('Sales/Caridata/Simpan'); ?>">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered table-hover" style="width:100%;">
            <thead>
                <tr role="row">
                    <th class="text-uppercase text-center"></th>
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
                        <td>
                            <input type="checkbox" name="notas[]" class="checkbox" value="<?= $value->notas ?>">
                        </td>
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
                    <th class="text-uppercase text-center">Nama Pensiunan</th>
                    <th class="text-uppercase text-center">usia Pensiunan</th>
                    <th class="text-uppercase text-center">Penerima</th>
                    <th class="text-uppercase text-center">usia Penerima</th>
                    <th class="text-uppercase text-center">Alamat</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <textarea class="form-control" name="hasil" id="hasil" readonly="readonly"></textarea>
    <div style="clear:both;margin:10px;"></div>
    <input type="submit" class="btn btn-default btn-success" value="Simpan">
</form>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    window.onload = function () {
        $('.table').DataTable({});
    };
</script>