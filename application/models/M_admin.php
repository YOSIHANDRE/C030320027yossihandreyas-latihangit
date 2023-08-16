<?php
class M_admin extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    //=============================== mahasiswa ===============================
    public function dt_mahasiswa()
    {
        $this->db->select('s.nim, s.nama_mahasiswa, s.alamat_mahasiswa, s.tanggal_lahir');
        $this->db->from('mahasiswatabel_yossihandreyas s');
        //$this->db->join('beasiswa g', 's.id_beasiswa = g.id_beasiswa','left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function dt_mahasiswa_detil($id)
    {
        $this->db->select('s.nim, s.nama_mahasiswa, s.alamat_mahasiswa');
        $this->db->from('mahasiswatabel_yossihandreyas s');
        //$this->db->join('beasiswa g', 's.id_beasiswa = g.id_beasiswa','left');
        $this->db->where('nim', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function dt_mahasiswa_tambah()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'alamat_mahasiswa' => $this->input->post('alamat_mahasiswa'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        );
        return $this->db->insert('mahasiswatabel_yossihandreyas', $data);
    }

    public function dt_mahasiswa_edit($id)
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
            'alamat_mahasiswa' => $this->input->post('alamat_mahasiswa'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        );
        $this->db->where('nim', $id);
        return $this->db->update('mahasiswatabel_yossihandreyas', $data);
    }

    //=============================== UKM ===============================
    public function dt_ukm($id = FALSE)
    {
        $this->db->select('s.id_ukm, s.nama_ukm, s.deskripsi');
        $this->db->from('ukmtabel_yossihandreyas s');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function ukm_tambah()
    {
        $data = array(
            'nama_ukm' => $this->input->post('nama_ukm'),
            'deskripsi' => $this->input->post('deskripsi'),
        );

        return $this->db->insert('ukmtabel_yossihandreyas', $data);
    }

    public function dt_ukm_edit($id)
    {
        $data = array(
            'nama_ukm' => $this->input->post('nama_ukm'),
            'deskripsi' => $this->input->post('deskripsi'),
        );
        $this->db->where('id_ukm', $id);
        return $this->db->update('ukmtabel_yossihandreyas', $data);
    }
    //====================================== Anggota UKM ========================
    public function dropdown_mahasiswa()
    {
        $query = $this->db->get('mahasiswatabel_yossihandreyas');
        $result = $query->result();

        $nim = array('-Pilih-');
        $nama_mahasiswa = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($nim, $result[$i]->nim);
            array_push($nama_mahasiswa, $result[$i]->nama_mahasiswa);
        }
        return array_combine($nim, $nama_mahasiswa);
    }

    public function dropdown_ukm()
    {
        $query = $this->db->get('ukmtabel_yossihandreyas');
        $result = $query->result();

        $id_ukm = array('-Pilih-');
        $nama_ukm = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_ukm, $result[$i]->id_ukm);
            array_push($nama_ukm, $result[$i]->nama_ukm);
        }
        return array_combine($id_ukm, $nama_ukm);
    }

    public function dt_anggotaukm($id = FALSE)
    {
        $this->db->select('s.id_anggota, g.nim, u.id_ukm, u.nama_ukm');
        $this->db->from('anggota_ukmtabel_yossihandreyas s');
        $this->db->join('mahasiswatabel_yossihandreyas g', 's.nim = g.nim', 'left');
        $this->db->join('ukmtabel_yossihandreyas u', 's.id_ukm = u.id_ukm', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function anggotaukm_tambah()
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'id_ukm' => $this->input->post('id_ukm'),
        );

        return $this->db->insert('anggota_ukmtabel_yossihandreyas', $data);
    }

    public function dt_anggotaukm_edit($id)
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'id_ukm' => $this->input->post('id_ukm'),
        );
        $this->db->where('id_anggota', $id);
        return $this->db->update('anggota_ukmtabel_yossihandreyas', $data);
    }
}
    // //=============================== kelas ===============================
    // public function dt_kelas($id = FALSE)
    // {
    //     $this->db->select('s.nim, s.nama_mahasiswa');
    //     $this->db->from('kelas s');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function kelas_tambah()
    // {
    //     $data = array(
    //         'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
    //     );

    //     return $this->db->insert('kelas', $data);
    // }

    // public function dt_kelas_edit($id)
    // {
    //     $data = array(
    //         'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
    //     );
    //     $this->db->where('nim', $id);
    //     return $this->db->update('kelas', $data);
    // }
//     //=============================== DATA mahasiswa PER KELAS===============================
//     public function dt_mahasiswa_per_kelas($id)
//     {
//         $this->db->select('s.nim, s.nama_mahasiswa, s.alamat_mahasiswa, g.nama_beasiswa');
//         $this->db->from('mahasiswa s');
//         $this->db->join('beasiswa g', 's.id_beasiswa = g.id_beasiswa', 'left');
//         $this->db->where('s.nim',$id);
//         $query = $this->db->get();
//         return $query->result_array();
//     }
//     //=============================== SETORAN READ ONLY ===============================

//     public function dt_setoran()
//     {
//         $this->db->select('*');
//         $this->db->from('setoran set');
//         $this->db->join('mahasiswa s', 's.nim = set.nim');
//         $this->db->order_by('tgl_setoran', 'desc');
//         $query = $this->db->get();
//         return $query->result_array();
//     }
//     public function dt_setoran_detail($id)
//     {
//         $this->db->select('*');
//         $this->db->from('setoran set');
//         $this->db->join('mahasiswa s', 's.nim = set.nim', 'left');
//         $this->db->where('id_setoran', $id);
//         $query = $this->db->get();
//         return $query->row_array();
//     }
    
// }