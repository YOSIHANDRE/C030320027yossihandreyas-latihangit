<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->login_kah();	//Memastikan hanya yang sudah login dapat akses fungsi ini
	}


	public function login_kah()
	{
		if ($this->session->has_userdata('username') && $this->session->userdata('id_level') == 1)
			return TRUE;
		else
			redirect(base_url('logout'));
	}


	public function index()
	{
		$data['judul']	= 'Selamat Datang ukm Poliban';
		$data['page']	= 'home';
		$data['jml_mahasiswa']	= $this->m_umum->jumlah_record_tabel('mahasiswatabel_yossihandreyas');
		$data['jml_ukm']	= $this->m_umum->jumlah_record_tabel('ukmtabel_yossihandreyas');
		$this->tampil($data);
	}

	//============================== mahasiswa ==============================
	public function mahasiswa()
	{
		$data['judul'] = 'Data mahasiswa';
		$data['page'] = 'mahasiswa';
		$data['mahasiswa'] = $this->m_admin->dt_mahasiswa();
		$this->tampil($data);
	}
	// public function mahasiswa_detil($id)
	// {
	// 	$data['judul'] = 'Detil Data mahasiswa TPA Aisyiah';
	// 	$data['page'] = 'mahasiswa_detil';
	// 	$data['d'] = $this->m_admin->dt_mahasiswa_detil($id);
	// 	$this->tampil($data);
	// }

	public function mahasiswa_tambah()
	{
		$data['judul'] = 'Tambah Data mahasiswa';
		$data['page'] = 'mahasiswa_tambah';

		$this->form_validation->set_rules(
			'nama_mahasiswa',
			'Nama mahasiswa',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('nim', 'Isikan NIM Mahasiswa', 'required');
		$this->form_validation->set_rules('nama_mahasiswa', 'Isikan Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Isikan Tanggal Lahir', 'required');

		//$data['ddukm'] = $this->m_admin->dropdown_ukm();

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_mahasiswa_tambah();
			redirect(base_url('admin/mahasiswa'));
		}
	}
	public function mahasiswa_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Data mahasiswa';
		$data['page'] = 'mahasiswa_edit';
		$this->form_validation->set_rules(
			'nama_mahasiswa',
			'Nama mahasiswa',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('nim', 'Isikan NIM Mahasiswa', 'required');
		$this->form_validation->set_rules('nama_mahasiswa', 'Isikan Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Isikan Tanggal Lahir', 'required');

		//$data['ddukm'] = $this->m_admin->dropdown_ukm();
		$data['d'] = $this->m_umum->cari_data('mahasiswatabel_yossihandreyas', 'nim', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_mahasiswa_edit($id);
			redirect(base_url('admin/mahasiswa'));
		}
	}

	public function mahasiswa_hapus($id)
	{
		$this->m_umum->hapus_data('mahasiswatabel_yossihandreyas', 'nim', $id);
		redirect(base_url('admin/mahasiswa'));
	}


	//============================== UKM ==============================
	public function ukm()
	{
		$data['judul'] = 'Data UKM';
		$data['page'] = 'ukm';
		$data['ukm'] = $this->m_admin->dt_ukm();
		$this->tampil($data);
	}

	public function ukm_tambah()
	{
		$data['judul'] = 'Tambah Data Ukm';
		$data['page'] = 'ukm_tambah';

		$this->form_validation->set_rules(
			'nama_ukm',
			'Nama UKM',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('nama_ukm', 'Isikan Nama ukm', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->ukm_tambah();
			redirect(base_url('admin/ukm'));
		}
	}

	public function ukm_edit($id = FALSE)
	{
		$data['judul'] = 'EDIT data ukm';
		$data['page'] = 'ukm_edit';

		$this->form_validation->set_rules(
			'nama_ukm',
			'Nama ukm',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('nama_ukm', 'Isikan Nama ukm', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		$data['d'] = $this->m_umum->cari_data('ukmtabel_yossihandreyas', 'id_ukm', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_ukm_edit($id);
			redirect(base_url('admin/ukm'));
		}
	}

	public function ukm_hapus($id)
	{
		$this->m_umum->hapus_data('ukmtabel_yossihandreyas', 'id_ukm', $id);
		redirect(base_url('admin/ukm'));
	}

	//==================================== Anggota UKM =========================
	public function anggota_ukm()
	{
		$data['judul'] = 'Data UKM';
		$data['page'] = 'anggota_ukm';
		$data['anggota_ukm'] = $this->m_admin->dt_anggotaukm();
		$this->tampil($data);
	}

	public function anggotaukm_tambah()
	{
		$data['judul'] = 'Tambah Data Ukm';
		$data['page'] = 'anggotaukm_tambah';

		$this->form_validation->set_rules(
			'nim',
			'nim',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('nim', 'Pilih NIM Mahasiswa', 'callback_dd_cek');
		$this->form_validation->set_rules('id_ukm', 'Pilih UKM', 'callback_dd_cek');
		$data['ddmahasiswa'] = $this->m_admin->dropdown_mahasiswa();
		$data['ddukm'] = $this->m_admin->dropdown_ukm();
		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->anggotaukm_tambah();
			redirect(base_url('admin/anggota_ukmtabel_yossihandreyas'));
		}
	}

	public function anggotaukm_edit($id = FALSE)
	{
		$data['judul'] = 'EDIT Anggota ukm';
		$data['page'] = 'anggotaukm_edit';

		$this->form_validation->set_rules(
			'nim',
			'nim',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('nim', 'Pilih NIM Mahasiswa', 'callback_dd_cek');
		$this->form_validation->set_rules('id_ukm', 'Pilih UKM', 'callback_dd_cek');
		$data['ddmahasiswa'] = $this->m_admin->dropdown_mahasiswa();
		$data['ddukm'] = $this->m_admin->dropdown_ukm();

		$data['d'] = $this->m_umum->cari_data('anggota_ukmtabel_yossihandreyas', 'id_anggota', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_anggotaukm_edit($id);
			redirect(base_url('admin/anggota_ukm'));
		}
	}

	public function anggotaukm_hapus($id)
	{
		$this->m_umum->hapus_data('anggota_ukmtabel_yossihandreyas', 'id_anggota', $id);
		redirect(base_url('admin/anggota_ukm'));
	}

	// //============================== kelas ==============================
	// public function kelas()
	// {
	// 	$data['judul'] = 'Data kelas TPA Aisyiah';
	// 	$data['page'] = 'kelas';
	// 	$data['kelas'] = $this->m_admin->dt_kelas();
	// 	$this->tampil($data);
	// }

	// public function kelas_tambah()
	// {
	// 	$data['judul'] = 'Tambah Data kelas TPA Aisyiah';
	// 	$data['page'] = 'kelas_tambah';

	// 	$this->form_validation->set_rules('nama_kelas', 'Isikan Nama kelas', 'required');

	// 	if ($this->form_validation->run() === FALSE) {
	// 		$this->tampil($data);
	// 	} else {
	// 		$this->m_admin->kelas_tambah();
	// 		redirect(base_url('admin/kelas'));
	// 	}
	// }

	// public function kelas_edit($id = FALSE)
	// {
	// 	$data['judul'] = 'EDIT data kelas TPA Aisyiah Attaqwa';
	// 	$data['page'] = 'kelas_edit';

	// 	$this->form_validation->set_rules(
	// 		'nama_kelas',
	// 		'Nama kelas',
	// 		'required|min_length[3]|max_length[30]',
	// 		array('required' => '%s harus diisi.')
	// 	);
	// 	$data['d'] = $this->m_umum->cari_data('kelas', 'id_kelas', $id);

	// 	if ($this->form_validation->run() === FALSE) {
	// 		$this->tampil($data);
	// 	} else {
	// 		$this->m_admin->dt_kelas_edit($id);
	// 		redirect(base_url('admin/kelas'));
	// 	}
	// }

	// public function kelas_hapus($id)
	// {
	// 	$this->m_umum->hapus_data('kelas', 'id_kelas', $id);
	// 	redirect(base_url('admin/kelas'));
	// }


	// //============================== SETORAN ==============================
	// public function setoran()
	// {
	//     $data['judul'] = 'Data Setoran TPA Aisyiah';
	//     $data['page'] = 'setoran';
	//     $data['setoran'] = $this->m_admin->dt_setoran();
	//     $this->tampil($data);
	// }
	// public function setoran_detail($id)
	// {
	//     $data['judul'] = 'Detail Data Setoran mahasiswa TPA Aisyiah';
	//     $data['page'] = 'setoran_detail';
	//     $data['set'] = $this->m_admin->dt_setoran_detail($id);
	//     $this->tampil($data);
	// }

	// //============================== LIST mahasiswa per kelas ==============================
	// public function list_mahasiswa_per_kelas($id = NULL)
	// {
	// 	$data['judul'] = 'Data mahasiswa Tiap kelas di TPA Aisyiah';
	// 	$data['page'] = 'list_mahasiswa_per_kelas';
	// 	$data['ddkelas'] = $this->m_admin->dropdown_kelas();
	// 	$data['mahasiswa'] = $this->m_admin->dt_mahasiswa_per_kelas($id);
	// 	$data['kelas'] = $this->m_admin->dt_kelas();
	// 	$this->tampil($data);
	// }



	//============ Tools ===============
	function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
	{
		if ($str == '-Pilih-') {
			$this->form_validation->set_message('dd_cek', 'Harus dipilih');
			return FALSE;
		} else
			return TRUE;
	}

	function tampil($data)
	{
		$this->load->view('admin/header', $data);
		$this->load->view('admin/isi');
		$this->load->view('admin/footer');
	}
}
