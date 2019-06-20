<div class="text-right">
    <a href="<?= base_url('Administrator/Sales/index'); ?>" class="btn btn-success text-uppercase">kembali</a>
</div>
<div class="table-responsive">
    <table style="width:100%;">
        <tbody>
            <?php foreach ($detail as $detail) { ?>
                <tr>
                    <th class="text-uppercase"><label>nama</label></th>
                    <td class="text-uppercase">
                        : <?= $detail->nama_karyawan ?>

                    </td>
                    <th class="text-uppercase">status karyawan</th>
                    <td class="text-uppercase">
                        : <?= $detail->status_karyawan; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-uppercase"><label>n i k</label></th>
                    <td>
                        : <?= $detail->nik ?>
                    </td>
                    <th class="text-uppercase"><label>t m t</label></th>
                    <td>
                        : <?= $detail->tanggal_masuk ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-uppercase"><label>tgl lahir / umur</label></th>
                    <td>
                        : <?php
                        $tgl = $detail->tgl_lahir;
                        $diff = (date('y') - date('y', strtotime($tgl)));
                        echo $tgl;
                        echo " / " . $diff;
                        ?>
                    </td>
                    <th class="text-uppercase"><label>branch</label></th>
                    <td class="text-uppercase">
                        : <?= $detail->lokasi_kerja; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-uppercase"><label>jenis kelamin</label></th>
                    <td class="text-uppercase">
                        :
                        <?php
                        if ($detail->jenis_kelamin == "l") {
                            echo 'laki-laki';
                        } else {
                            echo 'perempuan';
                        }
                        ?>
                    </td>
                    <th class="text-uppercase"><label>penpok</label></th>
                    <td>
                        : rp. <?= $detail->penpok; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-uppercase"><label>status</label></th>
                    <td class="text-uppercase">
                        : <?= $detail->status_perkawinan; ?>
                    </td>
                    <th class="text-uppercase"><label>tanggungan</label></th>
                    <td class="text-uppercase">
                        : <?= $detail->jumlah_tanggungan; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-uppercase"><label>handphone</label></th>
                    <td>
                        : <?= $detail->telepon1 . ', ' . $detail->telepon1 ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-uppercase"><label>email</label></th>
                    <td class="text-info">
                        : <?= $detail->email; ?>
                    </td>
                </tr>
                <tr>
                    <th class="text-uppercase"><label>alamat</label></th>
                    <td>
                        : <?= $detail->alamat; ?><br>
                        <?= 'kel. ' . $detail->kelurahan . ', kec. ' . $detail->kecamatan . ', ' . $detail->kota . ', ' . $detail->kodepos; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
</script>