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
                    <tr>
                        <td class="text-center">1</td>
                        <td>BAWAKU</td>
                        <td>Pemprov Jabar</td>
                        <td>100</td>
                        <td>0</td>
                        <td>12-11-2020</td>
                        <td>20-11-2020</td>
                        <td><span class="badge badge-warning">Belum Tayang</span></td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-download" title="download file"></i></a>
                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye" title="detail"></i></a>
                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit" title="edit"></i></a>
                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-trash" title="hapus"></i></a>
                        </td>
                    </tr>
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
                <form action="<?= base_url('dashboard-admin/manage-users/tambah/'.$this->uri->segment(3)) ?>" method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="periodeMulai" name="periode_mulai" required>
                            </div>
                            <div class="form-group">
                                <label for="periode_akhir" class="form-control-label">Akhir Periode </label>
                                <input type="text" class="form-control" id="periodeAkhir" name="periode_akhir" required>
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
                <button type="submit" disabled id="btnTambah" class="btn btn-primary">Tambahkan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/vendor/datepicker/bootstrap-datepicker3.js"></script>
<script>
    $(function(){
        $("#periodeMulai").datepicker({ 
            autoclose: true, 
            format: 'dd MM yyyy'
        });
    })
</script>