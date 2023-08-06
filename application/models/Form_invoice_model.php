<?php 

class Form_invoice_model extends CI_Model{

    // get invoice by id pasien
    public function get_form_invoice_by_id_pasien($id_pasien){

        $this->db->select('form_invoice.id, form_invoice.nomor_invoice, form_invoice.dokter, form_invoice.nama_pasien, form_invoice.tindakan1, form_invoice.diskon1, form_invoice.harga1, form_invoice.tindakan2, form_invoice.diskon2, form_invoice.harga2, form_invoice.tindakan3, form_invoice.diskon3, form_invoice.harga3, form_invoice.tindakan4, form_invoice.diskon4, form_invoice.harga4, form_invoice.tindakan5, form_invoice.diskon5, form_invoice.harga5, form_invoice.jenis_obat, form_invoice.pajak as id_pajak, pajak.pajak as pajak, pajak.keterangan as keterangan, form_invoice.date_created, form_invoice.total, record_pasien.nama as nama_pasien, record_pasien.id as id_pasien, t1.nama_tindakan as nama_tindakan1, t2.nama_tindakan as nama_tindakan2, t3.nama_tindakan as nama_tindakan3, t4.nama_tindakan as nama_tindakan4, t5.nama_tindakan as nama_tindakan5, user.nama as nama_dokter, jenis_obat.nama_obat as nama_obat, jenis_obat.harga as harga_obat, jo2.harga as harga_obat2, jo3.harga as harga_obat3, jo4.harga as harga_obat4, jo5.harga as harga_obat5,form_invoice.jumlah_obat as jumlah_obat, form_invoice.jenis_obat2 as jenis_obat2, form_invoice.jumlah_obat2 as jumlah_obat2, form_invoice.jenis_obat3 as jenis_obat3, form_invoice.jumlah_obat3 as jumlah_obat3, form_invoice.jenis_obat4 as jenis_obat4, form_invoice.jumlah_obat4 as jumlah_obat4,form_invoice.jenis_obat5 as jenis_obat5, form_invoice.jumlah_obat5 as jumlah_obat5, jo2.nama_obat as nama_obat2, jo3.nama_obat as nama_obat3, jo3.nama_obat as nama_obat3, jo4.nama_obat as nama_obat4, jo5.nama_obat as nama_obat5, form_invoice.no_rekam_medis');
        $this->db->from('form_invoice');
        $this->db->join('record_pasien', 'form_invoice.nama_pasien = record_pasien.id');
        $this->db->join('user', 'form_invoice.dokter = user.id');
        $this->db->join('pajak', 'form_invoice.pajak = pajak.id');
        $this->db->join('jenis_obat', 'form_invoice.jenis_obat = jenis_obat.id');
        $this->db->join('jenis_obat jo2', 'form_invoice.jenis_obat2 = jo2.id');
        $this->db->join('jenis_obat jo3', 'form_invoice.jenis_obat3 = jo3.id');
        $this->db->join('jenis_obat jo4', 'form_invoice.jenis_obat4 = jo4.id');
        $this->db->join('jenis_obat jo5', 'form_invoice.jenis_obat5 = jo5.id');
        $this->db->join('tindakan t1', 'form_invoice.tindakan1 = t1.id');
        $this->db->join('tindakan t2', 'form_invoice.tindakan2 = t2.id');
        $this->db->join('tindakan t3', 'form_invoice.tindakan3 = t3.id');
        $this->db->join('tindakan t4', 'form_invoice.tindakan4 = t4.id');
        $this->db->join('tindakan t5', 'form_invoice.tindakan5 = t5.id'); 
        $this->db->where('record_pasien.id', $id_pasien);
        return $query = $this->db->get()->row_array();

    }


    // get invoice by id invoice
    public function get_form_invoice_by_id($id_invoice)
    {

        $this->db->select('form_invoice.id, form_invoice.nomor_invoice, form_invoice.dokter, form_invoice.nama_pasien, form_invoice.tindakan1, form_invoice.diskon1, form_invoice.harga1, form_invoice.tindakan2, form_invoice.diskon2, form_invoice.harga2, form_invoice.tindakan3, form_invoice.diskon3, form_invoice.harga3, form_invoice.tindakan4, form_invoice.diskon4, form_invoice.harga4, form_invoice.tindakan5, form_invoice.diskon5, form_invoice.harga5, form_invoice.jenis_obat, form_invoice.pajak as id_pajak, pajak.pajak as pajak, pajak.keterangan as keterangan, form_invoice.date_created, form_invoice.total, record_pasien.nama as nama_pasien, record_pasien.id as id_pasien, t1.nama_tindakan as nama_tindakan1, t2.nama_tindakan as nama_tindakan2, t3.nama_tindakan as nama_tindakan3, t4.nama_tindakan as nama_tindakan4, t5.nama_tindakan as nama_tindakan5, user.nama as nama_dokter, jenis_obat.nama_obat as nama_obat, jenis_obat.harga as harga_obat, jo2.harga as harga_obat2, jo3.harga as harga_obat3, jo4.harga as harga_obat4, jo5.harga as harga_obat5,form_invoice.jumlah_obat as jumlah_obat, form_invoice.jenis_obat2 as jenis_obat2, form_invoice.jumlah_obat2 as jumlah_obat2, form_invoice.jenis_obat3 as jenis_obat3, form_invoice.jumlah_obat3 as jumlah_obat3, form_invoice.jenis_obat4 as jenis_obat4, form_invoice.jumlah_obat4 as jumlah_obat4,form_invoice.jenis_obat5 as jenis_obat5, form_invoice.jumlah_obat5 as jumlah_obat5, jo2.nama_obat as nama_obat2, jo3.nama_obat as nama_obat3, jo3.nama_obat as nama_obat3, jo4.nama_obat as nama_obat4, jo5.nama_obat as nama_obat5, form_invoice.no_rekam_medis');
        $this->db->from('form_invoice');
        $this->db->join('record_pasien',
            'form_invoice.nama_pasien = record_pasien.id'
        );
        $this->db->join('user', 'form_invoice.dokter = user.id');
        $this->db->join('pajak', 'form_invoice.pajak = pajak.id');
        $this->db->join('jenis_obat', 'form_invoice.jenis_obat = jenis_obat.id');
        $this->db->join('jenis_obat jo2', 'form_invoice.jenis_obat2 = jo2.id');
        $this->db->join('jenis_obat jo3', 'form_invoice.jenis_obat3 = jo3.id');
        $this->db->join('jenis_obat jo4', 'form_invoice.jenis_obat4 = jo4.id');
        $this->db->join('jenis_obat jo5', 'form_invoice.jenis_obat5 = jo5.id');
        $this->db->join('tindakan t1', 'form_invoice.tindakan1 = t1.id');
        $this->db->join('tindakan t2', 'form_invoice.tindakan2 = t2.id');
        $this->db->join('tindakan t3', 'form_invoice.tindakan3 = t3.id');
        $this->db->join('tindakan t4', 'form_invoice.tindakan4 = t4.id');
        $this->db->join('tindakan t5', 'form_invoice.tindakan5 = t5.id');
        $this->db->where('form_invoice.id', $id_invoice);
        return $query = $this->db->get()->row_array();
    }


    // get all data form invoice join table pasien dan dokter by admin
    public function get_all_form_invoice_by_admin()
    {
        $this->db->select('form_invoice.id, form_invoice.nomor_invoice, form_invoice.dokter, form_invoice.nama_pasien, form_invoice.tindakan1, form_invoice.diskon1, form_invoice.harga1, form_invoice.tindakan2, form_invoice.diskon2, form_invoice.harga2, form_invoice.tindakan3, form_invoice.diskon3, form_invoice.harga3, form_invoice.tindakan4, form_invoice.diskon4, form_invoice.harga4, form_invoice.tindakan5, form_invoice.diskon5, form_invoice.harga5, form_invoice.jenis_obat, form_invoice.pajak as id_pajak, pajak.pajak as pajak, pajak.keterangan as keterangan, form_invoice.date_created, form_invoice.total, record_pasien.nama as nama_pasien, record_pasien.id as id_pasien, t1.nama_tindakan as nama_tindakan1, t2.nama_tindakan as nama_tindakan2, t3.nama_tindakan as nama_tindakan3, t4.nama_tindakan as nama_tindakan4, t5.nama_tindakan as nama_tindakan5, user.nama as nama_dokter, jenis_obat.nama_obat as nama_obat, jenis_obat.harga as harga_obat, jo2.harga as harga_obat2, jo3.harga as harga_obat3, jo4.harga as harga_obat4, jo5.harga as harga_obat5,form_invoice.jumlah_obat as jumlah_obat, form_invoice.jenis_obat2 as jenis_obat2, form_invoice.jumlah_obat2 as jumlah_obat2, form_invoice.jenis_obat3 as jenis_obat3, form_invoice.jumlah_obat3 as jumlah_obat3, form_invoice.jenis_obat4 as jenis_obat4, form_invoice.jumlah_obat4 as jumlah_obat4,form_invoice.jenis_obat5 as jenis_obat5, form_invoice.jumlah_obat5 as jumlah_obat5, jo2.nama_obat as nama_obat2, jo3.nama_obat as nama_obat3, jo3.nama_obat as nama_obat3, jo4.nama_obat as nama_obat4, jo5.nama_obat as nama_obat5, record_pasien.nik as nik, record_pasien.tanggal_lahir as tanggal_lahir, record_pasien.umur as umur, record_pasien.jenis_kelamin as jenis_kelamin, record_pasien.alamat as alamat, record_pasien.no_tlp as no_tlp, record_pasien.status as status, form_invoice.no_rekam_medis');
        $this->db->from('form_invoice');
        $this->db->join(
            'record_pasien',
            'form_invoice.nama_pasien = record_pasien.id'
        );
        $this->db->join('user', 'form_invoice.dokter = user.id');
        $this->db->join('pajak', 'form_invoice.pajak = pajak.id');
        $this->db->join('jenis_obat', 'form_invoice.jenis_obat = jenis_obat.id');
        $this->db->join('jenis_obat jo2', 'form_invoice.jenis_obat2 = jo2.id');
        $this->db->join('jenis_obat jo3', 'form_invoice.jenis_obat3 = jo3.id');
        $this->db->join('jenis_obat jo4', 'form_invoice.jenis_obat4 = jo4.id');
        $this->db->join('jenis_obat jo5', 'form_invoice.jenis_obat5 = jo5.id');
        $this->db->join('tindakan t1', 'form_invoice.tindakan1 = t1.id');
        $this->db->join('tindakan t2', 'form_invoice.tindakan2 = t2.id');
        $this->db->join('tindakan t3', 'form_invoice.tindakan3 = t3.id');
        $this->db->join('tindakan t4', 'form_invoice.tindakan4 = t4.id');
        $this->db->join('tindakan t5', 'form_invoice.tindakan5 = t5.id');
        $this->db->order_by('no_rekam_medis', 'ASC');
        $query = $this->db->get();
        return $query;
    }


    // print invoice by dokter
    public function get_all_form_invoice_by_dokter($id_dokter)
    {
        $this->db->select('form_invoice.id, form_invoice.nomor_invoice, form_invoice.dokter, form_invoice.nama_pasien, form_invoice.tindakan1, form_invoice.diskon1, form_invoice.harga1, form_invoice.tindakan2, form_invoice.diskon2, form_invoice.harga2, form_invoice.tindakan3, form_invoice.diskon3, form_invoice.harga3, form_invoice.tindakan4, form_invoice.diskon4, form_invoice.harga4, form_invoice.tindakan5, form_invoice.diskon5, form_invoice.harga5, form_invoice.jenis_obat, form_invoice.pajak as id_pajak, pajak.pajak as pajak, pajak.keterangan as keterangan, form_invoice.date_created, form_invoice.total, record_pasien.nama as nama_pasien, record_pasien.id as id_pasien, t1.nama_tindakan as nama_tindakan1, t2.nama_tindakan as nama_tindakan2, t3.nama_tindakan as nama_tindakan3, t4.nama_tindakan as nama_tindakan4, t5.nama_tindakan as nama_tindakan5, user.nama as nama_dokter, jenis_obat.nama_obat as nama_obat, jenis_obat.harga as harga_obat, jo2.harga as harga_obat2, jo3.harga as harga_obat3, jo4.harga as harga_obat4, jo5.harga as harga_obat5,form_invoice.jumlah_obat as jumlah_obat, form_invoice.jenis_obat2 as jenis_obat2, form_invoice.jumlah_obat2 as jumlah_obat2, form_invoice.jenis_obat3 as jenis_obat3, form_invoice.jumlah_obat3 as jumlah_obat3, form_invoice.jenis_obat4 as jenis_obat4, form_invoice.jumlah_obat4 as jumlah_obat4,form_invoice.jenis_obat5 as jenis_obat5, form_invoice.jumlah_obat5 as jumlah_obat5, jo2.nama_obat as nama_obat2, jo3.nama_obat as nama_obat3, jo3.nama_obat as nama_obat3, jo4.nama_obat as nama_obat4, jo5.nama_obat as nama_obat5, form_invoice.no_rekam_medis');
        $this->db->from('form_invoice');
        $this->db->join(
            'record_pasien',
            'form_invoice.nama_pasien = record_pasien.id'
        );
        $this->db->join('user', 'form_invoice.dokter = user.id');
        $this->db->join('pajak', 'form_invoice.pajak = pajak.id');
        $this->db->join('jenis_obat', 'form_invoice.jenis_obat = jenis_obat.id');
        $this->db->join('jenis_obat jo2', 'form_invoice.jenis_obat2 = jo2.id');
        $this->db->join('jenis_obat jo3', 'form_invoice.jenis_obat3 = jo3.id');
        $this->db->join('jenis_obat jo4', 'form_invoice.jenis_obat4 = jo4.id');
        $this->db->join('jenis_obat jo5', 'form_invoice.jenis_obat5 = jo5.id');
        $this->db->join('tindakan t1', 'form_invoice.tindakan1 = t1.id');
        $this->db->join('tindakan t2', 'form_invoice.tindakan2 = t2.id');
        $this->db->join('tindakan t3', 'form_invoice.tindakan3 = t3.id');
        $this->db->join('tindakan t4', 'form_invoice.tindakan4 = t4.id');
        $this->db->join('tindakan t5', 'form_invoice.tindakan5 = t5.id');
        $this->db->where('form_invoice.dokter', $id_dokter);
        $query = $this->db->get();
        return $query;
    }


    // print invoice by date
    public function get_all_form_invoice_by_date($from_date, $to_date)
    {
        $this->db->select('form_invoice.id, form_invoice.nomor_invoice, form_invoice.dokter, form_invoice.nama_pasien, form_invoice.tindakan1, form_invoice.diskon1, form_invoice.harga1, form_invoice.tindakan2, form_invoice.diskon2, form_invoice.harga2, form_invoice.tindakan3, form_invoice.diskon3, form_invoice.harga3, form_invoice.tindakan4, form_invoice.diskon4, form_invoice.harga4, form_invoice.tindakan5, form_invoice.diskon5, form_invoice.harga5, form_invoice.jenis_obat, form_invoice.pajak as id_pajak, pajak.pajak as pajak, pajak.keterangan as keterangan, form_invoice.date_created, form_invoice.total, record_pasien.nama as nama_pasien, record_pasien.id as id_pasien, t1.nama_tindakan as nama_tindakan1, t2.nama_tindakan as nama_tindakan2, t3.nama_tindakan as nama_tindakan3, t4.nama_tindakan as nama_tindakan4, t5.nama_tindakan as nama_tindakan5, user.nama as nama_dokter, jenis_obat.nama_obat as nama_obat, jenis_obat.harga as harga_obat, jo2.harga as harga_obat2, jo3.harga as harga_obat3, jo4.harga as harga_obat4, jo5.harga as harga_obat5,form_invoice.jumlah_obat as jumlah_obat, form_invoice.jenis_obat2 as jenis_obat2, form_invoice.jumlah_obat2 as jumlah_obat2, form_invoice.jenis_obat3 as jenis_obat3, form_invoice.jumlah_obat3 as jumlah_obat3, form_invoice.jenis_obat4 as jenis_obat4, form_invoice.jumlah_obat4 as jumlah_obat4,form_invoice.jenis_obat5 as jenis_obat5, form_invoice.jumlah_obat5 as jumlah_obat5, jo2.nama_obat as nama_obat2, jo3.nama_obat as nama_obat3, jo3.nama_obat as nama_obat3, jo4.nama_obat as nama_obat4, jo5.nama_obat as nama_obat5, form_invoice.no_rekam_medis');
        $this->db->from('form_invoice');
        $this->db->join(
            'record_pasien',
            'form_invoice.nama_pasien = record_pasien.id'
        );
        $this->db->join('user', 'form_invoice.dokter = user.id');
        $this->db->join('pajak', 'form_invoice.pajak = pajak.id');
        $this->db->join('jenis_obat', 'form_invoice.jenis_obat = jenis_obat.id');
        $this->db->join('jenis_obat jo2', 'form_invoice.jenis_obat2 = jo2.id');
        $this->db->join('jenis_obat jo3', 'form_invoice.jenis_obat3 = jo3.id');
        $this->db->join('jenis_obat jo4', 'form_invoice.jenis_obat4 = jo4.id');
        $this->db->join('jenis_obat jo5', 'form_invoice.jenis_obat5 = jo5.id');
        $this->db->join('tindakan t1', 'form_invoice.tindakan1 = t1.id');
        $this->db->join('tindakan t2', 'form_invoice.tindakan2 = t2.id');
        $this->db->join('tindakan t3', 'form_invoice.tindakan3 = t3.id');
        $this->db->join('tindakan t4', 'form_invoice.tindakan4 = t4.id');
        $this->db->join('tindakan t5', 'form_invoice.tindakan5 = t5.id');
        $this->db->where('form_invoice.date_created >=', $from_date);
        $this->db->where('form_invoice.date_created <=', $to_date);
        $query = $this->db->get();
        return $query;
    }


    // print invoice by nik
    public function get_all_data_invoice_by_nik($nik)
    {
        $this->db->select('form_invoice.id, form_invoice.nomor_invoice, form_invoice.dokter, form_invoice.nama_pasien, form_invoice.tindakan1, form_invoice.diskon1, form_invoice.harga1, form_invoice.tindakan2, form_invoice.diskon2, form_invoice.harga2, form_invoice.tindakan3, form_invoice.diskon3, form_invoice.harga3, form_invoice.tindakan4, form_invoice.diskon4, form_invoice.harga4, form_invoice.tindakan5, form_invoice.diskon5, form_invoice.harga5, form_invoice.jenis_obat, form_invoice.pajak as id_pajak, pajak.pajak as pajak, pajak.keterangan as keterangan, form_invoice.date_created, form_invoice.total, record_pasien.nama as nama_pasien, record_pasien.id as id_pasien, t1.nama_tindakan as nama_tindakan1, t2.nama_tindakan as nama_tindakan2, t3.nama_tindakan as nama_tindakan3, t4.nama_tindakan as nama_tindakan4, t5.nama_tindakan as nama_tindakan5, user.nama as nama_dokter, jenis_obat.nama_obat as nama_obat, jenis_obat.harga as harga_obat, jo2.harga as harga_obat2, jo3.harga as harga_obat3, jo4.harga as harga_obat4, jo5.harga as harga_obat5,form_invoice.jumlah_obat as jumlah_obat, form_invoice.jenis_obat2 as jenis_obat2, form_invoice.jumlah_obat2 as jumlah_obat2, form_invoice.jenis_obat3 as jenis_obat3, form_invoice.jumlah_obat3 as jumlah_obat3, form_invoice.jenis_obat4 as jenis_obat4, form_invoice.jumlah_obat4 as jumlah_obat4,form_invoice.jenis_obat5 as jenis_obat5, form_invoice.jumlah_obat5 as jumlah_obat5, jo2.nama_obat as nama_obat2, jo3.nama_obat as nama_obat3, jo3.nama_obat as nama_obat3, jo4.nama_obat as nama_obat4, jo5.nama_obat as nama_obat5,record_pasien.nik as nik, form_invoice.no_rekam_medis');
        $this->db->from('form_invoice');
        $this->db->join(
            'record_pasien',
            'form_invoice.nama_pasien = record_pasien.id'
        );
        $this->db->join('user', 'form_invoice.dokter = user.id');
        $this->db->join('pajak', 'form_invoice.pajak = pajak.id');
        $this->db->join('jenis_obat', 'form_invoice.jenis_obat = jenis_obat.id');
        $this->db->join('jenis_obat jo2', 'form_invoice.jenis_obat2 = jo2.id');
        $this->db->join('jenis_obat jo3', 'form_invoice.jenis_obat3 = jo3.id');
        $this->db->join('jenis_obat jo4', 'form_invoice.jenis_obat4 = jo4.id');
        $this->db->join('jenis_obat jo5', 'form_invoice.jenis_obat5 = jo5.id');
        $this->db->join('tindakan t1', 'form_invoice.tindakan1 = t1.id');
        $this->db->join('tindakan t2', 'form_invoice.tindakan2 = t2.id');
        $this->db->join('tindakan t3', 'form_invoice.tindakan3 = t3.id');
        $this->db->join('tindakan t4', 'form_invoice.tindakan4 = t4.id');
        $this->db->join('tindakan t5', 'form_invoice.tindakan5 = t5.id');
        $this->db->where('record_pasien.nik', $nik);
        $query = $this->db->get();
        return $query;
    }



    // get all data form invoice join table pasien dan dokter berdasarkan id dokter
    public function get_all_form_invoice($id_dokter)
    {
        $this->db->select('form_invoice.id, form_invoice.nomor_invoice, form_invoice.nama_pasien, form_invoice.date_created, form_invoice.total, record_pasien.nama, record_pasien.id as id_pasien, record_pasien.nik as nik');
        $this->db->from('form_invoice');
        $this->db->join('record_pasien', 'form_invoice.nama_pasien = record_pasien.id');
        $this->db->join('user', 'form_invoice.dokter = user.id');
        $this->db->where('form_invoice.dokter', $id_dokter);
        $query = $this->db->get();
        return $query;
    }

    // get all data form invoice join table pasien dan dokter berdasarkan id dokter
    public function get_all_form_invoice_by_id($id_dokter,
        $id_invoice
    ) {
        $this->db->select('form_invoice.id, form_invoice.nomor_invoice, form_invoice.dokter, form_invoice.nama_pasien, form_invoice.tindakan1, form_invoice.diskon1, form_invoice.harga1, form_invoice.tindakan2, form_invoice.diskon2, form_invoice.harga2, form_invoice.tindakan3, form_invoice.diskon3, form_invoice.harga3, form_invoice.jenis_obat, form_invoice.pajak, form_invoice.date_created, form_invoice.total, record_pasien.nama as nama_pasien, record_pasien.id as id_pasien, t1.nama_tindakan as nama_tindakan1, t2.nama_tindakan as nama_tindakan2, t3.nama_tindakan as nama_tindakan3, user.nama as nama_dokter, jenis_obat.nama_obat as nama_obat, jenis_obat.harga as harga_obat, form_invoice.jumlah_obat as jumlah_obat');
        $this->db->from('form_invoice');
        $this->db->join('record_pasien', 'form_invoice.nama_pasien = record_pasien.id');
        $this->db->join('user', 'form_invoice.dokter = user.id');
        $this->db->join('jenis_obat', 'form_invoice.jenis_obat = jenis_obat.id');
        $this->db->join('tindakan t1', 'form_invoice.tindakan1 = t1.id');
        $this->db->join('tindakan t2', 'form_invoice.tindakan2 = t2.id');
        $this->db->join('tindakan t3', 'form_invoice.tindakan3 = t3.id');
        $this->db->where('form_invoice.dokter', $id_dokter);
        $this->db->where('form_invoice.id', $id_invoice);
        $query = $this->db->get();
        return $query;
    }

    // tambah form invoice
    public function insert_form_invoice($id_dokter, $id_pasien)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");


        // tindakan
        $tindakan1 = $this->input->post('tindakan1', true);
        $tindakan2 = $this->input->post('tindakan2', true);
        $tindakan3 = $this->input->post('tindakan3', true);
        $tindakan4 = $this->input->post('tindakan4', true);
        $tindakan5 = $this->input->post('tindakan5', true);

        if ($tindakan1 == null) {
            $tindakan1 = 0;
        }
        if ($tindakan2 == null) {
            $tindakan2 = 0;
        }
        if ($tindakan3 == null) {
            $tindakan3 = 0;
        }
        if ($tindakan4 == null) {
            $tindakan4 = 0;
        }
        if ($tindakan5 == null) {
            $tindakan5 = 0;
        }
        
        // diskon
        $diskon1 = $this->input->post('diskon_tindakan1', true);
        $diskon2 = $this->input->post('diskon_tindakan2', true);
        $diskon3 = $this->input->post('diskon_tindakan3', true);
        $diskon4 = $this->input->post('diskon_tindakan4', true);
        $diskon5 = $this->input->post('diskon_tindakan5', true);

        if ($diskon1 == null) {
            $diskon1 = 0;
        }
        if ($diskon2 == null) {
            $diskon2 = 0;
        }
        if ($diskon3 == null) {
            $diskon3 = 0;
        }
        if ($diskon4 == null) {
            $diskon4 = 0;
        }
        if ($diskon5 == null) {
            $diskon5 = 0;
        }


        // harga diskon
        $harga_diskon1= $this->input->post('harga_diskon', true);
        $harga_diskon2 = $this->input->post('harga_diskon2', true);
        $harga_diskon3 = $this->input->post('harga_diskon3', true);
        $harga_diskon4 = $this->input->post('harga_diskon4', true);
        $harga_diskon5 = $this->input->post('harga_diskon5', true);

        if ($harga_diskon1 == null) {
            $harga_diskon1 = 0;
        }
        if ($harga_diskon2 == null) {
            $harga_diskon2 = 0;
        }
        if ($harga_diskon3 == null) {
            $harga_diskon3 = 0;
        }
        if ($harga_diskon4 == null) {
            $harga_diskon4 = 0;
        }
        if ($harga_diskon5 == null) {
            $harga_diskon5 = 0;
        }

        // obat
        $jenis_obat = $this->input->post('obat', true);
        $jenis_obat2 = $this->input->post('obat1', true);
        $jenis_obat3 = $this->input->post('obat2', true);
        $jenis_obat4 = $this->input->post('obat3', true);
        $jenis_obat5 = $this->input->post('obat4', true);

        if ($jenis_obat == null) {
            $jenis_obat = 0;
        }

        if ($jenis_obat2 == null) {
            $jenis_obat2 = 0;
        }

        if ($jenis_obat3 == null) {
            $jenis_obat3 = 0;
        }

        if ($jenis_obat4 == null) {
            $jenis_obat4 = 0;
        }

        if ($jenis_obat5 == null) {
            $jenis_obat5 = 0;
        }


        // jumlah obat
        $jumlah_obat = $this->input->post('jumlah', true);
        $jumlah_obat2 = $this->input->post('jumlah1', true);
        $jumlah_obat3 = $this->input->post('jumlah2', true);
        $jumlah_obat4 = $this->input->post('jumlah3', true);
        $jumlah_obat5 = $this->input->post('jumlah4', true);

        if ($jumlah_obat == null) {
            $jumlah_obat = 0;
        }

        if ($jumlah_obat2 == null) {
            $jumlah_obat2 = 0;
        }

        if ($jumlah_obat3 == null) {
            $jumlah_obat3 = 0;
        }


        if ($jumlah_obat4 == null) {
            $jumlah_obat4 = 0;
        }

        if ($jumlah_obat5 == null) {
            $jumlah_obat5 = 0;
        }



        $data = [
            'nomor_invoice' =>$this->input->post('no_invoice', true),
            'dokter' => $id_dokter,
            'no_rekam_medis' => $this->input->post('no_rekam_medis', true),
            'nama_pasien' => $id_pasien,
            'tindakan1' => $tindakan1,
            'diskon1' => $diskon1,
            'harga1' => $harga_diskon1,
            'tindakan2' => $tindakan2,
            'diskon2' => $diskon2,
            'harga2' => $harga_diskon2,
            'tindakan3' => $tindakan3,
            'diskon3' => $diskon3,
            'harga3' => $harga_diskon3,
            'tindakan4' => $tindakan4,
            'diskon4' => $diskon4,
            'harga4' => $harga_diskon4,
            'tindakan5' => $tindakan5,
            'diskon5' => $diskon5,
            'harga5' => $harga_diskon5,
            'jenis_obat' => $jenis_obat,
            'jumlah_obat' => $jumlah_obat,
            'jenis_obat2' => $jenis_obat2,
            'jumlah_obat2' => $jumlah_obat2,
            'jenis_obat3' => $jenis_obat3,
            'jumlah_obat3' => $jumlah_obat3,
            'jenis_obat4' => $jenis_obat4,
            'jumlah_obat4' => $jumlah_obat4,
            'jenis_obat5' => $jenis_obat5,
            'jumlah_obat5' => $jumlah_obat5,
            'pajak' => $this->input->post('tax', true),
            'total' => $this->input->post('total', true),
            'date_created' => date('Y/m/d H:i:s')
        ];

        $this->db->insert('form_invoice', $data);
    }

    // edit form invoice
    public function edit_form_invoice($id_dokter, $id_pasien)
    {
        // default waktu
        date_default_timezone_set("Asia/Singapore");


        // tindakan
        $tindakan1 = $this->input->post('tindakan1', true);
        $tindakan2 = $this->input->post('tindakan2', true);
        $tindakan3 = $this->input->post('tindakan3', true);
        $tindakan4 = $this->input->post('tindakan4', true);
        $tindakan5 = $this->input->post('tindakan5', true);

        if ($tindakan1 == null) {
            $tindakan1 = 0;
        }
        if ($tindakan2 == null) {
            $tindakan2 = 0;
        }
        if ($tindakan3 == null) {
            $tindakan3 = 0;
        }
        if ($tindakan4 == null) {
            $tindakan4 = 0;
        }
        if ($tindakan5 == null) {
            $tindakan5 = 0;
        }

        // diskon
        $diskon1 = $this->input->post('diskon_tindakan1', true);
        $diskon2 = $this->input->post('diskon_tindakan2', true);
        $diskon3 = $this->input->post('diskon_tindakan3', true);
        $diskon4 = $this->input->post('diskon_tindakan4', true);
        $diskon5 = $this->input->post('diskon_tindakan5', true);

        if ($diskon1 == null) {
            $diskon1 = 0;
        }
        if ($diskon2 == null) {
            $diskon2 = 0;
        }
        if ($diskon3 == null) {
            $diskon3 = 0;
        }
        if ($diskon4 == null) {
            $diskon4 = 0;
        }
        if ($diskon5 == null) {
            $diskon5 = 0;
        }


        // harga diskon
        $harga_diskon1 = $this->input->post('harga_diskon', true);
        $harga_diskon2 = $this->input->post('harga_diskon2', true);
        $harga_diskon3 = $this->input->post('harga_diskon3', true);
        $harga_diskon4 = $this->input->post('harga_diskon4', true);
        $harga_diskon5 = $this->input->post('harga_diskon5', true);

        if ($harga_diskon1 == null) {
            $harga_diskon1 = 0;
        }
        if ($harga_diskon2 == null) {
            $harga_diskon2 = 0;
        }
        if ($harga_diskon3 == null) {
            $harga_diskon3 = 0;
        }
        if ($harga_diskon4 == null) {
            $harga_diskon4 = 0;
        }
        if ($harga_diskon5 == null) {
            $harga_diskon5 = 0;
        }

        // obat
        $jenis_obat = $this->input->post('obat', true);
        $jenis_obat2 = $this->input->post('obat1', true);
        $jenis_obat3 = $this->input->post('obat2', true);
        $jenis_obat4 = $this->input->post('obat3', true);
        $jenis_obat5 = $this->input->post('obat4', true);

        if ($jenis_obat == null) {
            $jenis_obat = 0;
        }

        if ($jenis_obat2 == null) {
            $jenis_obat2 = 0;
        }

        if ($jenis_obat3 == null) {
            $jenis_obat3 = 0;
        }

        if ($jenis_obat4 == null) {
            $jenis_obat4 = 0;
        }

        if ($jenis_obat5 == null) {
            $jenis_obat5 = 0;
        }


        // jumlah obat
        $jumlah_obat = $this->input->post('jumlah', true);
        $jumlah_obat2 = $this->input->post('jumlah1', true);
        $jumlah_obat3 = $this->input->post('jumlah2', true);
        $jumlah_obat4 = $this->input->post('jumlah3', true);
        $jumlah_obat5 = $this->input->post('jumlah4', true);

        if ($jumlah_obat == null) {
            $jumlah_obat = 0;
        }

        if ($jumlah_obat2 == null) {
            $jumlah_obat2 = 0;
        }

        if ($jumlah_obat3 == null) {
            $jumlah_obat3 = 0;
        }


        if ($jumlah_obat4 == null) {
            $jumlah_obat4 = 0;
        }

        if ($jumlah_obat5 == null) {
            $jumlah_obat5 = 0;
        }



        $data = [
            'nomor_invoice' => $this->input->post('no_invoice', true),
            'dokter' => $id_dokter,
            'no_rekam_medis' => $this->input->post('no_rekam_medis', true),
            'nama_pasien' => $id_pasien,
            'tindakan1' => $tindakan1,
            'diskon1' => $diskon1,
            'harga1' => $harga_diskon1,
            'tindakan2' => $tindakan2,
            'diskon2' => $diskon2,
            'harga2' => $harga_diskon2,
            'tindakan3' => $tindakan3,
            'diskon3' => $diskon3,
            'harga3' => $harga_diskon3,
            'tindakan4' => $tindakan4,
            'diskon4' => $diskon4,
            'harga4' => $harga_diskon4,
            'tindakan5' => $tindakan5,
            'diskon5' => $diskon5,
            'harga5' => $harga_diskon5,
            'jenis_obat' => $jenis_obat,
            'jumlah_obat' => $jumlah_obat,
            'jenis_obat2' => $jenis_obat2,
            'jumlah_obat2' => $jumlah_obat2,
            'jenis_obat3' => $jenis_obat3,
            'jumlah_obat3' => $jumlah_obat3,
            'jenis_obat4' => $jenis_obat4,
            'jumlah_obat4' => $jumlah_obat4,
            'jenis_obat5' => $jenis_obat5,
            'jumlah_obat5' => $jumlah_obat5,
            'pajak' => $this->input->post('tax', true),
            'total' => $this->input->post('total', true),
            'date_created' => date('Y/m/d H:i:s')
        ];
        $this->db->where('nama_pasien', $id_pasien);
        $this->db->update('form_invoice', $data);
    }

    // delete form invoice
    public function delete_form_invoice($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('form_invoice');
    }
}
?>