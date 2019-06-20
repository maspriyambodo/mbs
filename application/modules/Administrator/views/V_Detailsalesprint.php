<html>
    <head>
        <title class="text-uppercase">
            Print data sales
        </title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/datatables.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php foreach ($sales as $value) { ?>
            <table class="table table-bordered" style="width:100%;">
                <tbody>
                    <tr>
                        <th style="width:100px;">
                            <img src="assets/images/logo/pt.marsit.jpg" style="width:25%;height:10%;">
                        </th>
                        <td class="text-center">
                            <p class="text-uppercase">pt marsit bangun sejahtera<br>
                                sales & marketing agency</p>
                            <br>
                            <small style="color:gray;">jl. galaxi raya no 5b, rt 01 rw 11 kelurahan jaka setia, kecamatan bekasi selatan jawa barat 17141 telp: 021-82738377 hp. 087786130256<br>email: pusat@marsitbangunsejahtera.com</small>
                        </td>
                        <td>
                            <img src="assets/images/<?= $value->nama_karyawan . $value->nik . '.png' ?>" style="width:10%;height:10%;padding:0px;margin:0px;">
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr style="height:2px;border:none;color:#333;background-color:#333;margin:-10px 0px 0px 0px;" />
            <div class="clearfix" style="margin:10px 0px;"></div>
            <img src="<?= $pict; ?>" class="img img-thumbnail" style="width:15%;height:15%;" alt="<?= $value->nama_karyawan ?>">
            <h3 class="text-uppercase"><?= $value->nama_karyawan ?></h3>
            <div class="clearfix" style="margin:10px 0px;"></div>
            <div class="table-responsive">
                <table class="table" style="width:100%;">
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
                                if ($value->jenis_kelamin == 1) {
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
                                : rp. <b class="gp"><?= $value->penpok ?></b>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
        <script>
            window.onload = function () {
                $('table').dataTable({
                    responsive: true,
                    "info": true
                });
            };
        </script>            
        <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/datatables.min.js" type="text/javascript"></script>
        <script src="assets/js/pdfmake.min.js" type="text/javascript"></script>
        <script src="assets/js/vfs_fonts.js" type="text/javascript"></script>
    </body>
</html>
