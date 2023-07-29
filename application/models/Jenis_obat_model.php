<?php 

class Jenis_obat_model extends CI_Model{

    // get all data jenis obat kecuali id 0 
    public function get_all_data_obat(){
        
        return $this->db->where('id !=', 0)
        ->get('jenis_obat')
        ->result_array();
    }

    // get data jenis obat by id
    public function get_data_obat_by_id($id){
        return $this->db->get_where('jenis_obat', ['id' => $id])->row_array();
    }

    // tambah jenis obat
    public function insert_obat(){
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'nama_obat' => $this->input->post('nama_obat', true),
            'harga' => $this->input->post('harga_obat', true),
            'date_created' => date('Y/m/d H:i:s')
        ];
        
        $this->db->insert('jenis_obat', $data);
    }

    // edit jenis obat
    public function edit_obat($id){
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'nama_obat' => $this->input->post('nama_obat', true),
            'harga' => $this->input->post('harga_obat', true),
            'date_created' => date('Y/m/d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('jenis_obat', $data);
    }

    // delete jenis obat
    public function delete_obat($id){
        $this->db->where('id', $id);
        $this->db->delete('jenis_obat');
    }

    // menghitung jumlah data obat
    public function count_data_obat(){
        return $this->db->get('jenis_obat')->num_rows();
    }
}
?>