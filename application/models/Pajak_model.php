<?php 

class Pajak_model extends CI_Model{

    // get all data pajak
    public function get_all_data_pajak(){

        return $this->db->where('id !=', 0)
            ->get('pajak')
            ->result_array();
        
    }

    // get data jenis pajak by id
    public function get_data_pajak_by_id($id){
        return $this->db->get_where('pajak', ['id' => $id])->row_array();
    }

    // tambah pajak
    public function insert_pajak(){
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'pajak' => $this->input->post('pajak', true),
            'keterangan' => $this->input->post('keterangan', true),
            'date_created' => date('Y/m/d H:i:s')
        ];
        
        $this->db->insert('pajak', $data);
    }

    // edit pajak
    public function edit_pajak($id){
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'pajak' => $this->input->post('pajak', true),
            'keterangan' => $this->input->post('keterangan', true),
            'date_created' => date('Y/m/d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('pajak', $data);
    }

    // delete pajak
    public function delete_pajak($id){
        $this->db->where('id', $id);
        $this->db->delete('pajak');
    }

    // menghitung jumlah data obat
    public function count_data_pajak(){
        return $this->db->get('pajak')->num_rows();
    }
}
