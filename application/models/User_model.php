<?php 

class User_model extends CI_Model{

    // get data query by username
    public function get_data_by_username($username){
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    // get data query by id
    public function get_data_by_id($id){
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    // get data dokter kecuali id 
    public function get_data_kecuali_id($id){
        return $this->db->where('id !=', $id)
            ->where('username !=', 'admin')
            ->get('user')
            ->result_array();
    }

    // update password 
    public function updatepassword($password, $username){
        $this->db->set('password', $password);
        $this->db->where('username', $username);
        $this->db->update('user');
    }

    // update profile  admin
    public function editprofile($new_image, $username){

        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'foto' => $new_image,
            'date_created' => date('Y/m/d H:i:s')
        ];

        $this->db->where('username', $username);
        $this->db->update('user', $data);

    }


    // get data dokter by role (dokter)
    public function get_all_data_dokter(){
        return $this->db->get_where('user', ['role_id'=> 2])->result_array();
    }

    public function count_akun_dokter()
    {
        return $this->db->get_where('user', ['role_id' => 2])->num_rows();
    }

    // insert akun_dokter
    public function insert_dokter($new_image){

        // default waktu
        date_default_timezone_set("Asia/Singapore");
        $data = [
            'role_id' => 2,
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT),
            'foto' => $new_image,
            'status' => 0,
            'date_created' => date('Y/m/d H:i:s')
        ];

        $this->db->insert('user', $data);

    }

    // delete akun dokter 
    public function delete_dokter($id){
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    // edit akun dokter
    public function edit_dokter($id, $new_image, $password){

        // default waktu
        date_default_timezone_set("Asia/Singapore");
        $data = [
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'password' => $password,
            'foto' => $new_image,
            'date_created' => date('Y/m/d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}


?>