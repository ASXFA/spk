<?php 
    if ($this->session->flashdata('subPesan')) {
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
            title: '<?= $this->session->flashdata('subPesan') ?>'
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
                    title: '<?= $this->session->flashdata('subPesan') ?>'
                })
            </script>
    <?php
        }
    }
?>
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-12">
            <h5><a href="<?= base_url('dashboard-admin/manage-kriteria') ?>" class=><i class="fa fa-arrow-left"></i> Kembali</a></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow rounded">
                <div class="card-header border-bottom-primary">
                    <h4>Nama Kriteria</h4>
                </div>
                <div class="card-body">
                    <h5><?= $kriteria->nama_kriteria ?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow rounded">
                <div class="card-header border-bottom-primary">
                    <h4>Tambah Sub Kriteria</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('dashboard-admin/manage-subkriteria/tambah/'.$kriteria->id) ?>" method="post">
                        <div class="form-group">
                            <label for="" class="form-control-label">Nama Sub Kriteria</label>
                            <input type="text" name="nama_subkriteria"  class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm float-right" value="Tambah">
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mt-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th>Nama Sub Kriteria</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($subkriteria as $sk): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $sk->nama_subkriteria ?></td>
                                    <td width="10%">
                                        <a href="" data-toggle="modal" data-target="#editModal<?= $sk->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="<?= base_url('dashboard-admin/manage-subkriteria/hapus/'.$sk->id.'/'.$kriteria->id) ?>" id="btnHapus<?= $no ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
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
                                    </td>
                                </tr>
                                <?php $no++; endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<?php foreach($subkriteria as $sk): ?>
<div class="modal fade" id="editModal<?= $sk->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sub Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard-admin/manage-subkriteria/edit/'.$sk->id.'/'.$kriteria->id) ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Sub Kriteria </label>
                                <input type="text" class="form-control" name="nama_subkriteria" value="<?= $sk->nama_subkriteria ?>" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btnTambah" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>