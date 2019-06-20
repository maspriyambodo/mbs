<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="text-uppercase">gaji pokok pensiunan</label>
            <div class="input-group">
                <span class="input-group-addon">Rp</span>
                <input type="text" class="form-control" name="penpoktxt">
                <span class="input-group-addon">.00</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="text-uppercase">usia</label>
            <input type="text" class="form-control" name="usiatxt">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="text-uppercase">i i r</label>
            <input type="text" class="form-control" name="persen">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="text-uppercase">suku bunga</label>
            <div class="input-group">
                <input type="text" class="form-control" name="sbtxt">
                <span class="input-group-addon"> % </span>
            </div>
        </div>
    </div>
</div>
<div style="clear:both;margin:50px 0px;"></div>
<div class="text-center">
    <div class="form-group">
        <button class="btn btn-success text-uppercase" onclick="hitung()" name="hitungbtn" type="button">hitung</button>
    </div>
</div>
<div style="clear:both;margin:50px 0px;"></div>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead style="background-color:#f9a825;color:white">
            <tr>
                <th class="text-uppercase text-center">jangka waktu angsuran</th>
                <th class="text-center"> 12 </th>
                <th class="text-center"> 18 </th>
                <th class="text-center"> 24 </th>
                <th class="text-center"> 30 </th>
                <th class="text-center"> 36 </th>
            </tr>
        </thead>
        <tbody>
            <tr class="hide">
                <td class="text-uppercase" style="width:1px;white-space:nowrap"> plafond kredit </td>
                <td id="pfk12"> </td>
                <td id="pfk18"> </td>
                <td id="pfk24"> </td>
                <td id="pfk30"> </td>
                <td id="pfk36"> </td>
            </tr>
            <tr class="hide">
                <td class="text-uppercase"> penerimaan bersih hasil kredit </td>
                <td id="pfb12"> </td>
                <td id="pfb18"> </td>
                <td id="pfb24"> </td>
                <td id="pfb30"> </td>
                <td id="pfb36"> </td>
            </tr>
            <tr class="hide">
                <td class="text-uppercase"> pembulatan kebawah </td>
                <td id="pmk12"> </td>
                <td id="pmk18"> </td>
                <td id="pmk24"> </td>
                <td id="pmk30"> </td>
                <td id="pmk36"> </td>
            </tr>
            <tr>
                <td class="text-uppercase"> plafond kredit </td>
                <td id="pbh12"> </td>
                <td id="pbh18"> </td>
                <td id="pbh24"> </td>
                <td id="pbh30"> </td>
                <td id="pbh36"> </td>
            </tr>
            <tr class="hide">
                <td class="text-uppercase"> pokok angsuran per bulan </td>
                <td id="pka12"> </td>
                <td id="pka18"> </td>
                <td id="pka24"> </td>
                <td id="pka30"> </td>
                <td id="pka36"> </td>
            </tr>
            <tr class="hide">
                <td class="text-uppercase"> bunga angsuran per bulan </td>
                <td id="bap12"> </td>
                <td id="bap18"> </td>
                <td id="bap24"> </td>
                <td id="bap30"> </td>
                <td id="bap36"> </td>
            </tr>
            <tr>
                <td class="text-uppercase"> JUMLAH ANGSURAN PER BULAN </td>
                <td id="jma12"> </td>
                <td id="jma18"> </td>
                <td id="jma24"> </td>
                <td id="jma30"> </td>
                <td id="jma36"> </td>
            </tr>

            <tr>
                <td class="text-uppercase"> BIAYA ADMINISTRASI </td>
                <td id="badm12"> </td>
                <td id="badm18"> </td>
                <td id="badm24"> </td>
                <td id="badm30"> </td>
                <td id="badm36"> </td>
            </tr>
            <tr>
                <td class="text-uppercase"> BIAYA PROVISI </td>
                <td id="bpr12"> </td>
                <td id="bpr18"> </td>
                <td id="bpr24"> </td>
                <td id="bpr30"> </td>
                <td id="bpr36"> </td>
            </tr>
            <tr>
                <td class="text-uppercase"> BIAYA ASURANSI </td>
                <td id="bas12"> </td>
                <td id="bas18"> </td>
                <td id="bas24"> </td>
                <td id="bas30"> </td>
                <td id="bas36"> </td>
            </tr>
            <tr>
                <td class="text-uppercase"> SIMPANAN POKOK </td>
                <td id="simp12"> 50000 </td>
                <td id="simp18"> 50000 </td>
                <td id="simp24"> 50000 </td>
                <td id="simp30"> 50000 </td>
                <td id="simp36"> 50000 </td>
            </tr>
            <tr>
                <td class="text-uppercase"> SIMPANAN WAJIB </td>
                <td id="simw12"> 10000 </td>
                <td id="simw18"> 10000 </td>
                <td id="simw24"> 10000 </td>
                <td id="simw30"> 10000 </td>
                <td id="simw36"> 10000 </td>
            </tr>
            <tr>
                <td class="text-uppercase"> MATERAI </td>
                <td id="mat12"> 18000 </td>
                <td id="mat18"> 18000 </td>
                <td id="mat24"> 18000 </td>
                <td id="mat30"> 18000 </td>
                <td id="mat36"> 18000 </td>
            </tr>
            <tr class="hide">
                <td class="text-uppercase"> TOTAL BIAYA </td>
                <td id="totb12"> </td>
                <td id="totb18"> </td>
                <td id="totb24"> </td>
                <td id="totb30"> </td>
                <td id="totb36"> </td>
            </tr>
            <tr class="text-danger">
                <td class="text-uppercase"> TERIMA BERSIH (NETT) </td>
                <td id="nett12"></td>
                <td id="nett18"></td>
                <td id="nett24"></td>
                <td id="nett30"></td>
                <td id="nett36"></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    function simpanbtn() {
        $('.simpanbtn').addClass('hidden');
        html2canvas(document.querySelector("#capture")).then(function (canvas) {
            var a, b;
            b = $('input[name=notas]').val();
            a = canvas.toDataURL();
            $.ajax({
                url: "<?= base_url('Marketing/Simulasi/Simpan'); ?>",
                type: 'POST',
                dataType: 'json',
                data: {simulasi: a, notas: b},
                success: function () {
                    alert("data berhasil disimpan");
                    $('.simpanbtn').removeClass('hidden');
                    window.top.close();
                }, error: function () {
                    alert("data gagal disimpan");
                    $('.simpanbtn').removeClass('hidden');
                }
            });
        });
    }
    function hitung() {
        document.getElementById("pfk12").innerHTML = Math.round(document.getElementsByName("penpoktxt")[0].value * document.getElementsByName("persen")[0].value * 12);
        document.getElementById("pfk18").innerHTML = Math.round(document.getElementsByName("penpoktxt")[0].value * document.getElementsByName("persen")[0].value * 18);
        document.getElementById("pfk24").innerHTML = Math.round(document.getElementsByName("penpoktxt")[0].value * document.getElementsByName("persen")[0].value * 24);
        document.getElementById("pfk30").innerHTML = Math.round(document.getElementsByName("penpoktxt")[0].value * document.getElementsByName("persen")[0].value * 30);
        document.getElementById("pfk36").innerHTML = Math.round(document.getElementsByName("penpoktxt")[0].value * document.getElementsByName("persen")[0].value * 36);
        document.getElementById("pfb12").innerHTML = Math.round(document.getElementById("pfk12").innerHTML / ($("input[name='sbtxt']").val() * 12 + parseInt(1)));
        document.getElementById("pfb18").innerHTML = Math.round(document.getElementById("pfk18").innerHTML / ($("input[name='sbtxt']").val() * 18 + parseInt(1)));
        document.getElementById("pfb24").innerHTML = Math.round(document.getElementById("pfk24").innerHTML / ($("input[name='sbtxt']").val() * 24 + parseInt(1)));
        document.getElementById("pfb30").innerHTML = Math.round(document.getElementById("pfk30").innerHTML / ($("input[name='sbtxt']").val() * 30 + parseInt(1)));
        document.getElementById("pfb36").innerHTML = Math.round(document.getElementById("pfk36").innerHTML / ($("input[name='sbtxt']").val() * 36 + parseInt(1)));
        var k = document.getElementById("pfb12").innerHTML;
        var n = k.length;
        var i = document.getElementById("pfb18").innerHTML;
        var j = i.length;
        var e = document.getElementById("pfb24").innerHTML;
        var f = e.length;
        var c = document.getElementById("pfb30").innerHTML;
        var d = c.length;
        var o = document.getElementById("pfb36").innerHTML;
        var a = o.length;
        document.getElementById("pmk12").innerHTML = k.slice(3, n);
        document.getElementById("pmk18").innerHTML = i.slice(3, j);
        document.getElementById("pmk24").innerHTML = e.slice(3, f);
        document.getElementById("pmk30").innerHTML = c.slice(3, d);
        document.getElementById("pmk36").innerHTML = o.slice(3, a);
        document.getElementById("pbh12").innerHTML = document.getElementById("pfb12").innerHTML - document.getElementById("pmk12").innerHTML;
        document.getElementById("pbh18").innerHTML = document.getElementById("pfb18").innerHTML - document.getElementById("pmk18").innerHTML;
        document.getElementById("pbh24").innerHTML = document.getElementById("pfb24").innerHTML - document.getElementById("pmk24").innerHTML;
        document.getElementById("pbh30").innerHTML = document.getElementById("pfb30").innerHTML - document.getElementById("pmk30").innerHTML;
        document.getElementById("pbh36").innerHTML = document.getElementById("pfb36").innerHTML - document.getElementById("pmk36").innerHTML;
        document.getElementById("pka12").innerHTML = Math.round(document.getElementById("pbh12").innerHTML / 12);
        document.getElementById("pka18").innerHTML = Math.round(document.getElementById("pbh18").innerHTML / 18);
        document.getElementById("pka24").innerHTML = Math.round(document.getElementById("pbh24").innerHTML / 24);
        document.getElementById("pka30").innerHTML = Math.round(document.getElementById("pbh30").innerHTML / 30);
        document.getElementById("pka36").innerHTML = Math.round(document.getElementById("pbh36").innerHTML / 36);
        document.getElementById("bap12").innerHTML = document.getElementById("pbh12").innerHTML * $("input[name='sbtxt']").val();
        document.getElementById("bap18").innerHTML = document.getElementById("pbh18").innerHTML * $("input[name='sbtxt']").val();
        document.getElementById("bap24").innerHTML = document.getElementById("pbh24").innerHTML * $("input[name='sbtxt']").val();
        document.getElementById("bap30").innerHTML = document.getElementById("pbh30").innerHTML * $("input[name='sbtxt']").val();
        document.getElementById("bap36").innerHTML = document.getElementById("pbh36").innerHTML * $("input[name='sbtxt']").val();
        document.getElementById("jma12").innerHTML = parseInt(document.getElementById("pka12").innerHTML) + parseInt(document.getElementById("bap12").innerHTML);
        document.getElementById("jma18").innerHTML = parseInt(document.getElementById("pka18").innerHTML) + parseInt(document.getElementById("bap18").innerHTML);
        document.getElementById("jma24").innerHTML = parseInt(document.getElementById("pka24").innerHTML) + parseInt(document.getElementById("bap24").innerHTML);
        document.getElementById("jma30").innerHTML = parseInt(document.getElementById("pka30").innerHTML) + parseInt(document.getElementById("bap30").innerHTML);
        document.getElementById("jma36").innerHTML = parseInt(document.getElementById("pka36").innerHTML) + parseInt(document.getElementById("bap36").innerHTML);
        document.getElementById("badm12").innerHTML = document.getElementById("pbh12").innerHTML * 0.03;
        document.getElementById("badm18").innerHTML = document.getElementById("pbh18").innerHTML * 0.03;
        document.getElementById("badm24").innerHTML = document.getElementById("pbh24").innerHTML * 0.03;
        document.getElementById("badm30").innerHTML = document.getElementById("pbh30").innerHTML * 0.03;
        document.getElementById("badm36").innerHTML = document.getElementById("pbh36").innerHTML * 0.03;
        document.getElementById("bpr12").innerHTML = document.getElementById("pbh12").innerHTML * 0.03;
        document.getElementById("bpr18").innerHTML = document.getElementById("pbh18").innerHTML * 0.03;
        document.getElementById("bpr24").innerHTML = document.getElementById("pbh24").innerHTML * 0.03;
        document.getElementById("bpr30").innerHTML = document.getElementById("pbh30").innerHTML * 0.03;
        document.getElementById("bpr36").innerHTML = document.getElementById("pbh36").innerHTML * 0.03;
        var bas12, bas18, bas24, bas30, bas36;
        if ($('input[name=usiatxt]').val() == 74) {
            bas12 = 0.10;
            bas18 = 0.11;
            bas24 = 0.12;
            bas30 = 0.14;
            bas36 = 0.15;
        } else if ($('input[name=usiatxt]').val() == 75) {
            bas12 = 0.11;
            bas18 = 0.12;
            bas24 = 0.13;
            bas30 = 0.15;
            bas36 = 0.16;
        } else if ($('input[name=usiatxt]').val() == 76) {
            bas12 = 0.12;
            bas18 = 0.13;
            bas24 = 0.14;
            bas30 = 0.15;
            bas36 = 0.17;
        } else if ($('input[name=usiatxt]').val() == 77) {
            bas12 = 0.13;
            bas18 = 0.15;
            bas24 = 0.16;
            bas30 = 0.17;
            bas36 = 0.18;
        } else if ($('input[name=usiatxt]').val() == 78) {
            bas12 = 0.14;
            bas18 = 0.16;
            bas24 = 0.17;
            bas30 = 0;
            bas36 = 0;
        } else if ($('input[name=usiatxt]').val() == 79) {
            bas12 = 0.16;
            bas18 = 0;
            bas24 = 0;
            bas30 = 0;
            bas36 = 0;
        }

        document.getElementById("bas12").innerHTML = Math.round($("#pbh12").text() * bas12);
        document.getElementById("bas18").innerHTML = Math.round($("#pbh18").text() * bas18);
        document.getElementById("bas24").innerHTML = Math.round($("#pbh24").text() * bas24);
        document.getElementById("bas30").innerHTML = Math.round($("#pbh30").text() * bas30);
        document.getElementById("bas36").innerHTML = Math.round($("#pbh36").text() * bas36);
        document.getElementById("totb12").innerHTML = parseInt($("#badm12").text()) + parseInt($("#bpr12").text()) + parseInt($("#bas12").text()) + parseInt($("#simp12").text()) + parseInt($("#simw12").text()) + parseInt($("#mat12").text());
        document.getElementById("totb18").innerHTML = parseInt($("#badm18").text()) + parseInt($("#bpr18").text()) + parseInt($("#bas18").text()) + parseInt($("#simp18").text()) + parseInt($("#simw18").text()) + parseInt($("#mat18").text());
        document.getElementById("totb24").innerHTML = parseInt($("#badm24").text()) + parseInt($("#bpr24").text()) + parseInt($("#bas24").text()) + parseInt($("#simp24").text()) + parseInt($("#simw24").text()) + parseInt($("#mat24").text());
        document.getElementById("totb30").innerHTML = parseInt($("#badm30").text()) + parseInt($("#bpr30").text()) + parseInt($("#bas30").text()) + parseInt($("#simp30").text()) + parseInt($("#simw30").text()) + parseInt($("#mat30").text());
        document.getElementById("totb36").innerHTML = parseInt($("#badm36").text()) + parseInt($("#bpr36").text()) + parseInt($("#bas36").text()) + parseInt($("#simp36").text()) + parseInt($("#simw36").text()) + parseInt($("#mat36").text());
        document.getElementById("nett12").innerHTML = parseInt($("#pbh12").text()) - parseInt($("#totb12").text());
        document.getElementById("nett18").innerHTML = parseInt($("#pbh18").text()) - parseInt($("#totb18").text());
        document.getElementById("nett24").innerHTML = parseInt($("#pbh24").text()) - parseInt($("#totb24").text());
        document.getElementById("nett30").innerHTML = parseInt($("#pbh30").text()) - parseInt($("#totb30").text());
        document.getElementById("nett36").innerHTML = parseInt($("#pbh36").text()) - parseInt($("#totb36").text());
        $("#pfk12").number(true, 0);
        $("#pfk18").number(true, 0);
        $("#pfk24").number(true, 0);
        $("#pfk30").number(true, 0);
        $("#pfk36").number(true, 0);
        $("#pfb12").number(true, 0);
        $("#pfb18").number(true, 0);
        $("#pfb24").number(true, 0);
        $("#pfb30").number(true, 0);
        $("#pfb36").number(true, 0);
        $("#pmk12").number(true, 0);
        $("#pmk18").number(true, 0);
        $("#pmk24").number(true, 0);
        $("#pmk30").number(true, 0);
        $("#pmk36").number(true, 0);
        $("#pbh12").number(true, 0);
        $("#pbh18").number(true, 0);
        $("#pbh24").number(true, 0);
        $("#pbh30").number(true, 0);
        $("#pbh36").number(true, 0);
        $("#pka12").number(true, 0);
        $("#pka18").number(true, 0);
        $("#pka24").number(true, 0);
        $("#pka30").number(true, 0);
        $("#pka36").number(true, 0);
        $("#bap12").number(true, 0);
        $("#bap18").number(true, 0);
        $("#bap24").number(true, 0);
        $("#bap30").number(true, 0);
        $("#bap36").number(true, 0);
        $("#jma12").number(true, 0);
        $("#jma18").number(true, 0);
        $("#jma24").number(true, 0);
        $("#jma30").number(true, 0);
        $("#jma36").number(true, 0);
        $("#badm12").number(true, 0);
        $("#badm18").number(true, 0);
        $("#badm24").number(true, 0);
        $("#badm30").number(true, 0);
        $("#badm36").number(true, 0);
        $("#bpr12").number(true, 0);
        $("#bpr18").number(true, 0);
        $("#bpr24").number(true, 0);
        $("#bpr30").number(true, 0);
        $("#bpr36").number(true, 0);
        $("#bas12").number(true, 0);
        $("#bas18").number(true, 0);
        $("#bas24").number(true, 0);
        $("#bas30").number(true, 0);
        $("#bas36").number(true, 0);
        $("#totb12").number(true, 0);
        $("#totb18").number(true, 0);
        $("#totb24").number(true, 0);
        $("#totb30").number(true, 0);
        $("#totb36").number(true, 0);
        $("#nett12").number(true, 0);
        $("#nett18").number(true, 0);
        $("#nett24").number(true, 0);
        $("#nett30").number(true, 0);
        $("#nett36").number(true, 0);
    }
</script>