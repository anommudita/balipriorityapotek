<?php

class Tindakan_model extends CI_Model
{
    // get all data tindakan
    public function get_all_data_tindakan()
    {
        // get all data tindakan kecuali id 0 
        return $this->db->where('id !=', 0)
        ->get('tindakan')
        ->result_array();
    }

    // get data tindakan by id
    public function get_data_tindakan_by_id($id)
    {
        return $this->db->get_where('tindakan', ['id' => $id])->row_array();
    }

    // get tindakan melalui ajax
    public function getTindakan($id){
        return $this->db->get_where('tindakan', ['id' => $id]);
    }
    
    // tambah tindakan
    public function insert_tindakan()
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'nama_tindakan' => $this->input->post('tindakan', true),
            'biaya' => $this->input->post('biaya', true),
            'date_created' => date('Y/m/d H:i:s')
        ];

        $this->db->insert('tindakan', $data);
    }

    // edit tindakan
    public function edit_tindakan($id)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'nama_tindakan' => $this->input->post('tindakan', true),
            'biaya' => $this->input->post('biaya', true),
            'date_created' => date('Y/m/d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->update('tindakan', $data);
    }

    // delete tindakan
    public function delete_tindakan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tindakan');
    }

    // menghitung jumlah data tindakan
    public function count_data_tindakan(){
        return $this->db->get('tindakan')->num_rows();
    }

}
