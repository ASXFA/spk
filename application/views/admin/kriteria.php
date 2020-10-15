<?php 
    if ($this->session->flashdata('kriteriaPesan')) {
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
            title: '<?= $this->session->flashdata('kriteriaPesan') ?>'
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
                    title: '<?= $this->session->flashdata('kriteriaPesan') ?>'
                })
            </script>
    <?php
        }
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">Data Kriteria</h6>
            <span class="float-right">
                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal" ><i class="fa fa-plus"></i></a>
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>Kriteria </th>
                        <th>Sub Kriteria</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($kriteria as $k): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $k->nama_kriteria ?></td>
                        <td width="15%" class="text-center">
                            <a href="<?= base_url('dashboard-admin/manage-subkriteria/'.$k->id) ?>" class="btn btn-warning btn-sm">Lihat</a>
                        </td>
                        <td width="10%">
                            <a href="" data-toggle="modal" data-target="#editModal<?= $k->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url('dashboard-admin/manage-kriteria/hapus/'.$k->id) ?>" id="btnHapus<?= $no ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
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
                <?php $no++; endforeach; ?>
                </tbody>
            </table>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard-admin/manage-kriteria/tambah/') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Kriteria </label>
                                <input type="text" class="form-control" name="nama_kriteria" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btnTambah" class="btn btn-primary">Tambahkan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php foreach($kriteria as $k): ?>
<!-- Modal -->
<div class="modal fade" id="editModal<?= $k->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard-admin/manage-kriteria/edit/'.$k->id) ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Kriteria </label>
                                <input type="text" class="form-control" name="nama_kriteria" value="<?= $k->nama_kriteria ?>" required>
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