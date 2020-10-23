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
                            <div class="col-lg-12">
                                <div class="card mb-10">
                                    <div class="card-body">
                                    <form action="<?= base_url('user-panel/persyaratan/tambah') ?>" method="post" enctype="multipart/form-data">
                                        <table class="table table-borderless">
                                            <thead>
                                                <th>Syarat</th>
                                                <th></th>
                                                <th>Pilihan</th>
                                                <th>Photo Bukti</th>
                                            </thead>
                                            <?php 
                                                foreach($kriteria as $k):
                                            ?>
                                                <tr>
                                                    <td><?= $k->nama_kriteria ?><input type="text" name="kriteria_id[]" value="<?= $k->id ?>" hidden></td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="subkriteria_id[]" id="" class="form-control">
                                                        <?php 
                                                            foreach($subkriteria as $sb):
                                                                if ($sb->kriteria_id == $k->id) {
                                                                    echo "<option value='".$sb->id."'>".$sb->nama_subkriteria."</option>";
                                                                }
                                                            endforeach
                                                        ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="file" name="photo[]" class="form-control">
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </table>
                                        <div class="form-group float-right">
                                            <input type="submit" class="genric-btn info" value="Simpan">
                                        </div>
                                    </form>
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
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
