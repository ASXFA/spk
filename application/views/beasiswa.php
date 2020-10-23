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
<main>
    <div class="container">
        <div class="row justify-content-md-center ">
            <div class="col-lg-12">
                <div class="card mt-100 ml-30 mr-30 borde border-white">
                    <div class="card-body">
                    <h4 class="mb-20"><a href="<?= base_url('user-panel') ?>"><i class="fa fa-arrow-left"></i> Kembali</a></h4>
                        <div class="row">
                            <?php 
                                foreach($beasiswa as $b):
                                    $tgl_skrg = date('Y-m-d');
                                    if (($tgl_skrg >= $b->periode_awal) && ($tgl_skrg <= $b->periode_akhir)) {
                            ?>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= $b->nama ?></h4>
                                        <h6><?= $b->vendor ?></h6>
                                        <p class="card-text">Kuota : <?= $b->kuota ?></p>
                                        <p class="card-text">Batas Gabung : <?= $b->periode_akhir ?></p>
                                        <p class="card-text">Jumlah Peserta : <?= $b->jumlah_peserta ?></p>
                                        <hr>
                                        <span>
                                            <span><a href="<?= base_url('assets/file/beasiswa/'.$b->file) ?>" class="genric-btn link"><i class="fa fa-download"></i> download</a></span>
                                            <span class="float-right">
                                                <?php 
                                                    if ($peserta->num_rows() > 0) {
                                                ?>
                                                    <button class="genric-btn info disable">Gabung</a>
                                                <?php
                                                    }else{
                                                ?>
                                                <a href="<?= base_url('user-panel/beasiswa/gabung/'.$b->id) ?>" class="genric-btn info ">Gabung</a>
                                                <?php
                                                    }
                                                ?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php }endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>