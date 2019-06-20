<script type="text/javascript">
    $(window).load(function () {
        $('#onload').modal('show');
    });

    $(document).ready(function () {
        $("input").inputmask();

        Dropzone.autoDiscover = false;
        var foto_upload = new Dropzone(".dropzone", {
            url: "<?= base_url('Sales/Interaksi/Uploadpoto/'); ?>" + $("input[name=intnopentxt]").val(),
            maxFilesize: 9,
            method: "post",
            acceptedFiles: "image/*",
            paramName: "userfile",
            dictInvalidFileType: "Type file ini tidak dizinkan"
        });

        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(0, 0, 0)'
        });
        $("#signature-pad").mouseup(function () {
            var ttd = signaturePad.toDataURL('image/png');
            $("input[name=ttd]").val(ttd);
        });
        $("#signature-pad").on('touchend', function () {
            var ttd = signaturePad.toDataURL('image/png');
            $("input[name=ttd]").val(ttd);
        });

        var cancelButton = document.getElementById('clear');
        cancelButton.addEventListener('click', function (event) {
            signaturePad.clear();
            $("input[name=ttd]").val('');
        });

        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        $('.datepicker').datepicker({
            startDate: '-3d'
        });
    });
</script>