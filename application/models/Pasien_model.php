<?php 

class Pasien_model extends CI_Model{
    // get all data data pasien
    public function get_all_data_pasien()
    {
        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.date_created, record_pasien.jenis_kelamin, pasien.no_rekam_medis');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->join('pasien', 'record_pasien.nik = pasien.nik');
        $query = $this->db->get();
        return $query;
    }



    // get all data data pasien by dokter
    public function get_record_pasien_by_dokter($id_dokter)
    {
        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.date_created, record_pasien.jenis_kelamin, pasien.no_rekam_medis');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->join('pasien', 'record_pasien.nik = pasien.nik');
        $this->db->where('record_pasien.dokter', $id_dokter);
        $query = $this->db->get();
        return $query;
    }


    // get all data data pasien by tanggal
    public function get_all_data_pasien_by_date($from_date, $to_date)
    {
        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.date_created');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->where('record_pasien.date_created >=', $from_date);
        $this->db->where('record_pasien.date_created <=', $to_date);
        $query = $this->db->get();
        return $query;
    }


    // get all data data pasien by nik
    public function get_all_data_pasien_by_nik($nik)
    {
        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.date_created');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->where('record_pasien.nik', $nik);
        $query = $this->db->get();
        return $query;
    }


    // get all data data pasien by dokter
    public function get_all_data_pasien_by_id_dokter($id_dokter)
    {
        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.date_created');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->where('record_pasien.dokter', $id_dokter);
        $query = $this->db->get();
        return $query;
    }



    // count all data pasien
    public function count_all_pasien(){
        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.date_created');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    // get data pasien by id_dokter
    public function get_all_data_pasien_by_dokter($username){
        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.date_created, record_pasien.jenis_kelamin');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->where('user.username', $username);
        $query = $this->db->get();
        return $query;
    }

    // untuk antrian pasien - hanya menampilkan data sehari saja
    public function get_pasien_today(){
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.status, record_pasien.date_created,record_pasien.jenis_kelamin, pasien.no_rekam_medis');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->join('pasien', 'record_pasien.nik = pasien.nik');
        $this->db->where('record_pasien.date_created', date('Y-m-d'));
        $query = $this->db->get();
        return $query->result_array();
    }

    // count data pasien yang sedang mengantri
    public function count_all_antrian_pasien(){
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.status, record_pasien.date_created, record_pasien.jenis_kelamin');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->where('record_pasien.date_created', date('Y-m-d'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    // untuk antrian pasien melalui dokter - hanya menampilkan data sehari saja
    public function get_pasien_today_by_dokter($id_dokter)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.status, record_pasien.date_created, record_pasien.jenis_kelamin, record_pasien.status_periksa as status_periksa, record_pasien.status_invoice as status_invoice, pasien.no_rekam_medis');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->join('pasien', 'record_pasien.nik = pasien.nik');
        $this->db->where('record_pasien.date_created', date('Y-m-d'));
        $this->db->where('record_pasien.dokter', $id_dokter);
        return $query = $this->db->get();
        return $query;
    }

    // untuk antrian pasien melalui dokter kecuali id 
    public function get_pasien_today_by_dokter_kecuali_id($id_dokter, $id)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.status, record_pasien.date_created');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->where('record_pasien.date_created', date('Y-m-d'));
        $this->db->where('record_pasien.dokter', $id_dokter);
        $this->db->where('record_pasien.id !=', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get data pasien by id
    public function get_data_pasien_by_id($id)
    {
        $this->db->select('record_pasien.id, record_pasien.no_rm, record_pasien.nik, record_pasien.nama, record_pasien.tanggal_lahir, record_pasien.umur, record_pasien.alamat, record_pasien.no_tlp, user.nama as nama_dokter, record_pasien.date_created, user.id as id_dokter, record_pasien.nama as nama_pasien, record_pasien.id as id_pasien, record_pasien.jenis_kelamin, pasien.no_rekam_medis');
        $this->db->from('record_pasien');
        $this->db->join('user', 'record_pasien.dokter = user.id');
        $this->db->join('pasien', 'record_pasien.nik = pasien.nik');
        $this->db->where('record_pasien.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // get data pasien by nik
    public function get_data_pasien_by_nik($nik){
        return $this->db->get_where('record_pasien', ['nik' => $nik])->row_array();
    }


    // tambah pasien
    public function insert_pasien()
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'no_rm' => $this->input->post('no_rm', true),
            'nik' => $this->input->post('nik', true),
            'nama' => $this->input->post('nama', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'umur' => $this->input->post('umur', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'alamat' => $this->input->post('alamat', true),
            'no_tlp' => $this->input->post('no_tlp', true),
            'dokter' => $this->input->post('dokter', true),
            'status' => 0,
            'date_created' => date('Y/m/d H:i:s'),
        ];

        $this->db->insert('record_pasien', $data);
    }


    // tambah pasien melalui dokter 
    public function insert_pasien_by_dokter($id){
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'no_rm' => $this->input->post('no_rm', true),
            'nik' => $this->input->post('nik', true),
            'nama' => $this->input->post('nama', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'umur' => $this->input->post('umur', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'alamat' => $this->input->post('alamat', true),
            'no_tlp' => $this->input->post('no_tlp', true),
            'dokter' => $id,
            'status' => 0,
            'date_created' => date('Y/m/d H:i:s'),
        ];

        $this->db->insert('record_pasien', $data);
    }

    // edit pasien melalui dokter
    public function edit_pasien_by_dokter($id, $id_dokter)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'no_rm' => $this->input->post('no_rm', true),
            'nik' => $this->input->post('nik', true),
            'nama' => $this->input->post('nama', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'umur' => $this->input->post('umur', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'alamat' => $this->input->post('alamat', true),
            'no_tlp' => $this->input->post('no_tlp', true),
            'dokter' => $id_dokter,
            'status' => 0,
            'date_created' => date('Y/m/d H:i:s'),

        ];
        $this->db->where('id', $id);
        $this->db->update('record_pasien', $data);
    }

    // edit pasien
    public function edit_pasien($id)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'no_rm' => $this->input->post('no_rm', true),
            'nik' => $this->input->post('nik', true),
            'nama' => $this->input->post('nama', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'umur' => $this->input->post('umur', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'alamat' => $this->input->post('alamat', true),
            'no_tlp' => $this->input->post('no_tlp', true),
            'dokter' => $this->input->post('dokter', true),
            'status' => 0,
            'date_created' => date('Y/m/d H:i:s'),

        ];
        $this->db->where('id', $id);
        $this->db->update('record_pasien', $data);
    }

    // delete pasien
    public function delete_pasien($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('record_pasien');
    }

    // change status pasien 
    public function change_status_pasien($id, $status){
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update('record_pasien');
    }

    // change status pemeriksaan
    public function change_status_pemeriksaan($id, $status)
    {
        $this->db->set('status_periksa', $status);
        $this->db->where('id', $id);
        $this->db->update('record_pasien');
    }

    // change status invoice
    public function change_status_invoice($id, $status)
    {
        $this->db->set('status_invoice', $status);
        $this->db->where('id', $id);
        $this->db->update('record_pasien');
    }
}
?>