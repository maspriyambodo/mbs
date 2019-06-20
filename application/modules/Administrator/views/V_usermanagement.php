<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead>
            <tr>
                <th class="text-uppercase text-center">
                    nama
                </th>
                <th class="text-uppercase text-center">
                    nik
                </th>
                <th class="text-uppercase text-center">
                    level
                </th>
                <th class="text-uppercase text-center">
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usrdata as $usrdata) { ?>
                <tr>
                    <td class="text-uppercase">
                        <?= $usrdata->nama_karyawan ?>
                    </td>
                    <td>
                        <?= $usrdata->nik ?>
                    </td>
                    <td>
                        <?php
                        if ($usrdata->hak_akses == 1) {
                            echo 'super administrator';
                        } elseif ($usrdata->hak_akses == 10) {
                            echo 'sales';
                        } elseif ($usrdata->hak_akses == 3) {
                            echo 'administrator';
                        } else {
                            echo 'non-active';
                        }
                        ?>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editmodal" onclick="editbtn('<?= $usrdata->nama_karyawan; ?>', '<?= $usrdata->nik ?>')"><i class="glyphicon glyphicon-pencil"></i></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit User Management</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="namatxt" class="form-control" readonly="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>N I K</label>
                            <input type="text" name="niktxt" class="form-control" readonly="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="lvtxt">
                                <option value="">Pilih Level Akses</option>
                                <option value="1">Super Administrator</option>
                                <option value="3">Administrator</option>
                                <option value="10">Sales</option>
                                <option value="0">Non-Active</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpanbtn()">Save changes</button>
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
    function simpanbtn() {
        var a, b, c;
        a = $('input[name=namatxt]').val();
        b = $('input[name=niktxt]').val();
        c = $('select[name=lvtxt]').val();
        if (c === "") {
            alert('Silahkan pilih level akses !');
        } else {
            $.ajax({
                url: "<?= base_url('Administrator/Usermanagement/U_Usermng'); ?>",
                dataType: "JSON",
                type: "POST",
                data: {
                    NAMA_KARYAWAN: a,
                    nik: b,
                    hak_akses: c
                },
                success: function (data) {
                    if (data.status === "TRUE") {
                        alert("data berhasil disimpan !"), $("#editmodal").hide("slow"), window.location.href = "<?= base_url('Administrator/Usermanagement/index'); ?>";
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }
    }
    function editbtn(namatxt, nik) {
        $('input[name=namatxt]').val(namatxt);
        $('input[name=niktxt]').val(nik);
    }
    window.onload = function () {
        $('.table').DataTable({
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            dom: 'lfrtip',
            responsive: true
        });
    };
</script>