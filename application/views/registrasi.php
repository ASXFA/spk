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
                <div class="card mt-10 ml-30 mr-30 borde border-white">
                    <div class="card-body mt-20 mb-50">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-white">
                                    <div class="card-body">
                                        <h2 class="mb-30 text-center">Registrasi</h2>
                                        <form action="<?= base_url('action-registrasi/1') ?>" method="post" enctype="multipart/form-data">
                                            <div class="mt-10 mb-10">
                                                <div class="generating-cap">
                                                    <h5>Nama</h5>
                                                </div>
                                                <input type="text" name="nama" placeholder="Masukan Nama ..." name="nama" required
                                                    class="single-input">
                                            </div>
                                            <div class="mt-10 mb-10">
                                                <div class="generating-cap">
                                                    <h5>Npm</h5>
                                                </div>
                                                <input type="text" name="npm" placeholder="Masukan Npm ..." name="npm" required
                                                    class="single-input">
                                            </div>
                                            <div class="mt-10 mb-10">
                                                <div class="generating-cap">
                                                    <h5>Email</h5>
                                                </div>
                                                <input type="email" name="email" id="emailTambah" placeholder="Masukan Email ..." name="email" required
                                                    class="single-input">
                                            </div>
                                            <div class="mt-10 mb-10">
                                                <div class="generating-cap">
                                                    <h5>Jenis Kelamin</h5>
                                                    <div class="form-select" id="default-select"">
                                                        <select name="jenis_kelamin">
                                                            <option value="Pria">Pria</option>
                                                            <option value="Wanita">Wanita</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-10 mb-10">
                                                <div class="generating-cap">
                                                    <h5>Fakultas</h5>
                                                </div>
                                                <input type="text" name="fakultas" placeholder="Masukan Fakultas ..." name="Fakultas" required
                                                    class="single-input">
                                            </div>
                                            <div class="mt-10 mb-10">
                                                <div class="generating-cap">
                                                    <h5>Program Studi</h5>
                                                </div>
                                                <input type="text" name="jurusan" placeholder="Masukan Program Studi ..." name="jurusan" required
                                                    class="single-input">
                                            </div>
                                            <div class="mt-10 mb-10">
                                                <div class="generating-cap">
                                                    <h5>Photo</h5>
                                                </div>
                                                <input type="file" name="photo" required
                                                    class="single-input">
                                            </div>
                                            <div class="mt-30">
                                                <span>Sudah punya akun ? <a href="<?= base_url('login-user') ?>" class="genric-btn link-border radius" >Klik disini</a></span>
                                                <button type="submit" class="genric-btn primary float-right" id="btnDaftar" > Daftar </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?= base_url() ?>assets/landing/img/login/logo2.svg" class="mt-180" alt="auth">
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
    $('#btnDaftar').hide();
    $('#emailTambah').on('change',function(){
        var email = $('#emailTambah').val();
        $.ajax({
            type:'post',
            url:'<?= base_url('admin/users/cekEmail') ?>',
            data:{email: email},
            success:function(pesan){
                if (pesan=="0") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Email Bisa dipakai'
                    })
                    $('#btnDaftar').show();
                }else if(pesan=="1"){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'Email Sudah ada, Tidak bisa digunakan kembali !'
                    })
                    $('#btnDaftar').hide();
                }
            }
        })
    })
</script>