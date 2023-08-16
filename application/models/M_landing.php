<?php
class M_landing extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
//=============================== SANTRI ===============================
    public function dt_mahasiswa()
    {
        $this->db->select('s.nim, s.nama_mahasiswa, g.nama_beasiswa');
        $this->db->from('mahasiswa s');
        $this->db->join('beasiswa g', 's.id_beasiswa = g.id_beasiswa','left');
        $query = $this->db->get();
        return $query->result_array();        
    }
}
?>