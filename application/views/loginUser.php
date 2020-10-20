<?php 
    if ($this->session->flashdata('userPesan')) {
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
            title: '<?= $this->session->flashdata('userPesan') ?>'
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
                    title: '<?= $this->session->flashdata('userPesan') ?>'
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
                    <div class="card-body mt-50 mb-50">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-white">
                                    <div class="card-body">
                                        <h2 class="mb-30 text-center">Login</h2>
                                        <form action="<?= base_url('auth/1') ?>" method="post">
                                            <div class="mt-10 mb-10">
                                                <div class="generating-cap">
                                                    <h5>Email</h5>
                                                </div>
                                                <input type="email" name="email" placeholder="Masukan Email ..." required
                                                    class="single-input">
                                            </div>
                                            <div class="mt-10">
                                                <div class="generating-cap">
                                                    <h5>Password</h5>
                                                </div>
                                                <input type="password" name="pass" placeholder="Masukan Password ..." required
                                                    class="single-input">
                                            </div>
                                            <div class="mt-30">
                                                <span>Belum punya akun ? <a href="<?= base_url('registrasi') ?>" class="genric-btn link-border radius" >Klik disini</a></span>
                                                <input type="submit" class="genric-btn primary float-right" value="Masuk">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?= base_url() ?>assets/landing/img/login/logo.svg" alt="auth">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
