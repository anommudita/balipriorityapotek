<?php 


class Form_pemeriksaan_model extends CI_Model{

    // get all data form pemeriksaan join table pasien dan dokter 
    public function get_all_form_pemeriksaan($id_dokter)
    {
        $this->db->select(' form_pemeriksaan.id, form_pemeriksaan.S, form_pemeriksaan.O, form_pemeriksaan.A, form_pemeriksaan.P, form_pemeriksaan.date_created, record_pasien.id as id_pasien,record_pasien.nama as nama_pasien, user.nama as nama_dokter, user.id as id_dokter, record_pasien.no_rm as no_rm, record_pasien.nik as nik' );
        $this->db->from('form_pemeriksaan');
        $this->db->join('record_pasien', 'form_pemeriksaan.nama_pasien = record_pasien.id');
        $this->db->join('user', 'form_pemeriksaan.nama_dokter = user.id');
        $this->db->where('form_pemeriksaan.nama_dokter', $id_dokter);
        $query = $this->db->get();
        return $query;;
    }

    // form pemeriksaan by id
    public function get_all_form_pemeriksaan_by_id($id)
    {
        $this->db->select(' form_pemeriksaan.id, form_pemeriksaan.S, form_pemeriksaan.O, form_pemeriksaan.A, form_pemeriksaan.P, form_pemeriksaan.date_created, record_pasien.id as id_pasien, record_pasien.nama as nama_pasien, user.nama as nama_dokter, user.id as id_dokter, record_pasien.no_rm as no_rm');
        $this->db->from('form_pemeriksaan');
        $this->db->join('record_pasien', 'form_pemeriksaan.nama_pasien = record_pasien.id');
        $this->db->join('user', 'form_pemeriksaan.nama_dokter = user.id');
        $this->db->where('form_pemeriksaan.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }


    // form pemeriksaan by id
    public function get_all_form_pemeriksaan_by_id_pasien($id_pasien)
    {
        $this->db->select(' form_pemeriksaan.id, form_pemeriksaan.S, form_pemeriksaan.O, form_pemeriksaan.A, form_pemeriksaan.P, form_pemeriksaan.date_created, record_pasien.id as id_pasien, record_pasien.nama as nama_pasien, user.nama as nama_dokter, user.id as id_dokter, record_pasien.no_rm as no_rm');
        $this->db->from('form_pemeriksaan');
        $this->db->join('record_pasien', 'form_pemeriksaan.nama_pasien = record_pasien.id');
        $this->db->join('user', 'form_pemeriksaan.nama_dokter = user.id');
        $this->db->where('record_pasien.id', $id_pasien);
        $query = $this->db->get();
        return $query->row_array();
    }


    // tambah form pemeriksaan
    public function insert_form_pemeriksaan($id_dokter, $id_pasien)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'nama_pasien' => $id_pasien,
            'nama_dokter' => $id_dokter,
            'S' => $this->input->post('subjektif', true),
            'O' => $this->input->post('objektif', true),
            'A' => $this->input->post('assesment', true),
            'P' => $this->input->post('plan', true),
            'date_created' => date('Y/m/d H:i:s')
        ];

        $this->db->insert('form_pemeriksaan', $data);
    }

    // edit form pemeriksaaan
    public function edit_form_pemeriksaan($id_dokter,$id_pasien)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");
        $data = [
            'nama_pasien' => $id_pasien,
            'nama_dokter' => $id_dokter,
            'S' => $this->input->post('subjektif', true),
            'O' => $this->input->post('objektif', true),
            'A' => $this->input->post('assesment', true),
            'P' => $this->input->post('plan', true),
            'date_created' => date('Y/m/d H:i:s')
        ];

        $this->db->where('nama_pasien', $id_pasien);
        $this->db->update('form_pemeriksaan', $data);
    }


    // delete form pemeriksaan
    public function delete_form_pemeriksaan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('form_pemeriksaan');
    }
}
?>