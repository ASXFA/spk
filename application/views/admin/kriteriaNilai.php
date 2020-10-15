<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="d-inline">Konversi Nilai Kriteria</h5>
            <span class="float-right">
                <button id="btnReset" class="btn btn-danger btn-sm" onClick="hapus()">Reset</button>
                <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
                <script>
                    $('#btnReset').on('click', function (e) {
                        e.preventDefault();
                        const url = '<?= base_url('dashboard-admin/manage-kriteria/hasil-kriteria') ?>';
                        swal.fire({
                            title: 'Yakin reset nilai ?',
                            text: 'Data akan ter-reset secara permanen !',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yakin, Reset !'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                hapus();
                                window.location.href = url;   
                            }
                        });
                    });
                </script>
                <!-- <button id="btnEdit" class="btn btn-primary btn-sm" onClick="edit()">Edit Nilai Konversi</button> -->
            </span>
        </div>
        <?php 
            $array = [];
            foreach($kriteria as $k):
                array_push($array,$k->id);
            endforeach;
        ?>
        <div class="card-body">
            <table class="table table-borderless">
                <thead>
                    <th></th>
                    <th width="15%">IPK</th>
                    <th width="15%">Penghasilan Ortu</th>
                    <th width="15%">Prestasi Akademik</th>
                    <th width="15%">Prestasi Non Akademik</th>
                    <th width="15%">Nilai Prioritas</th>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                    <?php 
                        $no = 1;
                        foreach($kriteria as $k):
                            if($no == 1){
                    ?>
                                <tr>
                                    <td><?= $k->nama_kriteria?></td>
                    <?php
                                $nos = 1;
                                foreach($kriteria2 as $k2):
                                    if($nos == 1){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="1-1" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php
                                    }else if($nos == 2){
                    ?>
                                        <td>
                                            <select name="" id="1-2" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" class="form-control form-control-sm">
                                                <option hidden>PILIH</option>
                                                <option value="1">1</option>
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="7">7</option>
                                                <option value="9">9</option>
                                            </select>
                                        </td>
                    <?php
                                    }else if($nos == 3){
                    ?>
                                        <td>
                                            <select name="" id="1-3" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" class="form-control form-control-sm">
                                                <option hidden>PILIH</option>
                                                <option value="1">1</option>
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="7">7</option>
                                                <option value="9">9</option>
                                            </select>
                                        </td>
                    <?php
                                    }else if($nos == 4){
                    ?>
                                        <td>
                                            <select name="" id="1-4" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" class="form-control form-control-sm">
                                                <option hidden>PILIH</option>
                                                <option value="1">1</option>
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="7">7</option>
                                                <option value="9">9</option>
                                            </select>
                                        </td>
                    <?php 
                                    }
                                $nos++;
                                endforeach;
                    ?>
                                <td>
                                    <input type="text" class="form-control form-control-sm" id="hasil1" readonly>
                                </td>
                            </tr>
                    <?php
                            }else if($no == 2){
                    ?>
                            <tr>
                                <td>Penghasilan Ortu</td>
                    <?php
                                $nos = 1;
                                foreach($kriteria2 as $k2):
                                    if($nos == 1){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="2-1" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php 
                                    }else if($nos==2){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="2-2" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php
                                    }else if($nos==3){
                    ?>
                                        <td>
                                            <select name="" id="2-3" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" class="form-control form-control-sm">
                                                <option hidden>PILIH</option>
                                                <option value="1">1</option>
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="7">7</option>
                                                <option value="9">9</option>
                                            </select>
                                        </td>
                    <?php

                                    }else if($nos==4){
                    ?>
                                        <td>
                                            <select name="" id="2-4" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" class="form-control form-control-sm">
                                                <option hidden>PILIH</option>
                                                <option value="1">1</option>
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="7">7</option>
                                                <option value="9">9</option>
                                            </select>
                                        </td>
                    <?php
                                    }
                                    $nos++;
                                    endforeach;
                    ?>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="hasil2" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                    </td>
                                </tr>
                    <?php
                            }else if($no==3){
                    ?>
                                <tr>
                                    <td>Prestasi Akademik</td>
                    <?php
                                $nos = 1;
                                foreach($kriteria2 as $k2):
                                    if($nos==1){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="3-1" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php
                                    }else if($nos==2){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="3-2" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php
                                    }else if($nos==3){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="3-3" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php
                                    }else if($nos==4){
                    ?>
                                        <td>
                                            <select name="" id="3-4" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" class="form-control form-control-sm">
                                                <option hidden>PILIH</option>
                                                <option value="1">1</option>
                                                <option value="3">3</option>
                                                <option value="5">5</option>
                                                <option value="7">7</option>
                                                <option value="9">9</option>
                                            </select>
                                        </td>
                    <?php                                        
                                    }
                                    $nos++;
                                    endforeach;
                    ?>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="hasil3" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                    </td>
                                </tr>
                    <?php
                            }else if($no == 4){
                    ?>
                                <tr>
                                    <td>Prestasi Non Akademik</td>
                    <?php
                                $nos = 1;
                                foreach($kriteria2 as $k2):
                                    if($nos == 1){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="4-1" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php
                                    }else if($nos==2){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="4-2" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php
                                    }else if($nos==3){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="4-3" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php                  
                                    }else if($nos==4){
                    ?>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" id="4-4" data-id="<?= $k->id ?>" data-ids="<?= $k2->id ?>" readonly>
                                        </td>
                    <?php
                                    }
                                    $nos++;
                                    endforeach;          
                    ?>

                                <td>
                                    <input type="text" class="form-control form-control-sm" id="hasil4" readonly>
                                </td>    
                    <?php                  
                            }
                            $no++;
                        endforeach;
                    ?>
                    </tr>
                </tbody>
            </table>
            <span class="float-left">
                Nilai Konsistensi : <span id="nilaiKonsist"></span>Nilai termasuk : <span id="konsist"></span> 
            </span>
            <span id="btnbtn" class="float-right">
                <button id="btnCancel" class="btn btn-light btn-sm mr-2" onClick="cancel()"> Cancel </button>
                <button class="btn btn-primary btn-sm" id="btnHitung" onClick="hitung()">Hitung</button>
            </span>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script>
    $(function(){
        var datas = [];
        $.ajax({
            type:'GET',
            async:true,
            dataType:'JSON',
            url:'<?= base_url('dashboard-admin/manage-kriteria/hasil-kriteria/ambil') ?>',
            success:function(datak){
                if(datak.length === 0){
                    console.log('iey');
                    $('#btnReset').attr('disabled','disabled');
                    $('#btnCancel').hide();
                    $('#1-1').val(1);
                    $('#2-2').val(1);
                    $('#3-3').val(1);
                    $('#4-4').val(1);
                }else{
                    $('#btnEdit').removeAttr('disabled','disabled');
                    var i=0;
                    for(i; i<datak.length; i++){
                        if(i===0){
                            $('#1-1').val(datak[i].nilai);
                        }else if(i===1){
                            $('#2-1').val(datak[i].nilai);
                        }else if(i===2){
                            $('#3-1').val(datak[i].nilai);
                        }else if(i===3){
                            $('#4-1').val(datak[i].nilai);
                            $('#hasil1').val(datak[i].prioritas);
                        }else if(i===4){
                            $('#1-2').val(datak[i].nilai);
                            $('#1-2').attr('disabled','disabled');
                        }else if(i===5){
                            $('#2-2').val(datak[i].nilai);
                        }else if(i===6){
                            $('#3-2').val(datak[i].nilai);
                        }else if(i===7){
                            $('#4-2').val(datak[i].nilai);
                            $('#hasil2').val(datak[i].prioritas);
                        }else if(i===8){
                            $('#1-3').val(datak[i].nilai);
                            $('#1-3').attr('disabled','disabled');
                        }else if(i===9){
                            $('#2-3').val(datak[i].nilai);
                            $('#2-3').attr('disabled','disabled');
                        }else if(i===10){
                            $('#3-3').val(datak[i].nilai);
                        }else if(i===11){
                            $('#4-3').val(datak[i].nilai);
                            $('#hasil3').val(datak[i].prioritas);
                        }else if(i===12){
                            $('#1-4').val(datak[i].nilai);
                            $('#1-4').attr('disabled','disabled');
                        }else if(i===13){
                            $('#2-4').val(datak[i].nilai);
                            $('#2-4').attr('disabled','disabled');
                        }else if(i===14){
                            $('#3-4').val(datak[i].nilai);
                            $('#3-4').attr('disabled','disabled');
                        }else if(i===15){
                            $('#4-4').val(datak[i].nilai);
                            $('#hasil4').val(datak[i].prioritas);
                        }
                    }
                    $('#btnHitung').attr('disabled','disabled');
                    $('#btnCancel').hide();
                }
            },
        })
        $('#1-2').change(function(){
            var ganti = 1 / $('#1-2').val();
            var gantifix = ganti.toFixed(2);
            var gantiInt = parseFloat(gantifix);
            $('#2-1').val(gantiInt);
        })
        $('#1-3').change(function(){
            var ganti = 1 / $('#1-3').val();
            var gantifix = ganti.toFixed(2);
            var gantiInt = parseFloat(gantifix);
            $('#3-1').val(gantiInt);
        })
        $('#1-4').change(function(){
            var ganti = 1 / $('#1-4').val();
            var gantifix = ganti.toFixed(2);
            var gantiInt = parseFloat(gantifix);
            $('#4-1').val(gantiInt);
        })
        $('#2-3').change(function(){
            var ganti = 1 / $('#2-3').val();
            var gantifix = ganti.toFixed(2);
            var gantiInt = parseFloat(gantifix);
            $('#3-2').val(gantiInt);
        })
        $('#2-4').change(function(){
            var ganti = 1 / $('#2-4').val();
            var gantifix = ganti.toFixed(2);
            var gantiInt = parseFloat(gantifix);
            $('#4-2').val(gantiInt);
        })
        $('#3-4').change(function(){
            var ganti = 1 / $('#3-4').val();
            var gantifix = ganti.toFixed(2);
            var gantiInt = parseFloat(gantifix);
            $('#4-3').val(gantiInt);
        });
        
    });

    function edit(){
        $('#1-2').removeAttr('disabled','disabled');
        $('#1-3').removeAttr('disabled','disabled');
        $('#2-3').removeAttr('disabled','disabled');
        $('#1-4').removeAttr('disabled','disabled');
        $('#2-4').removeAttr('disabled','disabled');
        $('#3-4').removeAttr('disabled','disabled');
        $('#btnHitung').removeAttr('disabled','disabled');
        $('#btnCancel').show();
        $('#btnEdit').attr('disabled','disabled');
    }

    function cancel(){
        $('#1-2').attr('disabled','disabled');
        $('#1-3').attr('disabled','disabled');
        $('#2-3').attr('disabled','disabled');
        $('#1-4').attr('disabled','disabled');
        $('#2-4').attr('disabled','disabled');
        $('#3-4').attr('disabled','disabled');
        $('#btnHitung').attr('disabled','disabled');
        $('#btnCancel').hide();
        $('#btnEdit').removeAttr('disabled','disabled');
    }

    function hapus(){
        $.ajax({
            method:'post',
            url:'<?= base_url('dashboard-admin/manage-kriteria/hasil-kriteria/hapus') ?>',
            data:{table1:'kriteria_nilai',table2:'kriteria_prioritas'},
            success:function(){
            }
        })
    }

    function hitung(){
        hapus();

        var array1 = [$('#1-1').val(),$('#2-1').val(),$('#3-1').val(),$('#4-1').val()];
        var array2 = [$('#1-2').val(),$('#2-2').val(),$('#3-2').val(),$('#4-2').val()];
        var array3 = [$('#1-3').val(),$('#2-3').val(),$('#3-3').val(),$('#4-3').val()];
        var array4 = [$('#1-4').val(),$('#2-4').val(),$('#3-4').val(),$('#4-4').val()];

        var jumlahMatrikPerbandingan = [hitungMatrikNilai(array1),hitungMatrikNilai(array2),hitungMatrikNilai(array3),hitungMatrikNilai(array4)];

        var arr1 = hitungNilaiEigen(array1,jumlahMatrikPerbandingan,0);
        var arr2 = hitungNilaiEigen(array2,jumlahMatrikPerbandingan,1);
        var arr3 = hitungNilaiEigen(array3,jumlahMatrikPerbandingan,2);
        var arr4 = hitungNilaiEigen(array4,jumlahMatrikPerbandingan,3);

        var jumlahEigen = hitungJumlahNilaiEigen(arr1,arr2,arr3,arr4);
        var nilaiPrioritas = hitungPrioritas(jumlahEigen);
        Swal.fire({
            position: 'top-end',
            icon: 'info',
            title: 'Loading !',
            showConfirmButton: false,
            timer: 4000
        })
        var dataID = [<?php echo '"'.implode('","', $array).'"' ?>];
        var k=0;
        for(k; k<nilaiPrioritas.length; k++){
            $.ajax({
                type:'POST',
                dataType:'json',
                url:'<?= base_url('dashboard-admin/manage-kriteria/hasil-kriteria/kriteria-prioritas/tambah') ?>',
                data:{kriteria_id:dataID[k],prioritas:nilaiPrioritas[k]},
                success:function(){
                }
            });
        }
        $('#hasil1').val(nilaiPrioritas[0]);
        $('#hasil2').val(nilaiPrioritas[1]);
        $('#hasil3').val(nilaiPrioritas[2]);
        $('#hasil4').val(nilaiPrioritas[3]);

        var jumlahBaris1 = hitungNilaiJumlahBaris(array1,nilaiPrioritas,0);
        var jumlahBaris2 = hitungNilaiJumlahBaris(array2,nilaiPrioritas,1);
        var jumlahBaris3 = hitungNilaiJumlahBaris(array3,nilaiPrioritas,2);
        var jumlahBaris4 = hitungNilaiJumlahBaris(array4,nilaiPrioritas,3);
        
        var hasilJumlahBaris = hitungJumlahNilaiEigen(jumlahBaris1,jumlahBaris2,jumlahBaris3,jumlahBaris4);
        
        var nilaiKonsistensi = hitungNilaiKonsistensi(hasilJumlahBaris,nilaiPrioritas);

        var lambda = nilaiKonsistensi / array1.length;
        var CI = (lambda - array1.length) / (array1.length-1);
        var CR = CI / 0.90;
        var CRFix = parseFloat(CR.toFixed(2));
        if (CRFix < 0.1) {
            var data = [<?php echo '"'.implode('","', $array).'"' ?>];
            var data2 = [<?php echo '"'.implode('","', $array).'"' ?>];
            var send = [];

            var o = 0;
            
            for(o; o<data.length; o++){
                if(o==0){
                    var p = 0;
                    for(p; p<data2.length; p++){
                        var set = {kriteria_id_from:data[o],kriteria_id_to:data2[p],nilai:array1[p]};
                        $.ajax({
                            type:'post',
                            dataType:'JSON',
                            url:'<?= base_url('dashboard-admin/manage-kriteria/hasil-kriteria/tambah') ?>',
                            data:{idfrom:data[o],idto:data2[p],nilai:array1[p]},
                            success:function(){
                            }
                        });
                    }
                }else if(o==1){
                    var p = 0;
                    for(p; p<data2.length; p++){
                        var set = {kriteria_id_from:data[o],kriteria_id_to:data2[p],nilai:array2[p]};
                        $.ajax({
                            type:'post',
                            dataType:'JSON',
                            url:'<?= base_url('dashboard-admin/manage-kriteria/hasil-kriteria/tambah') ?>',
                            data:{idfrom:data[o],idto:data2[p],nilai:array2[p]},
                            success:function(){
                            }
                        });
                    }
                }else if(o==2){
                    var p = 0;
                    for(p; p<data2.length; p++){
                        var set = {kriteria_id_from:data[o],kriteria_id_to:data2[p],nilai:array3[p]};
                        $.ajax({
                            type:'post',
                            dataType:'JSON',
                            url:'<?= base_url('dashboard-admin/manage-kriteria/hasil-kriteria/tambah') ?>',
                            data:{idfrom:data[o],idto:data2[p],nilai:array3[p]},
                            success:function(){
                            }
                        });
                    }
                }else if(o==3){
                    var p = 0;
                    for(p; p<data2.length; p++){
                        var set = {kriteria_id_from:data[o],kriteria_id_to:data2[p],nilai:array4[p]};
                        $.ajax({
                            type:'post',
                            dataType:'JSON',
                            url:'<?= base_url('dashboard-admin/manage-kriteria/hasil-kriteria/tambah') ?>',
                            data:{idfrom:data[o],idto:data2[p],nilai:array4[p]},
                            success:function(){
                            }
                        });
                    }
                }
            }
            $('#nilaiKonsist').html('<h6 class="d-inline">'+CRFix+'</h6>');
            $('#konsist').html('<h6 class="d-inline"><span class="badge badge-success">KONSISTEN</span></h6>');
            $('#btnEdit').removeAttr('disabled','disabled');
            $('#btnHitung').attr('disabled','disabled');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Perhitungan selesai ! Nilai Konsistensi : '+CRFix+' Sudah Termasuk KONSISTEN !',
                showConfirmButton: false,
                timer: 4000
            }).then((result)=>{
                window.location.href='<?= base_url('dashboard-admin/manage-kriteria/hasil-kriteria') ?>';
            })
            

        }else{
            alert("TIDAK KONSISTEN !");
        }
    }

    function hitungMatrikNilai(array){
        var hasil1=0;

        var i=0;
        for(i; i<array.length; i++){
            hasil1 = hasil1+parseFloat(array[i]);
        }
        
        return hasil1;
    }

    function hitungNilaiEigen(array1, array2,index){
        var arrHasil = [];
        var i = 0;
        for(i; i<array1.length; i++){
            var hasil = 0;
            var hasilfix;
            hasil = array1[i] / array2[index];
            hasilfix = hasil.toFixed(2);
            arrHasil.push(parseFloat(hasilfix));
        }
        return arrHasil;
    }

    function hitungJumlahNilaiEigen(array1,array2,array3,array4){
        var arr1 =[];
        var i=0;
        for(i; i<array1.length; i++){
            var hasil1 = 0;
            hasil1 = array1[i] + array2[i] + array3[i] + array4[i];
            hasilfix = hasil1.toFixed(2);
            arr1.push(parseFloat(hasilfix));
        }
        return arr1;
    }

    function hitungPrioritas (arr1){
        var arrPrioritas = [];
        var j =0;
        for(j; j<arr1.length; j++){
            var hasil = 0;
            hasil = arr1[j] / arr1.length;
            hasilfixx = hasil.toFixed(2);
            arrPrioritas.push(parseFloat(hasilfixx));
        }
        return arrPrioritas;
    }

    function hitungNilaiJumlahBaris(array1,array2,index){
        var arrHasil = [];
        var i = 0;
        for(i; i<array1.length; i++){
            var hasil = 0;
            var hasilfix;
            hasil = array1[i] * array2[index];
            hasilfix = hasil.toFixed(2);
            arrHasil.push(parseFloat(hasilfix));
        }
        return arrHasil;
    }

    function hitungNilaiKonsistensi(array1,array2){
        var nilaiHasil = [];
        var i = 0;
        for(i; i<array1.length; i++){
            var hasil = 0;
            var hasilfix;
            hasil = array1[i] + array2[i];
            hasilfix = hasil.toFixed(2);
            nilaiHasil.push(parseFloat(hasilfix));
        }

        var nilaiAkhir=0;
        var j = 0;
        for(j; j<nilaiHasil.length; j++){
            nilaiAkhir = nilaiAkhir+nilaiHasil[j];
        }
        return nilaiAkhir;
    }
</script>