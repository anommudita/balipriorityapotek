<?php 

class Data_pasien_model extends CI_Model{
    // get all data data pasien
    public function get_all_data_pasien()
    {
        $this->db->order_by('no_rekam_medis', 'ASC');
        return $this->db->get('pasien');
    }


    // get data pasien by nik
    public function get_data_pasien_by_nik($nik)
    {
        $this->db->order_by('no_rekam_medis', 'ASC');
        return $this->db->get_where('pasien', ['nik' => $nik])->row_array();
    }



    // get all data data pasien by tanggal
    public function get_all_data_pasien_by_date($from_date, $to_date)
    {
        
        $this->db->select('*');
        $this->db->where('date_created >=', $from_date);
        $this->db->where('date_created <=', $to_date);
        $this->db->order_by('no_rekam_medis', 'ASC');
        $query = $this->db->get('pasien');
        return $query;
    }


    // get all data data pasien by nik
    public function get_all_data_pasien_by_nik($nik)
    {
        $this->db->select('*');
        $this->db->where('nik', $nik);
        $this->db->order_by('no_rekam_medis', 'ASC');
        $query = $this->db->get('pasien');
        return $query;
    }


    // tambah data pasien
    public function insert_data_pasien()
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'no_rekam_medis' => $this->input->post('no_rekam_medis', true),
            'nik' => $this->input->post('nik_pasien', true),
            'nama' => $this->input->post('nama_pasien', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir_pasien', true),
            'umur' => $this->input->post('umur_pasien', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin_pasien', true),
            'alamat' => $this->input->post('alamat_pasien', true),
            'no_telepon' => $this->input->post('no_tlp_pasien', true),
            'date_created' => date('Y/m/d H:i:s'),
        ];

        $this->db->insert('pasien', $data);
    }

    // edit data pasien
    public function edit_data_pasien($nik)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");

        $data = [
            'no_rekam_medis' => $this->input->post('no_rekam_medis', true),
            'nik' => $this->input->post('nik_pasien', true),
            'nama' => $this->input->post('nama_pasien', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir_pasien', true),
            'umur' => $this->input->post('umur_pasien', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin_pasien', true),
            'alamat' => $this->input->post('alamat_pasien', true),
            'no_telepon' => $this->input->post('no_tlp_pasien', true),
            'date_created' => date('Y/m/d H:i:s'),
        ];
        $this->db->where('nik', $nik);
        $this->db->update('pasien', $data);
    }

    // delete data pasien
    public function delete_pasien($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('pasien');
    }

    // gereate kode pasien secara otomatis
    public function get_nip_otomatis()
    {
        // Ambil data pasien dengan kode paling besar
        $query = $this->db->query("SELECT MAX(no_rekam_medis) AS max_kode FROM pasien");
        $result = $query->row_array();
        $max_kode = $result['max_kode'];


        // Jika data kosong, maka kode akan dimulai dari 000001
        if (!$max_kode) {
            $kode = '000001';
        } else {
            // Jika data tidak kosong, ambil angka terakhir dari kode sebelumnya
            // dan tambahkan 1 untuk kode selanjutnya
            $last_number = intval(substr($max_kode, -6));
            $kode = str_pad($last_number + 1, 6, '0', STR_PAD_LEFT);
        }

        return $kode;
    }
}
?>