<?php foreach ($sales as $value) { ?>
    <table class="table table-responsive table-bordered">
        <tbody>
            <tr>
                <th style="width:185px;">
                    <img src="<?= base_url('assets/images/logo/pt.marsit.jpg'); ?>" style="padding-top:12%;width:100%;height:50%;">
                </th>
                <td>
                    <h2 class="text-uppercase text-center">
                        <b>pt marsit bangun sejahtera</b>
                        <br>
                        <b>sales & marketing agency</b>
                        <br>
                        <small>jl. galaxi raya no 5b, rt 01 rw 11 kelurahan jaka setia, kecamatan bekasi selatan jawa barat 17141 telp: 021-82738377 hp. 087786130256 email: pusat@marsitbangunsejahtera.com</small>
                    </h2>
                </td>
                <td style="width:185px;">
                    <img src="<?= base_url('assets/images/' . $value->nama_karyawan . $value->nik . '.png'); ?>" style="width:50%;height:50%;padding-top:4%;">
                </td>
            </tr>
        </tbody>
    </table>
    <div class="clearfix" style="margin:10px 0px;"></div>
    <div class="row">

        <div class="col-md-3">
            <img src="<?= base_url($pict); ?>" class="img img-thumbnail img-rounded">
            <div class="form-group">
                <h2 class="text-center text-uppercase"><?= $value->nama_karyawan ?></h2>
            </div>
        </div>
        <div class="col-md-9">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="text-uppercase" style="width:30%;">
                                n i k
                            </th>
                            <td class="text-uppercase" style="width:100%;">
                                : <?= $value->nik ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                jenis kelamin
                            </th>
                            <td class="text-uppercase">
                                : <?php
                                if ($value->jenis_kelamin == "l") {
                                    echo 'laki-laki';
                                } else {
                                    echo 'perempuan';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                tempat tanggal lahir
                            </th>
                            <td class="text-uppercase">
                                : <?= $value->tgl_lahir ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                alamat
                            </th>
                            <td class="text-uppercase">
                                : <?= $value->alamat ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                telepon
                            </th>
                            <td class="text-uppercase">
                                : <?= $value->telepon1 ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                email's
                            </th>
                            <td class="text-info">
                                : <?= $value->email ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                status
                            </th>
                            <td class="text-uppercase">
                                : <?= $value->status_perkawinan ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                status karyawan
                            </th>
                            <td class="text-uppercase">
                                : <?= $value->status_karyawan ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                t m t
                            </th>
                            <td class="text-uppercase">
                                : <?= $value->tanggal_masuk ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                branch
                            </th>
                            <td class="text-uppercase">
                                : <?= $value->lokasi_kerja ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-uppercase">
                                penpok
                            </th>
                            <td>
                                : rp. <?= $value->penpok ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
<?php } ?>
<div class="text-right">
    <a href="<?= base_url('Administrator/Sales/index'); ?>" class="btn btn-primary text-uppercase">back</a>
    <a href="<?= base_url('Administrator/Sales/Prints/' . $sales[0]->nik . ''); ?>" class="btn btn-default text-uppercase"><i class="glyphicon glyphicon-print"></i>print</a>
</div>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
</script>