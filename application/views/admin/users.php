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
 <!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary d-inline">Data User</h4>
                    <?php if($this->uri->segment(3)==0):?>
                    <span class="float-right">
                        <a href="" data-toggle='modal' data-target='#tambahModal' class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                    </span>
                    <?php endif ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th width="5%">Avatar</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <?php if($this->uri->segment(3)==1): ?>
                                    <th>Npm</th>
                                    <th>Fakultas</th>
                                    <th>Program Studi</th>
                                    <?php endif ?>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(empty($users)){
                                        echo "<tr><td colspan='8' class='text-center'> Data belum tersedia ! </td></tr>";
                                    }else{
                                        $no = 1;
                                        foreach($users as $user):
                                            if ($this->uri->segment(3)==0) {
                                                echo "
                                                    <tr>
                                                        <td class='text-center'>".$no."</td>
                                                        <td><img src='".base_url('assets/admin/img/'.$user->photo)."' class='img-thumbnail mx-auto d-block' width='40px'></td>
                                                        <td>".$user->nama."</td>
                                                        <td>".$user->email."</td>
                                                        <td>
                                                            <a href='".base_url('dashboard-admin/manage-users/detail-user/'.$user->id)."'  class='btn btn-warning btn-sm' title='Detail User'><i class='fa fa-eye'></i></a>
                                                            <a href='".base_url('dashboard-admin/manage-users/hapus-user/'.$user->id.'/'.$user->level)."' id='btnHapus".$no."' class='btn btn-danger btn-sm' title='Hapus User'><i class='fa fa-trash'></i></a>
                                                        </td>
                                                ";
                                                ?>
                                                        <!-- script ALERT DELETE -->
                                                        <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
                                                        <script>
                                                            $('#btnHapus<?= $no ?>').on('click', function (e) {
                                                                e.preventDefault();
                                                                const url = $(this).attr('href');
                                                                swal.fire({
                                                                    title: 'Yakin menghapus data ?',
                                                                    text: 'Data akan terhapus secara permanen !',
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yakin, Hapus !'
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        window.location.href = url;   
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        <!-- END SCRIPT ALERT DELETE -->
                                            <?php
                                            }else{
                                                echo "
                                                    <tr>
                                                        <td class='text-center'>".$no."</td>
                                                        <td><img src='".base_url('assets/user/img/'.$user->photo)."' class='img-thumbnail mx-auto d-block' width='40px'></td>
                                                        <td>".$user->nama."</td>
                                                        <td>".$user->email."</td>
                                                        <td>".$user->npm."</td>
                                                        <td>".$user->fakultas."</td>
                                                        <td>".$user->jurusan."</td>
                                                        <td>
                                                            <a href='".base_url('dashboard-admin/manage-users/detail-user/'.$user->id)."' class='btn btn-warning btn-sm' title='Detail User'><i class='fa fa-eye'></i></a>
                                                            <a href='".base_url('dashboard-admin/manage-users/hapus-user/'.$user->id.'/'.$user->level)."' id='btnHapus".$no."' class='btn btn-danger btn-sm' title='Hapus User'><i class='fa fa-trash'></i></a>
                                                        </td>
                                                ";
                                                ?>
                                                        <!-- script ALERT DELETE -->
                                                        <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
                                                        <script>
                                                            $('#btnHapus<?= $no ?>').on('click', function (e) {
                                                                e.preventDefault();
                                                                const url = $(this).attr('href');
                                                                swal.fire({
                                                                    title: 'Yakin menghapus data ?',
                                                                    text: 'Data akan terhapus secara permanen !',
                                                                    icon: 'warning',
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: '#3085d6',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: 'Yakin, Hapus !'
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {
                                                                        window.location.href = url;   
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        <!-- END SCRIPT ALERT DELETE -->
                                            <?php
                                            }
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
    </div>
</div>
<!-- /.container-fluid -->
<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard-admin/manage-users/tambah/'.$this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama </label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="jk" class="form-control-label">Jenis Kelamin </label>
                                <select name="jenis_kelamin" id="jk" class="form-control">
                                    <option hidden> -- PILIH -- </option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email </label>
                                <input type="email" class="form-control" id="emailTambah" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="form-control-label">Photo </label>
                                <input type="file" class="form-control" name="photo" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" disabled id="btnTambah" class="btn btn-primary">Tambahkan</button>
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