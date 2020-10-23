<?php 
    if ($this->session->flashdata('pesan')) {
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
            title: '<?= $this->session->flashdata('pesan') ?>'
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
                    title: '<?= $this->session->flashdata('pesan') ?>'
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
                <div class="card mt-130 ml-30 mr-30 borde border-white">
                    <div class="card-body mt-85">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card bg-light text-white">
                                    <img class="card-img" src="<?= base_url('assets/landing/img/profil.svg') ?>" alt="Card image">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title text-center"><a href="<?= base_url('user-panel/profil') ?>"> Profil User </a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card bg-light text-white">
                                    <img class="card-img" src="<?= base_url('assets/landing/img/syarat.svg') ?>" alt="Card image">
                                    <div class="card-img-overlay">
                                    <h5 class="card-title  text-center"><a href="<?= base_url('user-panel/persyaratan') ?>"> Persyaratan </a></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card bg-light text-white" id="cardBeasiswa">
                                    <img class="card-img" src="<?= base_url('assets/landing/img/beasiswa.svg') ?>" alt="Card image">
                                    <div class="card-img-overlay">
                                    <h5 class="card-title  text-center"><a href="<?= base_url('user-panel/beasiswa') ?>"> Beasiswa </a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script>
    $('#cardBeasiswa').hide();
    $.ajax({
        data:'get',
        url:'<?= base_url('user-panel/persyaratan/cek-persyaratan') ?>',
        success:function(hasil){
            if (hasil === "1") {
                $('#cardBeasiswa').show();
            }
        }
    })
</script>