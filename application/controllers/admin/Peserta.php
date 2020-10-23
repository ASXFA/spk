<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogged') != 1) {
			redirect('spk_admin');
        }
        $this->load->model('peserta_model');
	}

	public function index()
	{
		$this->load->model('beasiswa_model');
		$this->load->model('peserta_model');
		if (isset($_GET['idBeasiswa'])) {
			$id = $_GET['idBeasiswa'];
			$data['peserta'] = $this->peserta_model->getByBeasiswa($id);
			$data['beasiswa_peserta'] = $this->beasiswa_model->getById($id)->row();

		}
		$this->load->model('users_model');
		$data['beasiswa'] = $this->beasiswa_model->getAll()->result();
		$data['users'] = $this->users_model->getAllByLevel(1)->result();
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sider');
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/peserta',$data);
		$this->load->view('admin/template/footer');
	}

	public function tambah($id_beasiswa)
	{
		$this->load->model('user_persyaratan_model');
		$this->load->model('sub_kriteria_model');
		$this->load->model('nilai_prioritas_model');
		$this->load->model('kriteria_prioritas_model');
		$id_peserta = $this->session->userdata('id');
		$user_persyaratan = $this->user_persyaratan_model->getById($id_peserta)->result();
		$subkriteria = $this->sub_kriteria_model->getAll()->result();
		$nilai_prioritas = $this->nilai_prioritas_model->getAll()->result();
		$kriteria_prioritas = $this->kriteria_prioritas_model->getAll()->result();
		$nilai_user = [];
		$total_nilai_user = [];
		foreach($user_persyaratan as $up):
			foreach($subkriteria as $sk):
				if ($sk->id == $up->subkriteria_id) {
					foreach($nilai_prioritas as $np):
						if ($np->nilai_id == $sk->nilai_id) {
							array_push($nilai_user,number_format($np->subprioritas,2));
						}
					endforeach;
				}
			endforeach;
		endforeach;
		$no = 0;
		foreach($kriteria_prioritas as $kp):
			$nilai = $kp->prioritas * $nilai_user[$no];
			array_push($total_nilai_user,$nilai);
			$no++;
		endforeach;

		$jumlah = array_sum($total_nilai_user);
		$query = $this->peserta_model->tambah($id_beasiswa,$jumlah);
		if ($query) {
            redirect('dashboard-admin/manage-beasiswa/ediJmlh/'.$id_beasiswa);
		}
	}

	public function kirimNotifikasi($id_beasiswa)
	{
		$this->load->model('beasiswa_model');
		$this->load->model('users_model');
		$peserta = $this->peserta_model->getByBeasiswa($id_beasiswa)->result();
		$beasiswa_peserta = $this->beasiswa_model->getById($id_beasiswa)->row();
		$user = $this->users_model->getAllByLevel(1)->result();
		$emailLolos = [];
		$emailTidakLolos = [];
		$no =1;
		foreach($peserta as $p):
			foreach($user as $u):
				if ($u->id == $p->user_id) {
					if ($no <= $beasiswa_peserta->kuota) {
						array_push($emailLolos,$u->email);
					}else if($no > $beasiswa_peserta->kuota){
						array_push($emailTidakLolos,$u->email);
					}
				}
			endforeach;
		$no++;
		endforeach;

		// load mailer
		$this->load->library('phpmailer_lib');

		// php mailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP CONFIG
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'rachman.agustian12@gmail.com';
		$mail->Password = 'fahry12031995';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('info@ifunla.com','IFUNLA');
		$mail->addReplyTo('info@ifunla.com','IFUNLA');
		$countEmail = count($emailLolos);
		// tambah penerima
		for($i=0; $i<$countEmail; $i++){
			$mail->addAddress($emailLolos[$i]);
		}

		// Email subject
		$mail->Subject = 'SELAMAT ANDA LOLOS !';

		// set email format to HTML
		$mail->isHTML(true);
		
		// Email body content
		$mailContent = "<h1> Selamat Anda telah berkesempatan menadapatkan beasiswa ".$beasiswa_peserta->nama." ! </h1>
			<p> Untuk kegiatan penandatanganan dan pencairan dana beasiswa, silahkan hubungi pihak akademin dengan menyertakan bukti pesan ini ! </p>    
			<p>Beasiswa ini bentuk dari apresiasi instansi untuk kawan-kawan mahasiswa/i agat digunakan dengan sebaik-baiknya.</p>
			<br>
			<h5> Regards, </h5>
			<h5> Tim Administrasi </h5>    
		";
		$mail->Body = $mailContent;
		$mail->send();

		$mail->ClearAllRecipients();
		$countEmail2 = count($emailTidakLolos);
		// tambah penerima
		for($i=0; $i<$countEmail2; $i++){
			$mail->addAddress($emailTidakLolos[$i]);
		}

		// Email subject
		$mail->Subject = 'MOHON MAAF ANDA BELUM LOLOS !';

		// set email format to HTML
		$mail->isHTML(true);
		
		// Email body content
		$mailContent = "<h1> Maaf Anda belum berkesempatan menadapatkan beasiswa ".$beasiswa_peserta->nama." :( </h1>
			<p> Anda belum memnuhi kualifikasi dari beasiswa ini, silahkan coba kembali bila ada kesempatan. </p>    
			<p>Jangan patah semangat yaa ! tetap belajar dan dapatkan ilmu yang bermanfaat bagi kamu dan masyarakat sekitar ...</p>
			<br>
			<h5> Regards, </h5>
			<h5> Tim Administrasi </h5>    
		";
		$mail->Body = $mailContent;
		$mail->send();
		redirect('dashboard-admin/manage-peserta');
	}

	public function cetak($id_beasiswa)
	{
		$this->load->model('beasiswa_model');
		$this->load->model('users_model');
		$data['peserta'] = $this->peserta_model->getByBeasiswa($id_beasiswa)->result();
		$data['beasiswa_peserta'] = $this->beasiswa_model->getById($id_beasiswa)->row();
		$data['users'] = $this->users_model->getAllByLevel(1)->result();
		$this->load->view('admin/template/header');
		$this->load->view('admin/cetak',$data);
		$this->load->view('admin/template/footer');
	}

	// public function edit($id,$kriteria_id)
	// {
	// 	$query = $this->sub_kriteria_model->edit($id);
	// 	if ($query) {
	// 		$this->session->set_flashdata('kondisi','1');
	// 		$this->session->set_flashdata('subPesan','Sub Kriteria berhasil ditambahkan !');
	// 		redirect('dashboard-admin/manage-subkriteria/'.$kriteria_id);
	// 	}else{
	// 		$this->session->set_flashdata('kondisi','0');
	// 		$this->session->set_flashdata('subPesan','Sub Kriteria gagal ditambahkan !');
	// 		redirect('dashboard-admin/manage-subkriteria/'.$kriteria_id);
	// 	}
	// }

	// public function hapus($id,$kriteria_id)
	// {
	// 	$query = $this->sub_kriteria_model->hapus($id);
    //     if ($query) {
    //         $this->session->set_flashdata('kondisi','1');
    //         $this->session->set_flashdata('subPesan','Sub Kriteria berhasil dihapus !');
    //         redirect('dashboard-admin/manage-subkriteria/'.$kriteria_id);
    //     }else{
    //         $this->session->set_flashdata('kondisi','0');
    //         $this->session->set_flashdata('subPesan','Sub Kriteria gagal dihapus !');
    //         redirect('dashboard-admin/manage-subkriteria/'.$kriteria_id);
    //     }
	// }

}
