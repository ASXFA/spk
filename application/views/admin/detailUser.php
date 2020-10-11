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
<div class="container-fluid">
    <!-- Page Heading -->
    <?php 
        if($user->id != $this->session->userdata('id')){
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h4 mb-0 text-gray-800"><a href="<?= base_url('dashboard-admin/manage-users/'.$user->level) ?>" class="text-decoration-none"><i class="fa fa-arrow-left"></i> Kembali</a></h4>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <?php } ?>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold text-primary d-inline">Infromasi Peserta</h4>
        </div>
        <div class="card-body">
            <?php 
                if($user->id == $this->session->userdata('id')){
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <a href="" data-toggle="modal" data-target="#userEdit" class="btn btn-primary btn-sm float-right"><i class="fa fa-edit"></i> Edit Profil</a>
                </div>
            </div>
                <?php } ?>
            <div class="row">
                <div class="col-lg-4">
                    <?php 
                        if ($user->level == 0) {
                            echo "<img src='".base_url('assets/admin/img/'.$user->photo)."' width='250px' class='rounded mx-auto d-block' alt='".$user->photo."'>";
                        }else{
                            echo "<img src='".base_url('assets/user/img/'.$user->photo)."' width='250px' class='rounded mx-auto d-block' alt='".$user->photo."'>";
                        }
                    ?>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                    <?php if ($user->level == 0) { ?>
                        <div class="col-lg-12">
                    <?php }else{
                        echo "<div class='col-lg-6'>";
                    } ?>
                            <div class="form-group row">
                                <label for="Nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext border-bottom-primary" id="Nama" value="<?= $user->nama ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext border-bottom-primary" id="jk" value="<?= $user->jenis_kelamin ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext border-bottom-primary" id="Email" value="<?= $user->email ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php if ($user->level != 0) { ?>
                            <div class="form-group row">
                                <label for="NPM" class="col-sm-4 col-form-label">NPM</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext border-bottom-primary" id="NPM" value="<?= $user->npm ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fakultas" class="col-sm-4 col-form-label">Fakultas</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext border-bottom-primary" id="fakultas" value="<?= $user->fakultas ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prodi" class="col-sm-4 col-form-label">Program Studi</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext border-bottom-primary" id="prodi" value="<?= $user->jurusan ?>">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <?php if($user->level == 1){ ?>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h4 class="m-0 font-weight-bold text-primary d-inline">Data Persyaratan Peserta</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-borderless">
                        <tr class="border-left-primary">
                            <td width="30%">IPK </td>
                            <td> > 3.60</td>
                            <td width="10%"><a href="" class="btn btn-info btn-sm"><i class="fa fa-image"></i></a></td>
                        </tr>
                        <tr class="border-right-primary">
                            <td width="30%">Penghasilan Orang Tua </td>
                            <td> > Rp. 2.500.000,- </td>
                            <td width="10%"><a href="" class="btn btn-info btn-sm"><i class="fa fa-image"></i></a></td>
                        </tr>
                        <tr class="border-left-primary">
                            <td width="30%">Prestasi Akademik </td>
                            <td>Tingkat Kotamadya</td>
                            <td width="10%"><a href="" class="btn btn-info btn-sm"><i class="fa fa-image"></i></a></td>
                        </tr>
                        <tr class="border-right-primary">
                            <td width="30%">Prestasi Non Akademik</td>
                            <td>Tingakat Nasional</td>
                            <td width="10%"><a href="" class="btn btn-info btn-sm"><i class="fa fa-image"></i></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<!-- Modal -->
<div class="modal fade" id="userEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard-admin/manage-users/edit/'.$user->id.'/'.$user->level)?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama </label>
                                <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jk" class="form-control-label">Jenis Kelamin </label>
                                <select name="jenis_kelamin" id="jk" class="form-control">
                                    <option hidden> -- PILIH -- </option>
                                    <?php 
                                        if ($user->jenis_kelamin == "Pria") {
                                            echo "<option value='Pria' selected> Pria </option>";
                                            echo "<option value='Wanita'> Wanita </option>";
                                        }else{
                                            echo "<option value='Pria'> Pria </option>";
                                            echo "<option value='Wanita' selected> Wanita </option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email </label>
                                <input type="email" class="form-control" id="emailTambah" name="email" value="<?= $user->email ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="form-control-label">Photo </label>
                                <input type="text" class="form-control" hidden name="photo_old" value="<?= $user->photo ?>">
                                <input type="file" class="form-control" name="photo_new">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btnTambah" class="btn btn-warning">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script>
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
                        timer: 3500,
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
                    $('#btnTambah').removeAttr('disabled');
                }else if(pesan=="1"){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3500,
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
                    $('#btnTambah').attr('disabled','disabled');
                }
            }
        })
    })
</script>