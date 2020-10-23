<div class="container mt-5">
    <h3 class="text-center mb-5">LAPORAN BEASISWA <?= $beasiswa_peserta->nama ?></h3>
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>Npm</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
            <th>Total Nilai</th>
            <th>Status Kelolosan</th>
        </thead>
        <tbody>
            <?php 
                $no=1;
                foreach($peserta as $p):
                    foreach($users as $user):
                        if ($user->id == $p->user_id) {
                            echo "<tr>
                                    <td>".$no."</td>
                                    <td>".$user->nama."</td>
                                    <td>".$user->npm."</td>
                                    <td>".$user->fakultas."</td>
                                    <td>".$user->jurusan."</td>
                                    <td>".$p->total."</td>";
                            if ($no <= $beasiswa_peserta->kuota) {
                                echo "<td class='text-center'><span class='badge badge-success'>LOLOS</span></td>";
                            }else{
                                echo "<td class='text-center'><span class='badge badge-danger'>TIDAK LOLOS</span></td>";
                            }
                        }
                    endforeach;
                $no++;
                endforeach;
            ?>
        </tbody>
    </table>
</div>
<script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script>
    window.print();
</script>