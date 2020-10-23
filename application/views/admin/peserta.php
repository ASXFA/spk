<?php 
    if ($this->session->flashdata('pesanBeasiswa')) {
        if ($this->session->flashdata('kondisi')=="1") {
    ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: '<?= $this->session->flashdata('pesanBeasiswa') ?>'
        })
    </script>
    <?php
        }else{
    ?>
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: '<?= $this->session->flashdata('pesanBeasiswa') ?>'
                })
            </script>
    <?php
        }
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Pilih Beasiswa</label>
                <div class="col-sm-8">
                    <form action="" method="get">   
                    <select id="pilihSelect" name="idBeasiswa" class="form-control">
                        <option hidden> PILIH BEASISWA </option>
                        <?php 
                            foreach($beasiswa as $b):
                                echo "<option value='".$b->id."'>".$b->nama."</option>";
                            endforeach
                        ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button id="btnBeasiswa" class="btn btn-primary">Pilih</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
        if (isset($peserta)) {
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="font-weight-bold text-primary">Informasi Beasiswa</h5>
                </div>
                <div class="card-body">
                    <h6 class="d-inline"> <b> Nama Beasiswa : </b></h6><h6 class="d-inline"><?= $beasiswa_peserta->nama ?></h6><br>
                    <h6 class="d-inline"> <b> Vendor : </b></h6><h6 class="d-inline"><?= $beasiswa_peserta->vendor ?></h6><br>
                    <h6 class="d-inline"> <b> Kuota : </b></h6><h6 class="d-inline"><?= $beasiswa_peserta->kuota ?> Orang</h6><br>
                    <h6 class="d-inline"> <b> Jumlah Peserta : </b></h6><h6 class="d-inline"><?= $beasiswa_peserta->jumlah_peserta ?> Orang</h6><br>
                    <h6 class="d-inline"> <b> Jumlah Peserta LOLOS : </b></h6><h6 class="d-inline">
                        <?php  
                            if($peserta->num_rows() < $beasiswa_peserta->kuota){
                                echo $peserta->num_rows();
                            }else{
                                $beasiswa_peserta->kuota;
                            }
                        ?>
                        Orang
                    </h6><br>
                    <h6 class="d-inline"> <b> Jumlah Peserta TIDAK LOLOS : </b></h6><h6 class="d-inline">
                        <?php  
                            if($peserta->num_rows() < $beasiswa_peserta->kuota){
                                echo "0";
                            }else{
                                $peserta->num_rows() - $beasiswa_peserta->kuota;
                            }
                        ?>
                        Orang
                    </h6><br>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="font-weight-bold text-primary">Aksi</h5>
                </div>
                <div class="card-body p-5 text-center">
                <?php if($peserta->num_rows() > 0){ ?>
                    <a href="<?= base_url('dashboard-admin/manage-peserta/kirim/'.$beasiswa_peserta->id) ?>" class="btn btn-primary"><i class="fa fa-envelope"></i> Kirim Email Sekarang !</a>
                <?php } ?>
                    <a href="<?= base_url('dashboard-admin/manage-peserta/cetak/'.$beasiswa_peserta->id) ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4" id="dataPeserta">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">Data Peserta </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>Nama Mahasiswa </th>
                        <th>Status</th>
                        <th>Total Nilai AHP</th>
                        <th>Status Kelolosan</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody id="listPeserta">
                    <?php 
                        if (isset($peserta)) {
                            $no = 1;
                            foreach($peserta->result() as $p):
                    ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>
                                        <?php 
                                            foreach($users as $u):
                                                if($u->id == $p->user_id){
                                                    echo $u->nama;
                                                }
                                            endforeach
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if ($p->status == 0) {
                                                echo "Belum Dihitung";
                                            }else if($p->status == 1){
                                                echo "Sudah dihitung";
                                            }
                                        ?>
                                    </td>
                                    <td><?= $p->total ?></td>
                                    <td>
                                        <?php 
                                            if($no <= $beasiswa_peserta->kuota){
                                                echo "<span class='badge badge-success'>LOLOS</span>";
                                            }else{
                                                echo "<span class='badge badge-danger'>TIDAK LOLOS</span>";
                                            }
                                        ?>
                                    </td>
                                </tr>
                    <?php
                    $no++;
                            endforeach;
                        }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>