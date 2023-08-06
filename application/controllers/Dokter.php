<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

use Carbon\Carbon;

class Dokter extends CI_Controller{
    // constructor
    public function __construct()
    {
        parent::__construct();

        // load model user
        $this->load->model('User_model', 'user');

        // load model pasien 
        $this->load->model('Pasien_model', 'pasien');

        // load model tindakan
        $this->load->model('Tindakan_model', 'tindakan');

        // load model pajak
        $this->load->model('Pajak_model', 'pajak');

        // load model jenis_obat
        $this->load->model('Jenis_obat_model', 'jenis_obat');

        // load model form_invoice
        $this->load->model('Form_invoice_model', 'form_invoice');

        // load model form_pemeriksaan
        $this->load->model('Form_pemeriksaan_model', 'form_pemeriksaan');


        // cek session untuk username
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        // cek session untuk role_id
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }

        // function helper untuk mengecek role access(admin atau dokter)
        is_logged_in();
    }


    // print data pasien by (by nik, by date)
    public function print_pasien_by(){


        // print data pasien by date
        if($this->input->post('dari_tanggal') && $this->input->post('dari_tanggal')){

            $from_date = $this->input->post('dari_tanggal');
            $to_date = $this->input->post('sampai_tanggal');
            $data['all_pasien'] = $this->pasien->get_all_data_pasien_by_date($from_date, $to_date)->result_array();
            // eror handling jika data tidak ditemukan
            if($data['all_pasien'] == null){

                // flash data
                $this->session->set_flashdata('flash_print_by_date', 'dicetak!');

                redirect('dokter/recordpasien');

            }

            $data['total'] = $this->pasien->get_all_data_pasien_by_date($from_date, $to_date)->num_rows();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_data_pasien', $data, true));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A5', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('data_pasien_by_tanggal.pdf', array('Attachment' => 0));
        }

        // prin data pasien by nik
        if($this->input->post('nik')){

            $nik = $this->input->post('nik');
            $data['all_pasien'] = $this->pasien->get_all_data_pasien_by_nik($nik)->result_array();
            // eror handling jika data tidak ditemukan
            if ($data['all_pasien'] == null) {

                // flash data
                $this->session->set_flashdata('flash_print_by_nik', 'dicetak!');

                redirect('dokter/recordpasien');
            }

            $data['total'] = $this->pasien->get_all_data_pasien_by_nik($nik)->num_rows();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_data_pasien', $data, true));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A5', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('data_pasien_by_nik.pdf', array('Attachment' => 0));
        }
    }

    // cetak form pemeriksaaan print pdf
    public function print_form_pemeriksaan($id){

        $data['pemeriksaan'] = $this->form_pemeriksaan->get_all_form_pemeriksaan_by_id($id);

        // mengubah tanggal format dari database menjadi format indonesia
        $tanggal_awal = $data['pemeriksaan']['date_created'];
        // / Ubah format tanggal menggunakan fungsi PHP
        $tanggal_datetime = date_create($tanggal_awal);
        $hari_indonesia = $this->getHariIndonesia(date_format($tanggal_datetime, 'N'));
        // $tanggal_bulan_tahun_indonesia = date_format($tanggal_datetime, 'd F Y');
        $tanggal_bulan_tahun_indonesia = date_format($tanggal_datetime, 'd ') . $this->getBulanIndonesia(date_format($tanggal_datetime, 'n')) . date_format($tanggal_datetime, ' Y');

        // Gabungkan hasilnya
        $data['tanggal_pemeriksaan'] = "{$hari_indonesia}, {$tanggal_bulan_tahun_indonesia}";


        // default waktu
        date_default_timezone_set("Asia/Singapore");
        $date_now = date('Y/m/d');
        // / Ubah format tanggal menggunakan fungsi PHP
        $tanggal_datetime1 = date_create($date_now);
        $hari_indonesia1 = $this->getHariIndonesia(date_format($tanggal_datetime1, 'N'));
        // $tanggal_bulan_tahun_indonesia = date_format($tanggal_datetime, 'd F Y');
        $tanggal_bulan_tahun_indonesia1 = date_format($tanggal_datetime1, 'd ') . $this->getBulanIndonesia(date_format($tanggal_datetime1, 'n')) . date_format($tanggal_datetime1, ' Y');
        $data['tanggal'] = "{$hari_indonesia1}, {$tanggal_bulan_tahun_indonesia1}";


        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->set_option('isRemoteEnabled', TRUE);

        // print logo di pdf
        $image_path = APPPATH . 'assets/img/logobalipriorityapotek.png';
        $image = file_get_contents($image_path);
        $data['logo'] = "data:image/png;base64," . base64_encode($image);
        $dompdf->loadHtml($this->load->view('dokter/cetak_pdf/print_pemeriksaan', $data, true));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'Potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Form Pemeriksaan ' . $data['pemeriksaan']['nama_pasien'] . '.pdf', array('Attachment' => 0));
    }
    
    // function get hari indonesia
    private function getHariIndonesia($dayNumber)
    {
        $hari = [
            '1' => 'Senin',
            '2' => 'Selasa',
            '3' => 'Rabu',
            '4' => 'Kamis',
            '5' => 'Jumat',
            '6' => 'Sabtu',
            '7' => 'Minggu',
        ];
        return $hari[$dayNumber];
    }

    // function get bulan indonesia
    private function getBulanIndonesia($monthNumber)
    {
        $bulan = [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        return $bulan[$monthNumber];
    }


    // cetak invoice print pdf
    public function print_invoice($id)
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        $data['invoice'] = $this->form_invoice->get_all_form_invoice_by_id($data['user']['id'],$id)->row_array();

        var_dump($data['invoice']);
        die;

        // Mendapatkan tanggal sekarang
        $tanggal = Carbon::now()->locale('id_ID');

        // Format tanggal dengan bahasa Indonesia: "Selasa, 18 Juli 2023"
        $tanggal_format = $tanggal->isoFormat('dddd, D MMMM YYYY');

        $data['tanggal'] = $tanggal_format;

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->load->view('dokter/cetak_pdf/print_invoice', $data, true));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'Potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Invoice '.$data['invoice']['nama_pasien'].'.pdf', array('Attachment' => 0));
    }


    // print record pasien
    public function print_data_pasien()
    {
        $data['all_pasien'] = $this->pasien->get_all_data_pasien_by_dokter($this->session->userdata('username'))->result_array();
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->load->view('dokter/cetak_pdf/print_data_pasien', $data, true));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('data_pasien_dokter.pdf', array('Attachment' => 0));
    }


    // ajax untuk mencari data histori pasien 
    public function get_historical_data()
    {
        $nik = $this->input->post('nik');
        $historical_data = $this->pasien->get_data_pasien_by_nik($nik);
        if ($historical_data) {
            echo json_encode(array('success' => true, 'data' => $historical_data));
        } else {
            echo json_encode(array('success' => false));
        }
    }

    // change status pasien 
    public function change_status($id)
    {
        
        $status = 3;
        // status pasien
        $this->pasien->change_status_pasien($id, $status);

        // flashdata
        $this->session->set_flashdata('flash_status', 'diubah!');
        redirect('dokter/antrianpasien');
    }


    // halaman utama dokter
    public function index()
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        $data['nav'] = "beranda";
        $data['title'] = 'Dokter';

        // all pasien
        $data['all_pasien'] =
        $this->pasien->get_all_data_pasien_by_dokter($this->session->userdata('username'))->num_rows();


        // all antrian pasien
        $data['all_antrian_pasien'] =
        $data['pasien_today'] = $this->pasien->get_pasien_today_by_dokter($data['user']['id'])->num_rows();

        // all form_pemeriksaan
        $data['all_form_pemeriksaan'] = $this->form_pemeriksaan->get_all_form_pemeriksaan($data['user']['id'])->num_rows();


        // all form_invoice
        $data['all_form_invoice'] = $this->form_invoice->get_all_form_invoice($data['user']['id'])->num_rows();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dokter', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/beranda/index', $data);
        $this->load->view('templates/footer_dokter');
    }

    // halaman data pasien
    public function recordpasien(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "record_pasien";
        $data['title'] = 'Dokter';

        $data['all_pasien'] = $this->pasien->get_all_data_pasien_by_dokter($this->session->userdata('username'))->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dokter', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/record_pasien/index', $data);
        $this->load->view('templates/footer_dokter');
    }

    // halaman tambah data pasien 
    public function tambah_pasien(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // Nomor riwayat pasien
        $this->form_validation->set_rules(
            'no_rm',
            'No_rm',
            'required|trim',
            [
                'required' => 'Nomor riwayat harus disii!'
            ]
        );

        // NIK Pasien
        $this->form_validation->set_rules(
            'nik',
            'Nik',
            'required|trim|min_length[16]|max_length[16]|numeric',
            [
                'required' => 'NIK pasien harus disii!',
                'min_length' => 'NIK pasien harus 16 digit!',
                'max_length' => 'NIK pasien harus 16 digit!',
            ]
        );

        // Nama Pasien
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama pasien harus disii!'
            ]
        );

        // Tanggal lahir
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal_lahir',
            'required|trim',
            [
                'required' => 'Tanggal lahir harus disii!'
            ]
        );

        // Umur Pasien
        $this->form_validation->set_rules(
            'umur',
            'Umur',
            'required|trim',
            [
                'required' => 'Umur pasien harus disii!'
            ]
        );

        // Alamat Pasien
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|trim',
            [
                'required' => 'Alamat pasien harus disii!'
            ]
        );

        // Nomor Telepon
        $this->form_validation->set_rules(
            'no_tlp',
            'No_tlp',
            'required|trim',
            [
                'required' => 'Nomor telepon pasien harus disii!'
            ]
        );

        if ($this->form_validation->run() == false) {

            // nomer riwayat pasien
            $prefix = "BPA-";
            $no_riwayat = $prefix . date('ymd') . uniqid();
            $data['no_riwayat'] = $no_riwayat;
            $data['dokter'] = $this->user->get_all_data_dokter();
            $data['nav'] = "record_pasien";
            $data['title'] = 'Dokter';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_dokter', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/record_pasien/tambah_pasien', $data);
            $this->load->view('templates/footer_dokter');
        } else {
            $this->pasien->insert_pasien_by_dokter($data['user']['id']);

            // flashdata
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect('dokter/recordpasien');
        }
    } 

    // halaman edit data pasien
    public function edit_pasien($id){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        $data['pasien'] = $this->pasien->get_data_pasien_by_id($id);

        // Nomor riwayat pasien
        $this->form_validation->set_rules(
            'no_rm',
            'No_rm',
            'required|trim',
            [
                'required' => 'Nomor riwayat harus disii!'
            ]
        );

        // NIK Pasien
        $this->form_validation->set_rules(
            'nik',
            'Nik',
            'required|trim|min_length[16]|max_length[16]|numeric',
            [
                'required' => 'NIK pasien harus disii!',
                'min_length' => 'NIK pasien harus 16 digit!',
                'max_length' => 'NIK pasien harus 16 digit!',
            ]
        );

        // Nama Pasien
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama pasien harus disii!'
            ]
        );

        // Tanggal lahir
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal_lahir',
            'required|trim',
            [
                'required' => 'Tanggal lahir harus disii!'
            ]
        );

        // Umur Pasien
        $this->form_validation->set_rules(
            'umur',
            'Umur',
            'required|trim',
            [
                'required' => 'Umur pasien harus disii!'
            ]
        );

        // Alamat Pasien
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|trim',
            [
                'required' => 'Alamat pasien harus disii!'
            ]
        );

        // Nomor Telepon
        $this->form_validation->set_rules(
            'no_tlp',
            'No_tlp',
            'required|trim',
            [
                'required' => 'Nomor telepon pasien harus disii!'
            ]
        );

        if ($this->form_validation->run() == false) {

            $data['dokter'] = $this->user->get_all_data_dokter();
            $data['nav'] = "record_pasien";
            $data['title'] = 'Dokter';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_dokter', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/record_pasien/edit_pasien', $data);
            $this->load->view('templates/footer_dokter');
        } else {
            $this->pasien->edit_pasien_by_dokter($id, $data['user']['id']);

            // flashdata
            $this->session->set_flashdata('flash', 'diedit!');
            redirect('dokter/recordpasien');
        }
    }

    // hapus data pasien
    public function hapus_pasien($id)
    {
        $this->pasien->delete_pasien($id);

        // flashdata
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('dokter/recordpasien');
    }

    // halaman antrian pasien 
    public function antrianpasien(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "antrian_pasien";
        $data['title'] = 'Dokter';
        $data['pasien_today'] = $this->pasien->get_pasien_today_by_dokter($data['user']['id'])->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dokter', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/antrian_pasien/index', $data);
        $this->load->view('templates/footer_dokter');
    }

    // halamam form pemeriksaan pasien
    public function form_pemeriksaan(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "form_pemeriksaan";
        $data['title'] = 'Dokter';
        $data['all_form_pemeriksaan'] = $this->form_pemeriksaan->get_all_form_pemeriksaan($data['user']['id'])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dokter', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/form_pemeriksaan/index', $data);
        $this->load->view('templates/footer_dokter');
    }

    // halaman tambah form pemeriksaan pasien
    public function tambah_form_pemeriksaan($id){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nama pasien
        $data['pasien'] = $this->pasien->get_data_pasien_by_id($id);
        // Nama Pasien
        $this->form_validation->set_rules(
            'nama_pasien',
            'Nama_pasien',
            'required|trim',
            [
                'required' => 'Nama pasien harus dipilih!'
            ]
        );

        // Subjektif
        $this->form_validation->set_rules(
            'subjektif',
            'Subjektif',
            'required|trim|max_length[1000]',
            [
                'required' => 'subjektif harus disii!',
                'max_length' => 'subjektif maksimal 1000 karakter!'
            ]
        );


        // Objektif
        $this->form_validation->set_rules(
            'objektif',
            'Objektif',
            'required|trim|max_length[1000]',
            [
                'required' => 'objektif harus disii!',
                'max_length' => 'objektif maksimal 1000 karakter!'
            ]
        );

        // Assesment
        $this->form_validation->set_rules(
            'assesment',
            'Assesment',
            'required|trim|max_length[1000]',
            [
                'required' => 'Assesment harus disii!',
                'max_length' => 'objektif maksimal 1000 karakter!'
            ]
        );

        // Plan
        $this->form_validation->set_rules(
            'plan',
            'Plan',
            'required|trim|max_length[1000]',
            [
                'required' => 'Plan harus disii!',
                'max_length' => 'objektif maksimal 1000 karakter!'
            ]
        );

        // Nama Pemeriksa
        $this->form_validation->set_rules(
            'dokter',
            'Dokter',
            'required|trim|max_length[1000]',
            [
                'required' => 'Pemeriksa harus dipilih!',
            ]
        );

        if ($this->form_validation->run() == false) {

            $data['all_pasien_by_dokter'] = $this->pasien->get_pasien_today_by_dokter($data['user']['id'])->result_array();
            $data['dokter'] = $this->user->get_all_data_dokter();
            $data['nav'] = "antrian_pasien";
            $data['title'] = 'Dokter';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_dokter', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/form_pemeriksaan/tambah_form_pemeriksaan', $data);
            $this->load->view('templates/footer_dokter');
        } else {

            $this->form_pemeriksaan->insert_form_pemeriksaan($data['pasien']['id_dokter'],$id);


            // change status menjadi prose yaitu angka 1
            $status = 1;
            $this->pasien->change_status_pasien($id, $status);

            // change status pemeriksaan menjadi 1 (ketika data sudah ditambahkan)
            $this->pasien->change_status_pemeriksaan($id, $status);

            // flashdata
            $this->session->set_flashdata('flash_form_pemeriksaan', 'ditambahkan!');
            redirect('dokter/antrianpasien');
        }
    }

    // halaman edit form pemeriksaan pasien
    public function edit_form_pemeriksaan($id_pasien)
    {

        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // get doker kecuali id
        $data['dokter_not_id'] = $this->user->get_data_kecuali_id($data['user']['id']);


        $data['form_pemeriksaan'] = $this->form_pemeriksaan->get_all_form_pemeriksaan_by_id_pasien($id_pasien);

        // nama pasien berupa id
        $data['pasien'] = $this->pasien->get_data_pasien_by_id($id_pasien);

        // eror handling
        if($data['form_pemeriksaan'] == null && $this->input->post('id_pasien') == null && $this->input->post('id_dokter') == null){
            echo 'Data tidak ditemukan!';
            die;
        }

        // Nama Pasien
        $this->form_validation->set_rules(
            'nama_pasien',
            'Nama_pasien',
            'required|trim',
            [
                'required' => 'Nama pasien harus dipilih!'
            ]
        );

        // Subjektif
        $this->form_validation->set_rules(
            'subjektif',
            'Subjektif',
            'required|trim|max_length[1000]',
            [
                'required' => 'subjektif harus disii!',
                'max_length' => 'subjektif maksimal 1000 karakter!'
            ]
        );

        // Objektif
        $this->form_validation->set_rules(
            'objektif',
            'Objektif',
            'required|trim|max_length[1000]',
            [
                'required' => 'objektif harus disii!',
                'max_length' => 'objektif maksimal 1000 karakter!'
            ]
        );

        // Assesment
        $this->form_validation->set_rules(
            'assesment',
            'Assesment',
            'required|trim|max_length[1000]',
            [
                'required' => 'Assesment harus disii!',
                'max_length' => 'objektif maksimal 1000 karakter!'
            ]
        );

        // Plan
        $this->form_validation->set_rules(
            'plan',
            'Plan',
            'required|trim|max_length[1000]',
            [
                'required' => 'Plan harus disii!',
                'max_length' => 'objektif maksimal 1000 karakter!'
            ]
        );

        // Nama Pemeriksa
        $this->form_validation->set_rules(
            'dokter',
            'Dokter',
            'required|trim|max_length[1000]',
            [
                'required' => 'Pemeriksa harus dipilih!',
            ]
        );

        if ($this->form_validation->run() == false) {

            $data['all_pasien_by_dokter'] = $this->pasien->get_pasien_today_by_dokter($data['user']['id']);

            $data['dokter'] = $this->user->get_all_data_dokter();
            $data['nav'] = "antrian_pasien";
            $data['title'] = 'Dokter';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_dokter', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/form_pemeriksaan/edit_form_pemeriksaan', $data);
            $this->load->view('templates/footer_dokter');
        } else {


            $this->form_pemeriksaan->edit_form_pemeriksaan($data['user']['id'], $this->input->post('id_pasien'));

            // change status menjadi prose yaitu angka 1
            $status = 1;
            $this->pasien->change_status_pasien($this->input->post('id_pasien'), $status);

            // change status pemeriksaan menjadi 2 (ketika data sudah diedit)
            $status1 = 2;
            $this->pasien->change_status_pemeriksaan($this->input->post('id_pasien'), $status1);

            // flashdata
            $this->session->set_flashdata('flash_form_pemeriksaan', 'diedit!');
            redirect('dokter/antrianpasien');
        }
    }

    // hapus form pemeriksaan
    public function hapus_form_pemeriksaan($id){
        $this->form_pemeriksaan->delete_form_pemeriksaan($id);

        // flashdata
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('dokter/form_pemeriksaan');
    }

    //  halaman form invoice
    public function form_invoice($id){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "form_invoice";
        $data['title'] = 'Dokter';
        $data['all_form_invoice'] = $this->form_invoice->get_all_form_invoice($data['user']['id'])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dokter', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/form_invoice/index', $data);
        $this->load->view('templates/footer_dokter');
    }

    // halaman tambah form invoice
    public function tambah_form_invoice($id){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nama pasien 
        $data['pasien'] = $this->pasien->get_data_pasien_by_id($id);
        // var_dump($data['pasien']);

        // get all tindakan
        $data['all_tindakan'] = $this->tindakan->get_all_data_tindakan();

        // get all obat
        $data['all_obat'] = $this->jenis_obat->get_all_data_obat();

        // all pajak 
        $data['all_pajak'] = $this->pajak->get_all_data_pajak();

        // tindakan 1 
        $this->form_validation->set_rules(
            'tindakan1',
            'Tindakan1',
            'required|trim',
            [
                'required' => 'Tindakan1 harus dipilih!',
            ]
        );

        // Jenis obat
        $this->form_validation->set_rules(
            'obat',
            'obat',
            'required|trim',
            [
                'required' => 'Jenis obat harus dipilih!',
            ]
        );

        // pajak
        $this->form_validation->set_rules(
            'tax',
            'Tax',
            'required|trim',
            [
                'required' => 'Pajak harus dipilih!',
            ]
        );


        if($this->form_validation->run() === false){
            $data['nav'] = "antrian_pasien";
            $data['title'] = 'Dokter';

            // nomer invoice
            $prefix = "BPA-";
            $no_invoice = $prefix . date('ymd') .
            sprintf('%06d', mt_rand(0, 999999));
            $data['no_invoice'] = $no_invoice;

            // antrian data pasien

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_dokter', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/form_invoice/tambah_form_invoice', $data);
            $this->load->view('templates/footer_dokter', $data);
        }else{

            // tindakan 1 - 5
            $tindakan = [
                'tindakan1' => $this->input->post('tindakan1', true),
                'diskon1' => $this->input->post('diskon_tindakan1', true),
                'harga1' => $this->input->post('harga_diskon', true),
                'tindakan2' => $this->input->post('tindakan2', true),
                'diskon2' => $this->input->post('diskon_tindakan2', true),
                'harga2' => $this->input->post('harga_diskon2', true),
                'tindakan3' => $this->input->post('tindakan3', true),
                'diskon3' => $this->input->post('diskon_tindakan3', true),
                'harga3' => $this->input->post('harga_diskon3', true),
                'tindakan4' => $this->input->post('tindakan4', true),
                'diskon4' => $this->input->post('diskon_tindakan4', true),
                'harga4' => $this->input->post('harga_diskon4', true),
                'tindakan5' => $this->input->post('tindakan5', true),
                'diskon5' => $this->input->post('diskon_tindakan5', true),
                'harga5' => $this->input->post('harga_diskon5', true)
            ];

            // var_dump($tindakan);

            // jenis obat 1 - 5
            $obat = [
                'jenis_obat' => $this->input->post('obat',true),
                'jumlah_obat' => $this->input->post('jumlah',true),
                'jenis_obat2' => $this->input->post('obat1', true),
                'jumlah_obat2' => $this->input->post('jumlah1', true),
                'jenis_obat3' => $this->input->post('obat2', true),
                'jumlah_obat3' => $this->input->post('jumlah2', true),
                'jenis_obat4' => $this->input->post('obat3', true),
                'jumlah_obat4' => $this->input->post('jumlah3', true),
                'jenis_obat5' => $this->input->post('obat4', true),
                'jumlah_obat5' => $this->input->post('jumlah4', true),

            ];
            // var_dump($obat);

            // var_dump($this->input->post('id_pasien'));
            // var_dump($data['pasien']['id_pasien']);
            $this->form_invoice->insert_form_invoice($data['user']['id'], $id);

            // change status menjadi prose yaitu angka 1
            $status = 2;
            $this->pasien->change_status_pasien($id, $status);

            // change status invoice menjadi 1 (ketika data sudah ditambahkan)
            $status1 = 1;
            $this->pasien->change_status_invoice($id, $status1);

            // flashdata
            $this->session->set_flashdata('flash_form_invoice', 'ditambahkan!');
            redirect('dokter/antrianpasien');
        }
    }

    // halaman edit form invoice
    public function edit_form_invoice($id)
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nama pasien 
        $data['all_pasien_by_dokter'] = $this->pasien->get_pasien_today_by_dokter($data['user']['id'])->result_array();

        // nama pasien 
        $data['pasien'] = $this->pasien->get_data_pasien_by_id($id);


        // get all tindakan
        $data['all_tindakan'] = $this->tindakan->get_all_data_tindakan();

        // get all obat
        $data['all_obat'] = $this->jenis_obat->get_all_data_obat();

        // all pajak 
        $data['all_pajak'] = $this->pajak->get_all_data_pajak();

        // get data form invoice by id
        $data['form_invoice'] = $this->form_invoice->get_form_invoice_by_id_pasien($id);


        // eror handling
        if ($data['form_invoice'] == null) {
            echo 'Data tidak ditemukan!';
            die;
        }

        // pajak
        $this->form_validation->set_rules(
            'tax',
            'Tax',
            'required|trim',
            [
                'required' => 'Pajak harus dipilih!',
            ]
        );


        if ($this->form_validation->run() === false) {
            $data['nav'] = "antrian_pasien";
            $data['title'] = 'Dokter';
            // get pasien kecuali id di selected
            $data['nama_pasien_not_id'] = $this->pasien->get_pasien_today_by_dokter_kecuali_id($data['user']['id'], $data['form_invoice']['id_pasien']);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_dokter', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/form_invoice/edit_form_invoice', $data);
            $this->load->view('templates/footer_dokter');
        } else {
            $this->form_invoice->edit_form_invoice($data['user']['id'], $id);

            // change status menjadi prose yaitu angka 1
            $status = 2;
            $this->pasien->change_status_pasien($id, $status);

            // change status invoice menjadi 2 (ketika data sudah diedit)
            $this->pasien->change_status_invoice($id, $status);

            // flashdata
            $this->session->set_flashdata('flash_form_invoice', 'diedit!');
            redirect('dokter/antrianpasien');
        }
    }

    // hapus form invoice
    public function hapus_form_invoice($id)
    {
        $this->form_invoice->delete_form_invoice($id);

        // flashdata
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('dokter/form_invoice');
    }

    // memanggil data tindakan melalui ajax
    public function getTindakan(){

        // Ambil nilai tindakanId yang dikirim melalui AJAX
        $tindakanId = $this->input->post('tindakanId');

        // eror handling
        if($tindakanId == null){
            $data = 'Maaf Data Tidak Ditemukan';
        }else{
            $data['tindakan'] = $this->tindakan->get_data_tindakan_by_id($tindakanId);
            $data = $data['tindakan']['biaya'];
        }
                
        // Kirim data dalam format JSON
        echo json_encode($data);

    }

    // memanggil data obat melalui ajax
    public function getObat()
    {
        // Ambil nilai tindakanId yang dikirim melalui AJAX
        $obatId = $this->input->post('obatId');

        // eror handling
        if ($obatId == null
        ) {
            $data = 'Maaf Data Tidak Ditemukan';
        } else {
            $data['obat'] = $this->jenis_obat->get_data_obat_by_id($obatId);
            $data = $data['obat']['harga'];

        }
        // Kirim data dalam format JSON
        echo json_encode($data);
    }

    // memanggil ajax jenis obat untuk menghitung jumlah obat
    public function getJumlahObat(){

        $id_obat = $this->input->post('obatId');
        $jumlah = $this->input->post('jumlah');

        // var_dump($id_obat);
        // var_dump($jumlah);


        // eror handling
        if ($id_obat == null || $jumlah == null) {
            $hasil = 'Pilih jenis obat';
        }else{
            $data['obat'] = $this->jenis_obat->get_data_obat_by_id($id_obat);
            $harga = $data['obat']['harga'];

            // mulai menghitung
            $hasil = intval($harga) * intval($jumlah);

        }

        // Kirim data dalam format JSON
        echo json_encode($hasil);
    }   

    // kalkulasi total keluruhan
    public function getTotalKeseluruhan(){

        // harga tindakan 1 - 5
        $hargaTindakan1 = $this->input->post('hargaTindakan1');
        $hargaTindakan2 = $this->input->post('hargaTindakan2');
        $hargaTindakan3 = $this->input->post('hargaTindakan3');
        $hargaTindakan4 = $this->input->post('hargaTindakan4');
        $hargaTindakan5 = $this->input->post('hargaTindakan5');

        // harga obat 1 - 5
        $harga_obat = $this->input->post('harga_obat');
        $harga_obat2 = $this->input->post('harga_obat2');
        $harga_obat3 = $this->input->post('harga_obat3');
        $harga_obat4 = $this->input->post('harga_obat4');
        $harga_obat5 = $this->input->post('harga_obat5');

        // pajak
        $pajak = $this->input->post('pajak');

        // Konversi nilai pajak ke integer tanpa persen
        $pajak = intval(str_replace('%', '', $pajak));

        // mulai menghitung
        $hasil1 = intval($hargaTindakan1) + intval($hargaTindakan2) + intval($hargaTindakan3) + intval($hargaTindakan4) + intval($hargaTindakan5)+ intval($harga_obat) + intval($harga_obat2) + intval($harga_obat3) + intval($harga_obat4) + +intval($harga_obat5);


        $hasil2 = intval($hasil1) + ( $hasil1 * ($pajak / 100));

        // Kirim data dalam format JSON
        echo json_encode($hasil2);
    }

    // halaman tentang
    public function tentang()
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "tentang";
        $data['title'] = 'Dokter';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dokter', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/tentang', $data);
        $this->load->view('templates/footer_dokter');
    }

    // halaman my profile
    public function myprofile()
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "pengaturan";
        $data['title'] = 'Dokter';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_dokter', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/pengaturan/myprofile', $data);
        $this->load->view('templates/footer_dokter');
    }

    // halaman edit profile
    public function editprofile()
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // input untuk nama di form_validation
        // input untuk nama
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama tidak boleh kosong!'
            ]
        );

        // input untuk username
        // input untuk nama
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            [
                'required' => 'Username tidak boleh kosong!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['nav'] = "pengaturan";
            $data['title'] = 'Dokter';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_dokter', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/pengaturan/editprofile', $data);
            $this->load->view('templates/footer_dokter');
        } else {
            // upload gambar
            // cel jika ada gambar di upload atau tidak dari variable $_FILES
            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                // file format yang boleh diupload
                $config['allowed_types'] = 'gif|jpg|png|jpeg|heic';

                // ukuran file yang boleh diupload lebh dari 5mb
                $config['max_size'] = '5120';

                // lokasi penyimpanan file
                $config['upload_path'] = './assets/img/dokter/profile/';

                // resolusi gambar yang diupload
                // $config['max_width'] = '1024';
                // $config['max_height'] = '768';

                // load library upload  
                $this->load->library('upload', $config);

                // cek apakah file berhasil diupload
                if ($this->upload->do_upload('gambar')) {

                    // jika berhasil 
                    $new_image = $this->upload->data('file_name');

                    // hapus gambar lama
                    $old_image = $data['user']['foto'];
                    // cek apakah ada gambar atau tidak
                    // cek jika selain nama gambar default maka hapus gambar lama
                    if ($old_image && $old_image != 'default.png') {
                        // jika ada hapus gambar lama
                        unlink(FCPATH . 'assets/img/dokter/profile/' . $old_image);
                    }
                    // add gambar baru 
                    $new_image = $this->upload->data('file_name');
                } else {
                    // jika gagal
                    echo $this->upload->display_errors();
                }
            } else {
                // jika tidak ada gambar yang diupload
                $new_image = $data['user']['foto'];
            }

            $this->user->editprofile($new_image, $this->input->post('username'));

            // flashdata
            $this->session->set_flashdata('flash', 'diedit!');
            redirect('dokter/myprofile');
        }
    }

    // halaman ganti kata sandi
    public function gantikatasandi()
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        // form validation
        // password lama
        $this->form_validation->set_rules(
            'passwordcurrent',
            'PasswordCurrent',
            'required|trim',
            [
                'required' => 'Password tidak boleh kosong!'
            ]
        );

        // password baru 
        $this->form_validation->set_rules(
            'passwordnew',
            'PasswordNew',
            'required|trim|min_length[8]|matches[passwordconfirm]',
            [
                'matches' => "Password tidak sama!",
                'min_length' => "Password terlalu pendek!",
                'required' => 'Password baru tidak boleh kosong!'
            ]
        );

        // password konfirmasi baru
        $this->form_validation->set_rules(
            'passwordconfirm',
            'PasswordConfirm',
            'required|trim|min_length[8]|matches[passwordnew]',
            [
                'required' => 'Konfirmasi password tidak boleh kosong!',
                'matches' => "Password tidak sama!",
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['nav'] = "pengaturan";
            $data['title'] = 'Dokter';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_dokter', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dokter/pengaturan/gantikatasandi', $data);
            $this->load->view('templates/footer_dokter');
        } else {
            // cek input password lama dan password baru
            $currentpassword =  $this->input->post('passwordcurrent');
            $newpassword = $this->input->post('passwordnew');

            // perkondisian pasword lama dan password baru
            // password diterjemahkan dengan password_verify
            if (!password_verify($currentpassword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
                redirect('dokter/gantikatasandi');
            } else {
                // jika password lama dan password baru sama 
                if ($currentpassword == $newpassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('dokter/gantikatasandi');
                } else {
                    // jika password benar
                    // password di enkripsi
                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);

                    // update password 
                    $this->user->updatepassword($password_hash, $this->session->userdata('username'));
                    // flashdata
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">Password berhasil dirubah. Silahkan login ulang</div>'
                    );
                    // redirect
                    redirect('dokter/gantikatasandi');
                }
            }
        }

    }
}
?>