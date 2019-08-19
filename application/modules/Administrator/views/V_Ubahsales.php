<div class="text-right">
    <a href="<?= base_url('Administrator/Sales/index'); ?>" class="btn btn-success text-uppercase">kembali</a>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">n i k</label>
            <input type="text" name="nik" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">nama karyawan</label>
            <input type="text" name="nama" class="form-control" autocomplete="off">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">jenis kelamin</label>
            <select class="form-control text-uppercase" name="jkel" required="">
                <option value="">jenis kelamin</option>
            </select>
        </div>
        <div class="form-group">
            <label class="text-uppercase"></label>
        </div>
    </div>
</div>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
</script>