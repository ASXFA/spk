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
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary d-inline">Data Beasiswa </h6>
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
                        <th>Nama Beasiswa </th>
                        <th>Vendor</th>
                        <th>Kuota</th>
                        <th>Jumlah Peserta</th>
                        <th>Mulai Periode</th>
                        <th>Akhir Periode</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($beasiswa as $b): ?>
                    <tr>
                        <td class="text-center"><?= $no ?></td>
                        <td><?= $b->nama ?></td>
                        <td><?= $b->vendor ?></td>
                        <td><?= $b->kuota ?></td>
                        <td><?= $b->jumlah_peserta ?></td>
                        <td><?= $b->periode_awal ?></td>
                        <td><?= $b->periode_akhir ?></td>
                        <td>
                            <?php 
                                $tgl_skrg = date('Y-m-d');
                                if($tgl_skrg < $b->periode_awal){
                                    echo "<span class='badge badge-warning'>Belum Tayang</span>";
                                }else if($b->periode_awal == $tgl_skrg || ($tgl_skrg > $b->periode_awal) && ($tgl_skrg <= $b->periode_akhir) ){
                                    echo "<span class='badge badge-success'>Sudah Tayang</span>";
                                }else if($tgl_skrg >= $b->periode_akhir ){
                                    echo "<span class='badge badge-secondary'>Sudah Berakhir</span>";
                                }
                            ?>
                            <!-- <span class="badge badge-warning">Belum Tayang</span> -->
                        </td>
                        <td>
                            <a href="<?= base_url('assets/file/beasiswa/'.$b->file) ?>" class="btn btn-primary btn-sm"><i class="fa fa-download" title="download file"></i></a>
                            <!-- <a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye" title="detail"></i></a> -->
                            <a href="" data-toggle="modal" data-target="#editModal<?= $b->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit" title="edit"></i></a>
                            <a href="<?= base_url('dashboard-admin/manage-beasiswa/hapus/'.$b->id) ?>" class="btn btn-primary btn-sm" id="btnHapus<?= $no ?>"><i class="fa fa-trash" title="hapus"></i></a>
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
                        </td>
                    </tr>
                    <?php $no++; endforeach ?>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Beasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard-admin/manage-beasiswa/tambah/') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Beasiswa  </label>
                                <input type="text" class="form-control" name="nama_beasiswa" required>
                            </div>
                            <div class="form-group">
                                <label for="vendor" class="form-control-label">Vendor </label>
                                <input type="text" class="form-control" name="vendor" required>
                            </div>
                            <div class="form-group">
                                <label for="kuota" class="form-control-label">Kuota Peserta </label>
                                <input type="number" class="form-control" min="0" name="kuota" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="periode_mulai" class="form-control-label">Mulai Periode </label>
                                <input type="date" class="form-control" id="periodeMulai" name="periode_awal" required>
                            </div>
                            <div class="form-group">
                                <label for="periode_akhir" class="form-control-label">Akhir Periode </label>
                                <input type="date" class="form-control" id="periodeAkhir" name="periode_akhir" required>
                            </div>
                            <div class="form-group">
                                <label for="file_beasiswa" class="form-control-label">File Beasiswa </label>
                                <input type="file" class="form-control" name="file_beasiswa" required>
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

<!-- Modal -->
<?php foreach($beasiswa as $b): ?>
<div class="modal fade" id="editModal<?= $b->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Beasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dashboard-admin/manage-beasiswa/edit/'.$b->id) ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama" class="form-control-label">Nama Beasiswa  </label>
                                <input type="text" class="form-control" name="nama_beasiswa" value="<?= $b->nama ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="vendor" class="form-control-label">Vendor </label>
                                <input type="text" class="form-control" name="vendor" value="<?= $b->vendor ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="kuota" class="form-control-label">Kuota Peserta </label>
                                <input type="number" class="form-control" min="0" name="kuota" value="<?= $b->kuota ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="periode_mulai" class="form-control-label">Mulai Periode </label>
                                <input type="date" class="form-control" id="periodeMulai" name="periode_awal" value="<?= $b->periode_awal ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="periode_akhir" class="form-control-label">Akhir Periode </label>
                                <input type="date" class="form-control" id="periodeAkhir" name="periode_akhir" value="<?= $b->periode_akhir ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="file_beasiswa" class="form-control-label">File Beasiswa </label>
                                <input type="file" class="form-control" name="file_beasiswa_new">
                                <input type="text" class="form-control" name="file_beasiswa_old" value="<?= $b->file ?>" hidden>
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
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>