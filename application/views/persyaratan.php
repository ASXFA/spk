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
                                <h4><a href="<?= base_url('user-panel') ?>"><i class="fa fa-arrow-left"></i> Kembali</a></h4>
                                <div class="card mt-10 mb-10">
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <?php
                                                if(empty($user_persyaratan)){
                                            ?>
                                                    <!-- script ALERT DELETE -->
                                                    <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
                                                    <script>
                                                        const url = '<?= base_url('user-panel/persyaratan/isi-persyaratan') ?>';
                                                        const urlBalik = '<?= base_url('user-panel') ?>';
                                                        swal.fire({
                                                            title: 'Anda belum melengkapi berkas !',
                                                            text: 'Silahkan lengkapi dulu berhas anda',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Ayo !'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                window.location.href = url;   
                                                            }else{
                                                                window.location.href = urlBalik;
                                                            }
                                                        });
                                                    </script>
                                                    <!-- END SCRIPT ALERT DELETE -->
                                            <?php
                                                }else{
                                                    $no = 1;
                                                    foreach($user_persyaratan as $up):
                                                        echo "<tr>";
                                                        foreach($kriteria as $k):
                                                            if($k->id == $up->kriteria_id){
                                                                echo "<td>".$k->nama_kriteria."</td>";
                                                                echo "<td>:</td>";
                                                            }
                                                        endforeach;
                                                        foreach($subkriteria as $sk):
                                                            if($sk->id == $up->subkriteria_id){
                                                                echo "<td>".$sk->nama_subkriteria."</td>";
                                                            }
                                                        endforeach;
                                                        echo "<td><button id='lihat".$no."' class='genric-btn info'>Lihat</button></td>";
                                            ?>
                                                        <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
                                                        <script>
                                                            $('#lihat<?= $no ?>').on('click', function (e) {
                                                                e.preventDefault();
                                                                Swal.fire({
                                                                    imageUrl: '<?= base_url('assets/user/img/persyaratan/'.$up->photo) ?>',
                                                                    imageWidth: 500,
                                                                    imageHeight: 400,
                                                                    imageAlt: 'Custom image',
                                                                });
                                                            });
                                                        </script>
                                            <?php
                                                        echo "</tr>";
                                                    $no++;
                                                    endforeach;
                                            ?>
                                                    
                                            <?php
                                                }
                                            ?>
                                        </table>
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
