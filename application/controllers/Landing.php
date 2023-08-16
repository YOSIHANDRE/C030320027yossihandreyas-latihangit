<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_landing');
    }

	public function index()
	{
		$data['judul']	='Selamat Datang di Beasiswa Poliban';
		$data['page']	='home';
        // $data['jml_santri']	=$this->m_umum->jumlah_record_tabel('santri');
        // $data['jml_guru']	=$this->m_umum->jumlah_record_tabel('guru');
        $data['beasiswa'] = $this->m_landing->dt_mahasiswa();
		$this->tampil($data);
	}

	function tampil($data)
	{
		$this->load->view('landing/header',$data);
		$this->load->view('landing/isi');
		$this->load->view('landing/footer');
	}
}



