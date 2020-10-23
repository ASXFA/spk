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
            title: 'Login Berhasil ! , <?= $this->session->flashdata('pesan').' '.$this->session->userdata('nama') ?> :)'
        })
    </script>
    <?php
        }
    }else if ($this->session->flashdata('userPesan')) {
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
                icon: 'Gagal',
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
                <div class="card mt-130 ml-50 mr-50" style="box-shadow:0px 0px 10px 1px rgba(0,0,0,0.1);">
                    <div class="card-body mt-25 mb-25">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card border-white">
                                    <h4><a href="<?= base_url('user-panel') ?>"><i class="fa fa-arrow-left"></i> Kembali</a></h4>
                                    <div class="card-body">
                                        <img src="<?= base_url('assets/user/img/'.$user->photo) ?>" width="350px" alt="" class="img-thumbnail mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card border-white">
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Nama </td>
                                                <td>: </td>
                                                <td><?= $user->nama ?></td>
                                            </tr>
                                            <tr>
                                                <td>Npm </td>
                                                <td>: </td>
                                                <td><?= $user->npm ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email </td>
                                                <td>: </td>
                                                <td><?= $user->email ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin </td>
                                                <td>: </td>
                                                <td><?= $user->jenis_kelamin ?></td>
                                            </tr>
                                            <tr>
                                                <td>Fakultas </td>
                                                <td>: </td>
                                                <td><?= $user->fakultas ?></td>
                                            </tr>
                                            <tr>
                                                <td>Program Studi </td>
                                                <td>: </td>
                                                <td><?= $user->jurusan ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status </td>
                                                <td>: </td>
                                                <td>
                                                    <?php 
                                                        if ($user->status==1) {
                                                            echo "<span class='badge badge-success'> AKTIF </span>'";
                                                        }else{
                                                            echo "<span class='badge badge-danger'> Tidak Aktif </span>'";
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Level </td>
                                                <td>: </td>
                                                <td>USER</td>
                                            </tr>
                                        </table>
                                        <span class="float-right">
                                            <a href="#" data-toggle="modal" data-target="#gantiPassword" class="genric-btn danger-border radius btn-sm mt-10">Ganti Password</a>
                                            <a href="#" data-toggle="modal" data-target="#editProfil" class="genric-btn info radius btn-sm mt-10">Edit Profil</a>
                                        </span>
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
<!-- Modal -->
<div class="modal fade" id="gantiPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Ganti Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user-panel/update-password') ?>" method="post">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="pswd_lama" class="form-control-label">Password Lama</label>
                                <input type="password" id="pswd_lama" class="form-control" name="password_lama">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pswd_lama" class="form-control-label text-white">testaasdasd</label>
                                <a href="#" class="genric-btn primary-border radius" id="btnCheck">Cek pass</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col" id="pswd_baru">
                            <label for="">Password Baru</label>
                            <input type="password" id="pswd_input_baru" class="form-control" name="password_baru">
                        </div>
                        <div class="col" id="pswd_konfirmasi">
                            <label for="">Konfirmasi Password Baru</label>
                            <input type="password" id="pswd_input_konfirmasi" class="form-control" name="password_konfirmasi">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="genric-btn danger-border radius btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" id="btnSimpan" class="genric-btn success-border radius btn-sm">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- modal editt -->
<div class="modal fade" id="editProfil" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit Profil</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                <form action="<?= base_url('dashboard-admin/manage-users/edit/'.$this->session->userdata('id').'/1') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="form-control-label">Nama</label>
                            <div>
								<input type="text" name="nama" value="<?= $user->nama ?>" required
									class="single-input">
							</div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Npm</label>
                            <div>
								<input type="text" name="npm" value="<?= $user->npm ?>" required
									class="single-input">
							</div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Email</label>
                            <div>
								<input type="email" name="email" value="<?= $user->email ?>" required
									class="single-input">
							</div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Photo</label>
                            <div>
								<input type="text" name="photo_old" value="<?= $user->photo ?>" hidden
									class="single-input">
								<input type="file" name="photo_new"
									class="single-input">
							</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-control-label">Jenis Kelamin</label>
                            <div class="mt-10 mb-10">
                                <div class="form-select" id="default-select"">
                                    <select name="jenis_kelamin">
                                        <?php 
                                            if ($user->jenis_kelamin == "Pria") {
                                                echo "<option value='Pria' selected> Pria </option> ";
                                                echo "<option value='Wanita'> Wanita </option> ";
                                            }else{
                                                echo "<option value='Pria'> Pria </option> ";
                                                echo "<option value='Wanita' selected> Wanita </option> ";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Fakultas</label>
                            <div>
								<input type="text" name="fakultas" value="<?= $user->fakultas ?>" required
									class="single-input">
							</div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Jurusan</label>
                            <div>
								<input type="text" name="jurusan" value="<?= $user->jurusan ?>" required
									class="single-input">
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="genric-btn danger-border radius btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" id="btnSimpan" class="genric-btn success-border radius btn-sm">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script>
    $('#btnSimpan').hide();
    $('#pswd_baru').hide();
    $('#pswd_konfirmasi').hide();
    $('#btnCheck').click(function(){
        var pswd_lama = $('#pswd_lama').val();
        $.ajax({
            method:'POST',
            dataType:'JSON',
            url:'<?= base_url('user-panel/check-password') ?>',
            data:{pswd_lama:pswd_lama},
            success:function(pesan){
                if (pesan=="1") {
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
                        title: 'Password Lama cocok !'
                    })
                    $('#pswd_lama').attr('readonly','readonly');
                    $('#pswd_baru').show();
                    $('#pswd_konfirmasi').show();
                }else if(pesan=="0"){
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
                        title: 'Password Lama tidak cocok !'
                    })
                }
            }
        });
        $('#pswd_input_konfirmasi').keyup(function(){
            var pswd_baru = $('#pswd_input_baru').val();
            var pswd_konfirmasi = $('#pswd_input_konfirmasi').val();
            if (pswd_baru !== pswd_konfirmasi) {
                $('#btnSimpan').hide();
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
                    title: 'Password tidak sama  !'
                })
            }else{
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
                    title: 'Password sama  !'
                })
                $('#btnSimpan').show();
            }
        })
    })
</script>