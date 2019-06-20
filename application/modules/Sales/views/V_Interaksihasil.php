<ul class="nav nav-tabs">
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu1">JAN</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu2">FEB</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu3">MAR</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu4">APR</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu5">MEI</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu6">JUN</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu7">JUL</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu8">AGS</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu9">SEP</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu10">OKT</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu11">NOV</a>
    </li>
    <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#menu12">DES</a>
    </li>
</ul>
<div class="tab-content">
    <div style="clear:both;margin:15px 0px;"></div>
    <div class="tab-pane container fade " id="menu1">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($JAN as $JAN) { ?>
                        <tr>
                            <td>
                                <?= $JAN->syscreatedate ?></td>
                            <td>
                                <?= $JAN->pensiunan ?></td>
                            <td>
                                <?= $JAN->alamat . ", Kel. " . $JAN->kelurahan . ", Kec. " . $JAN->kecamatan . ", Prov. " . $JAN->provinsi ?></td>
                            <td>
                                <?= $JAN->telepon ?></td>
                            <td>
                                <?= $JAN->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu2">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($FEB as $FEB) { ?>
                        <tr>
                            <td>
                                <?= $FEB->syscreatedate ?></td>
                            <td>
                                <?= $FEB->pensiunan ?></td>
                            <td>
                                <?= $FEB->alamat . ", Kel. " . $FEB->kelurahan . ", Kec. " . $FEB->kecamatan . ", Prov. " . $FEB->provinsi ?></td>
                            <td>
                                <?= $FEB->telepon ?></td>
                            <td>
                                <?= $FEB->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu3">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($MAR as $MAR) { ?>
                        <tr>
                            <td>
                                <?= $MAR->syscreatedate ?></td>
                            <td>
                                <?= $MAR->pensiunan ?></td>
                            <td>
                                <?= $MAR->alamat . ", Kel. " . $MAR->kelurahan . ", Kec. " . $MAR->kecamatan . ", Prov. " . $MAR->provinsi ?></td>
                            <td>
                                <?= $MAR->telepon ?></td>
                            <td>
                                <?= $MAR->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu4">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($APR as $APR) { ?>
                        <tr>
                            <td>
                                <?= $APR->syscreatedate ?></td>
                            <td>
                                <?= $APR->pensiunan ?></td>
                            <td>
                                <?= $APR->alamat . ", Kel. " . $APR->kelurahan . ", Kec. " . $APR->kecamatan . ", Prov. " . $APR->provinsi ?></td>
                            <td>
                                <?= $APR->telepon ?></td>
                            <td>
                                <?= $APR->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu5">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($MEI as $MEI) { ?>
                        <tr>
                            <td>
                                <?= $MEI->syscreatedate ?></td>
                            <td>
                                <?= $MEI->pensiunan ?></td>
                            <td>
                                <?= $MEI->alamat . ", Kel. " . $MEI->kelurahan . ", Kec. " . $MEI->kecamatan . ", Prov. " . $MEI->provinsi ?></td>
                            <td>
                                <?= $MEI->telepon ?></td>
                            <td>
                                <?= $MEI->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu6">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($JUN as $JUN) { ?>
                        <tr>
                            <td>
                                <?= $JUN->syscreatedate ?></td>
                            <td>
                                <?= $JUN->pensiunan ?></td>
                            <td>
                                <?= $JUN->alamat . ", Kel. " . $JUN->kelurahan . ", Kec. " . $JUN->kecamatan . ", Prov. " . $JUN->provinsi ?></td>
                            <td>
                                <?= $JUN->telepon ?></td>
                            <td>
                                <?= $JUN->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu7">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($JUL as $JUL) { ?>
                        <tr>
                            <td>
                                <?= $JUL->syscreatedate ?></td>
                            <td>
                                <?= $JUL->pensiunan ?></td>
                            <td>
                                <?= $JUL->alamat . ", Kel. " . $JUL->kelurahan . ", Kec. " . $JUL->kecamatan . ", Prov. " . $JUL->provinsi ?></td>
                            <td>
                                <?= $JUL->telepon ?></td>
                            <td>
                                <?= $JUL->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu8">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($AGS as $AGS) { ?>
                        <tr>
                            <td>
                                <?= $AGS->syscreatedate ?></td>
                            <td>
                                <?= $AGS->pensiunan ?></td>
                            <td>
                                <?= $AGS->alamat . ", Kel. " . $AGS->kelurahan . ", Kec. " . $AGS->kecamatan . ", Prov. " . $AGS->provinsi ?></td>
                            <td>
                                <?= $AGS->telepon ?></td>
                            <td>
                                <?= $AGS->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu9">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($SEP as $SEP) { ?>
                        <tr>
                            <td>
                                <?= $SEP->syscreatedate ?></td>
                            <td>
                                <?= $SEP->pensiunan ?></td>
                            <td>
                                <?= $SEP->alamat . ", Kel. " . $SEP->kelurahan . ", Kec. " . $SEP->kecamatan . ", Prov. " . $SEP->provinsi ?></td>
                            <td>
                                <?= $SEP->telepon ?></td>
                            <td>
                                <?= $SEP->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu10">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($OKT as $OKT) { ?>
                        <tr>
                            <td>
                                <?= $OKT->syscreatedate ?></td>
                            <td>
                                <?= $OKT->pensiunan ?></td>
                            <td>
                                <?= $OKT->alamat . ", Kel. " . $OKT->kelurahan . ", Kec. " . $OKT->kecamatan . ", Prov. " . $OKT->provinsi ?></td>
                            <td>
                                <?= $OKT->telepon ?></td>
                            <td>
                                <?= $OKT->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu11">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($NOV as $NOV) { ?>
                        <tr>
                            <td>
                                <?= $NOV->syscreatedate ?></td>
                            <td>
                                <?= $NOV->pensiunan ?></td>
                            <td>
                                <?= $NOV->alamat . ", Kel. " . $NOV->kelurahan . ", Kec. " . $NOV->kecamatan . ", Prov. " . $NOV->provinsi ?></td>
                            <td>
                                <?= $NOV->telepon ?></td>
                            <td>
                                <?= $NOV->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane container fade " id="menu12">
        <div class="x_content table-responsive">
            <table class="table table-striped table-bordered table-hover" style="width:100%;">
                <thead>
                    <tr role="row">
                        <th class="text-uppercase text-center">tgl interaksi</th>
                        <th class="text-uppercase text-center">nama pensiunan</th>
                        <th class="text-uppercase text-center">alamat</th>
                        <th class="text-uppercase text-center">telepon</th>
                        <th class="text-uppercase text-center">hasil interaksi</th>
                        <th class="text-uppercase text-center">actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($DES as $DES) { ?>
                        <tr>
                            <td>
                                <?= $DES->syscreatedate ?></td>
                            <td>
                                <?= $DES->pensiunan ?></td>
                            <td>
                                <?= $DES->alamat . ", Kel. " . $DES->kelurahan . ", Kec. " . $DES->kecamatan . ", Prov. " . $DES->provinsi ?></td>
                            <td>
                                <?= $DES->telepon ?></td>
                            <td>
                                <?= $DES->keterangan ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Sales/DetailInteraksi/index'); ?>" class="btn btn-xs btn-default"> <i class="glyphicon glyphicon-eye-open"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        $('table').dataTable({dom: 'lBfrtip', responsive: true, "paging": true, "ordering": true, "info": true});
    };
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
</script>