<?php
require 'vendor/autoload.php';

// reference the Dompdf namespace
// pdf
use Dompdf\Dompdf;
// time untuk indonesia
use Carbon\Carbon;

class Admin extends CI_Controller{

    // constructor
    public function __construct(){
        parent:: __construct();

        // load model user
        $this->load->model('User_model', 'user');


        // Load model pasien
        $this->load->model('Pasien_model', 'pasien');


        // Load model data pasien
        $this->load->model('Data_pasien_model', 'data_pasien');


        // load model tindakan 
        $this->load->model('Tindakan_model', 'tindakan');

        // load model jenis obat 
        $this->load->model('Jenis_obat_model', 'jenis_obat');

        // load model form_invoice
        $this->load->model('Form_invoice_model', 'form_invoice');

        // load model form pemeriksaan
        $this->load->model('Form_pemeriksaan_model', 'form_pemeriksaan');

        // load model pajak
        $this->load->model('Pajak_model', 'pajak');


        $this->load->library('session');

        // cek session untuk username
        if (!$this->session->userdata('username')) {
            // echo 'test1';
            // die;
            redirect('auth');
        }

        // cek session untuk role_id
        if (!$this->session->userdata('role_id')) {
            redirect('auth');
        }

        // function helper untuk mengecek role access(admin atau dokter)
        is_logged_in();
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

    // print data all invoice 
    public function print_invoice_all(){

        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['all_invoice'] = $this->form_invoice->get_all_form_invoice_by_admin($data['user']['id'])->result_array();

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_invoice_all', $data, true));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'lanscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('data_invoice.pdf', array('Attachment' => 0));
    }


    // print data all invoice 
    public function print_invoice_by()
    {
        // print invoice by dokter
        if($this->input->post('dokter')){
            $dokter = $this->input->post('dokter');
            $data['all_invoice'] = $this->form_invoice->get_all_form_invoice_by_dokter($dokter)->result_array();
            // eror handling jika data tidak ditemukan
            if ($data['all_invoice'] == null) {

                // flash data
                $this->session->set_flashdata('flash_print_by_dokter', 'dicetak!');

                redirect('admin/riwayat_invoice');

            }
            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_invoice_all', $data, true));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A5', 'lanscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('data_invoice.pdf', array('Attachment' => 0));
        }

        // print invoice by date
        if ($this->input->post('dari_tanggal') && $this->input->post('dari_tanggal')
        ) {

            $from_date = $this->input->post('dari_tanggal');
            $to_date = $this->input->post('sampai_tanggal');
            $data['all_invoice'] = $this->form_invoice->get_all_form_invoice_by_date($from_date, $to_date)->result_array();

            // eror handling jika data tidak ditemukan
            if ($data['all_invoice'] == null) {

                // flash data
                $this->session->set_flashdata('flash_print_by_date', 'dicetak!');

                redirect('admin/riwayat_invoice');
            }

            // $data['total'] = $this->pasien->get_all_data_pasien_by_date($from_date, $to_date)->num_rows();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_invoice_all', $data, true));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A5', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('data_invoice_by_tanggal.pdf', array('Attachment' => 0));
        }


        // prin data pasien by nik
        if ($this->input->post('nik')) {

            $nik = $this->input->post('nik');
            $data['all_invoice'] = $this->form_invoice->get_all_data_invoice_by_nik($nik)->result_array();
            // eror handling jika data tidak ditemukan
            if ($data['all_invoice'] == null) {

                // flash data
                $this->session->set_flashdata('flash_print_by_nik', 'dicetak!');

                redirect('admin/riwayat_invoice');
            }

            // $data['total'] = $this->pasien->get_all_data_pasien_by_nik($nik)->num_rows();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_invoice_all', $data, true));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A5', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('data_invoice_by_nik.pdf', array('Attachment' => 0));
        }

    }


    // print data pasien
    public function print_data_pasien_by()
    {

        // print data pasien by date
        if ($this->input->post('dari_tanggal') && $this->input->post('dari_tanggal')) {

            $from_date = $this->input->post('dari_tanggal');
            $to_date = $this->input->post('sampai_tanggal');
            $data['all_pasien'] = $this->data_pasien->get_all_data_pasien_by_date($from_date, $to_date)->result_array();
            

            // eror handling jika data tidak ditemukan
            if ($data['all_pasien'] == null
            ) {

                // flash data
                $this->session->set_flashdata('flash_print_by_date', 'dicetak!');

                redirect('admin/pasien');
            }

            $data['total'] = $this->data_pasien->get_all_data_pasien_by_date($from_date, $to_date)->num_rows();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_data_pasien1', $data, true));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A5',
                'landscape'
            );

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('data_pasien_by_tanggal.pdf', array('Attachment' => 0));
        }

        // prin data pasien by nik
        if ($this->input->post('nik')) {

            $nik = $this->input->post('nik');
            $data['all_pasien'] = $this->data_pasien->get_all_data_pasien_by_nik($nik)->result_array();
            // eror handling jika data tidak ditemukan
            if ($data['all_pasien'] == null
            ) {

                // flash data
                $this->session->set_flashdata('flash_print_by_nik', 'dicetak!');

                redirect('admin/pasien');
            }

            $data['total'] = $this->data_pasien->get_all_data_pasien_by_nik($nik)->num_rows();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_data_pasien1', $data, true));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A5',
                'landscape'
            );

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('data_pasien_by_nik.pdf', array('Attachment' => 0));
        }

    }


    // print record pasien by (by nik, by dokter, by date)
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

                redirect('admin/recordpasien');

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

                redirect('admin/recordpasien');
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


        // prin data pasien by dokter
        if ($this->input->post('dokter')) {

            $dokter = $this->input->post('dokter');
            $data['all_pasien'] = $this->pasien->get_all_data_pasien_by_id_dokter($dokter)->result_array();
            // eror handling jika data tidak ditemukan
            if ($data['all_pasien'] == null) {
                // flash data
                $this->session->set_flashdata('flash_print_by_dokter', 'dicetak!');
                redirect('admin/recordpasien');
            }
            $data['total'] = $this->pasien->get_all_data_pasien_by_id_dokter($dokter)->num_rows();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_data_pasien', $data, true));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A5', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('data_pasien_by_dokter.pdf', array('Attachment' => 0));
        }
    }

    // print data tindakan
    public function print_data_tindakan(){
        $data['tindakan'] = $this->tindakan->get_all_data_tindakan();
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_data_tindakan', $data, true));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'potrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream('data_tindakan.pdf', array('Attachment' => 0));
    }

    // print data obat
    public function print_data_obat(){
        $data['obat'] = $this->jenis_obat->get_all_data_obat();
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_data_obat', $data, true));
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'potrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream('data_obat.pdf', array('Attachment' => 0));
    }


    // cetak invoice print pdf by pasien (antrian)
    public function print_invoice_by_pasien($id)
    {
    
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['invoice'] = $this->form_invoice->get_form_invoice_by_id_pasien($id);
        // eror handling jika data tidak ditemukan
        if ($data['invoice'] == null
        ) {
            echo 'Data tidak ditemukan';
            die;
        }

        // mengubah tanggal format dari database menjadi format indonesia
        $tanggal_awal = $data['invoice']['date_created'];
        // / Ubah format tanggal menggunakan fungsi PHP
        $tanggal_datetime = date_create($tanggal_awal);
        $hari_indonesia = $this->getHariIndonesia(date_format($tanggal_datetime, 'N'));
        // $tanggal_bulan_tahun_indonesia = date_format($tanggal_datetime, 'd F Y');
        $tanggal_bulan_tahun_indonesia = date_format($tanggal_datetime, 'd ') . $this->getBulanIndonesia(date_format($tanggal_datetime, 'n')) . date_format($tanggal_datetime, ' Y');

        // Gabungkan hasilnya
        $data['tanggal_invoice'] = "{$hari_indonesia}, {$tanggal_bulan_tahun_indonesia}";


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

        $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_invoice', $data, true));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'Potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Invoice ' . $data['invoice']['nama_pasien'] . '.pdf', array('Attachment' => 0));
    }

    // cetak invoice print pdf by id invoice
    public function print_invoice_by_admin($id)
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        $data['invoice'] = $this->form_invoice->get_form_invoice_by_id($id);

        // eror handling jika data tidak ditemukan
        if($data['invoice'] == null){
            echo 'Data tidak ditemukan';
            die;
        }

        // mengubah tanggal format dari database menjadi format indonesia
        $tanggal_awal = $data['invoice']['date_created'];
        // / Ubah format tanggal menggunakan fungsi PHP
        $tanggal_datetime = date_create($tanggal_awal);
        $hari_indonesia = $this->getHariIndonesia(date_format($tanggal_datetime, 'N'));
        // $tanggal_bulan_tahun_indonesia = date_format($tanggal_datetime, 'd F Y');
        $tanggal_bulan_tahun_indonesia = date_format($tanggal_datetime, 'd ') . $this->getBulanIndonesia(date_format($tanggal_datetime, 'n')) . date_format($tanggal_datetime, ' Y');

        // Gabungkan hasilnya
        $data['tanggal_invoice'] = "{$hari_indonesia}, {$tanggal_bulan_tahun_indonesia}";


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

        $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_invoice', $data, true));
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'Potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Invoice ' . $data['invoice']['nama_pasien'] . '.pdf', array('Attachment' => 0));
    }



    // cetak form pemeriksaaan print pdf
    public function print_form_pemeriksaan($id)
    {
        $data['pemeriksaan'] = $this->form_pemeriksaan->get_all_form_pemeriksaan_by_id_pasien($id);

        if($data['pemeriksaan'] == null){
            echo 'data tidak ditemukan';
            die;
        }else{
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
            $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_pemeriksaan', $data, true));

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A5', 'Potrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream('Form Pemeriksaan ' . $data['pemeriksaan']['nama_pasien'] . '.pdf', array('Attachment' => 0));
        }

        
    }

    //  print informed consent psikologi(untuk pasien)
    public function print_informed_consent_psikologi($id)
    {
        $data['pasien'] = $this->pasien->get_data_pasien_by_id($id);
        // Mendapatkan tanggal sekarang
        $tanggal = Carbon::now()->locale('id_ID');

        // Format tanggal dengan bahasa Indonesia: "Selasa, 18 Juli 2023"
        $tanggal_format = $tanggal->isoFormat('dddd, D MMMM YYYY');

        $data['tanggal'] = $tanggal_format;

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_informed_consent_psikologi', $data, true));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'Potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('informed_consent_psikologi '.$data['pasien']['nama'].'.pdf', array('Attachment' => 0));
    }


    //  Riwayat Invoice
    public function riwayat_invoice()
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "riwayat_invoice";
        $data['title'] = 'Administrator';
        $data['dokter'] = $this->user->get_all_data_dokter();

        $data['all_form_invoice'] = $this->form_invoice->get_all_form_invoice_by_admin($data['user']['id'])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/form_invoice/index', $data);
        $this->load->view('templates/footer');
    }




    // print data table pasien
    public function print_data_pasien()
    {

        $data['all_pasien'] = $this->data_pasien->get_all_data_pasien()->result_array();
        // instantiate and use the dompdf class

        $data['total'] =
            $this->data_pasien->get_all_data_pasien()->num_rows();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_data_pasien1', $data, true));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('data_pasien.pdf', array('Attachment' => 0));
    }

    // print record pasien
    public function print_record_pasien(){

        $data['all_pasien'] = $this->pasien->get_all_data_pasien()->result_array();
        // instantiate and use the dompdf class

        $data['total'] =
        $this->pasien->get_all_data_pasien()->num_rows();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->load->view('admin/cetak_pdf/print_data_pasien', $data, true));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A5', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('record_pasien.pdf', array('Attachment' => 0));
    }

    // halaman utama admin
    public function index(){

        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        $data['nav'] = "beranda";
        $data['title'] = 'Administrator';

        // ambil data dokter
        $data['all_dokter'] = $this->user->count_akun_dokter();

        // ambil data record pasien
        $data['all_pasien'] = $this->pasien->count_all_pasien();

        // ambil data pasien
        $data['all_data_pasien'] = $this->data_pasien->get_all_data_pasien()->num_rows();

        // ambil data antrian pasien
        $data['all_antrian'] = $this->pasien->count_all_antrian_pasien();

        // ambil data tindakan 
        $data['all_tindakan'] = $this->tindakan->count_data_tindakan();

        // ambil data obat
        $data['all_obat'] = $this->jenis_obat->count_data_obat();

        // ambil data pajak
        $data['all_pajak'] = $this->pajak->count_data_pajak();

        // ambil data riwayat invoice
        $data['all_invoice'] = $this->form_invoice->get_all_form_invoice_by_admin()->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/beranda/index', $data);
        $this->load->view('templates/footer');

    }



    // halaman data pasien 
    public function pasien()
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "pasien";
        $data['title'] = 'Administrator';
        $data['all_pasien'] = $this->data_pasien->get_all_data_pasien()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pasien/index', $data);
        $this->load->view('templates/footer');
    }


    // halaman edit data pasien 
    public function edit_data_pasien($nik)
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // data pasien by nik 
        $data['pasien'] = $this->data_pasien->get_data_pasien_by_nik($nik);

        // NIK Pasien
        $this->form_validation->set_rules(
            'nik_pasien',
            'Nik_pasien',
            'required|trim|min_length[16]|max_length[16]|numeric',
            [
                'required' => 'NIK pasien harus disii!',
                'min_length' => 'NIK pasien harus 16 digit!',
                'max_length' => 'NIK pasien harus 16 digit!',
                // 'is_unique' => 'NIK pasien sudah terdaftar!'
            ]
        );

        // Nama Pasien
        $this->form_validation->set_rules(
            'nama_pasien',
            'Nama_pasien',
            'required|trim',
            [
                'required' => 'Nama pasien harus disii!'
            ]
        );

        // Tanggal lahir
        $this->form_validation->set_rules(
            'tanggal_lahir_pasien',
            'Tanggal_lahir_pasien',
            'required|trim',
            [
                'required' => 'Tanggal lahir harus disii!'
            ]
        );

        // Umur Pasien
        $this->form_validation->set_rules(
            'umur_pasien',
            'Umur_pasien',
            'required|trim',
            [
                'required' => 'Umur pasien harus disii!'
            ]
        );

        // Jenis Kelamin  
        $this->form_validation->set_rules(
            'jenis_kelamin_pasien',
            'Jenis_kelamin_pasien',
            'required|trim',
            [
                'required' => 'Jenis kelamin harus dipilih!'
            ]
        );

        // Alamat Pasien
        $this->form_validation->set_rules(
            'alamat_pasien',
            'Alamat_pasien',
            'required|trim',
            [
                'required' => 'Alamat pasien harus disii!'
            ]
        );

        // Nomor Telepon
        $this->form_validation->set_rules(
            'no_tlp_pasien',
            'No_tlp_pasien',
            'required|trim',
            [
                'required' => 'Nomor telepon pasien harus disii!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['nav'] = "pasien";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pasien/edit_data_pasien', $data);
            $this->load->view('templates/footer');
        } else {

            $this->data_pasien->edit_data_pasien($nik);

            // flashdata
            $this->session->set_flashdata('flash', 'diedit!');
            redirect('admin/pasien');
        }
    }



    // halaman tambah pasien 
    public function tambah_data_pasien()
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));


        // Pembuatan NIP Otomatis
        $data['no_rekam_medis'] =$this->data_pasien->get_nip_otomatis();

        // NIK Pasien
        $this->form_validation->set_rules(
            'nik_pasien',
            'Nik_pasien',
            'required|trim|min_length[16]|max_length[16]|numeric|is_unique[pasien.nik]',
            [
                'required' => 'NIK pasien harus disii!',
                'min_length' => 'NIK pasien harus 16 digit!',
                'max_length' => 'NIK pasien harus 16 digit!',
                'is_unique' => 'NIK pasien sudah terdaftar!'
            ]
        );

        // Nama Pasien
        $this->form_validation->set_rules(
            'nama_pasien',
            'Nama_pasien',
            'required|trim',
            [
                'required' => 'Nama pasien harus disii!'
            ]
        );

        // Tanggal lahir
        $this->form_validation->set_rules(
            'tanggal_lahir_pasien',
            'Tanggal_lahir_pasien',
            'required|trim',
            [
                'required' => 'Tanggal lahir harus disii!'
            ]
        );

        // Umur Pasien
        $this->form_validation->set_rules(
            'umur_pasien',
            'Umur_pasien',
            'required|trim',
            [
                'required' => 'Umur pasien harus disii!'
            ]
        );

        // Jenis Kelamin  
        $this->form_validation->set_rules(
            'jenis_kelamin_pasien',
            'Jenis_kelamin_pasien',
            'required|trim',
            [
                'required' => 'Jenis kelamin harus dipilih!'
            ]
        );

        // Alamat Pasien
        $this->form_validation->set_rules(
            'alamat_pasien',
            'Alamat_pasien',
            'required|trim',
            [
                'required' => 'Alamat pasien harus disii!'
            ]
        );

        // Nomor Telepon
        $this->form_validation->set_rules(
            'no_tlp_pasien',
            'No_tlp_pasien',
            'required|trim',
            [
                'required' => 'Nomor telepon pasien harus disii!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['nav'] = "pasien";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pasien/tambah_data_pasien', $data);
            $this->load->view('templates/footer');
        } else {

            $this->data_pasien->insert_data_pasien();

            // flashdata
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect('admin/pasien');
        }
    }

    // hapus data pasien
    public function hapus_data_pasien($nik)
    {
        $this->data_pasien->delete_pasien($nik);

        // flashdata
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('admin/pasien');
    }



    // halaman record pasien by dokter
    public function dokter_record_pasien($id_dokter)
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "pasien";
        $data['title'] = 'Administrator';
        $data['all_pasien'] = $this->pasien->get_record_pasien_by_dokter($id_dokter)->result_array();
        $data['dokter'] = $this->user->get_all_data_dokter();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/record_pasien/index', $data);
        $this->load->view('templates/footer');
    }

    // halaman record pasien
    public function recordpasien(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "pasien";
        $data['title'] = 'Administrator';
        $data['all_pasien'] = $this->pasien->get_all_data_pasien()->result_array();
        $data['dokter'] = $this->user->get_all_data_dokter();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/record_pasien/index', $data);
        $this->load->view('templates/footer');
    }


    // ajax untuk mencari data histori pasien 
    public function get_historical_data(){
        $nip = $this->input->post('nip');
        $historical_data = $this->data_pasien->get_data_pasien_by_nip($nip);
        if ($historical_data) {
            echo json_encode(array('success' => true, 'data' => $historical_data));
        } else {
            echo json_encode(array('success' => false));
        }
    }


    // halaman tambah pasien 
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
            'nip',
            'Nip',
            'required|trim|min_length[6]|max_length[6]|numeric',
            [
                'required' => 'Nomor rekam medis pasien harus disii!',
                'min_length' => 'Nomor rekam medis pasien harus 6 digit!',
                'max_length' => 'Nomor rekam medis pasien harus 6 digit!',
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


        // Jenis Kelamin  
        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis_kelamin',
            'required|trim',
            [
                'required' => 'Jenis kelamin harus dipilih!'
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


        // Dokter
        $this->form_validation->set_rules(
            'dokter',
            'Dokter',
            'required',
            [
                'required' => 'Dokter harus disii!',
                // 'min_length' => 'NIK pasien harus 16 digit!',
                // 'max_length' => 'NIK pasien harus 16 digit!',
                // 'is_unique' => 'NIK pasien sudah terdaftar!'
            ]
        );

        if($this->form_validation->run() == false){
            // nomer riwayat pasien
            $prefix = "BPA-";
            $no_riwayat = $prefix . date('ymd') . uniqid();
            $data['no_riwayat'] = $no_riwayat;
            $data['dokter'] = $this->user->get_all_data_dokter();
            $data['nav'] = "pasien";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/record_pasien/tambah_pasien', $data);
            $this->load->view('templates/footer');
        }else{

            $this->pasien->insert_pasien();

            // flashdata
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect('admin/recordpasien');
        }
        
    }

    // halaman edit pasien
    public function edit_pasien($id){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // pasien by id
        $data['pasien'] = $this->pasien->get_data_pasien_by_id($id);
        // var_dump($data['pasien']);

        // dokter by id
        $data['dokter_id'] = $this->user->get_data_by_id($data['pasien']['id_dokter']);

        // menampilkan data kecuali id
        $data['dokter_kecuali_id'] = $this->user->get_data_kecuali_id($data['dokter_id']['id']);

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
            'nip',
            'Nip',
            'required|trim|min_length[6]|max_length[6]|numeric',
            [
                'required' => 'Nomor rekam medis pasien harus disii!',
                'min_length' => 'Nomor rekam medis pasien harus 16 digit!',
                'max_length' => 'Nomor rekam medis pasien harus 16 digit!',
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

        // Jenis Kelamin  
        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis_kelamin',
            'required|trim',
            [
                'required' => 'Jenis kelamin harus dipilih!'
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

        // Dokter
        $this->form_validation->set_rules(
            'dokter',
            'Dokter',
            'required',
            [
                'required' => 'Dokter harus disii!',
                // 'min_length' => 'NIK pasien harus 16 digit!',
                // 'max_length' => 'NIK pasien harus 16 digit!',
                // 'is_unique' => 'NIK pasien sudah terdaftar!'
            ]
        );


        if ($this->form_validation->run() == false) {
            // nomer riwayat pasien
            $prefix = "BPA-";
            $no_riwayat = $prefix . date('ymd') . uniqid();
            $data['no_riwayat'] = $no_riwayat;
            $data['dokter'] = $this->user->get_all_data_dokter();
            $data['nav'] = "pasien";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/record_pasien/edit_pasien', $data);
            $this->load->view('templates/footer');
        } else {
            
            $this->pasien->edit_pasien($id);

            // flashdata
            $this->session->set_flashdata('flash', 'diedit!');
            redirect('admin/recordpasien');
        }
    }

    // hapus record pasien
    public function hapus_pasien($id){
        $this->pasien->delete_pasien($id);
        
        // flashdata
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('admin/recordpasien');
    }

    // halaman antrian pasien
    public function antrianpasien()
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "antrian_pasien";
        $data['title'] = 'Administrator';
        $data['dokter'] = $this->user->get_all_data_dokter();
        $data['pasien_today'] = $this->pasien->get_pasien_today();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/antrian_pasien/index', $data);
        $this->load->view('templates/footer');
    }

    // halaman antrian pasien by dokter
    public function antrian_pasien_by($id_dokter)
    {
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "antrian_pasien";
        $data['title'] = 'Administrator';
        $data['pasien_today'] = $this->pasien->get_pasien_today_by_dokter($id_dokter)->result_array();
        $data['dokter'] = $this->user->get_all_data_dokter();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/antrian_pasien/index', $data);
        $this->load->view('templates/footer');
    }


    // change status pasien 
    public function change_status($id){
        $status = 3;
        $this->pasien->change_status_pasien($id, $status);

        // flashdata
        $this->session->set_flashdata('flash_status', 'diubah!');
        redirect('admin/antrianpasien');
    }

    // halaman akun dokter
    public function akun_dokter(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "akun_dokter";
        $data['title'] = 'Administrator';
        $data['all_akun_dokter'] = $this->user->get_all_data_dokter();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/akun_dokter/index', $data);
        $this->load->view('templates/footer');
    }

    // hapus akun dokter
    public function hapus_akun_dokter($id){
        $data['user'] = $this->user->get_data_by_id($id);
        $old_image = $data['user']['foto'];

        if ($old_image == 'default.png') {
            // hapus data dokter melalui model atau database
            $this->user->delete_dokter($id);
            //redirect
            redirect('admin/akun_dokter');
        }

        if ($old_image != 'default.png') {

            unlink(FCPATH . 'assets/img/dokter/profile/' . $old_image);
            // hapus data dokter melalui model atau database
            $this->user->delete_dokter($id);
            //redirect
            redirect('admin/akun_dokter');
        }
    }

    // halaman tambah akun dokter
    public function tambah_akun_dokter(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nama dokter
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama Dokter harus disii!'
            ]
        );

        // username dokter
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]',
            [
                'required' => 'Username harus disii!',
                'is_unique' => 'Username sudah terdaftar!'
            ]
        );

        // password 
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

        // konfirmasi password
        $this->form_validation->set_rules(
            'passwordconfirm',
            'PasswordConfirm',
            'required|trim|min_length[8]|matches[passwordnew]',
            [
                'required' => 'Konfirmasi password tidak boleh kosong!',
                'matches' => "Password tidak sama!",
            ]
        );

        if($this->form_validation->run()== false){
            $data['nav'] = "akun_dokter";
            $data['title'] = 'Administrator';
            $data['all_akun_dokter'] = $this->user->get_all_data_dokter();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/akun_dokter/tambah_akun_dokter', $data);
            $this->load->view('templates/footer');
        }else{
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

            // insert data  akun dokter ke database
            $this->user->insert_dokter($new_image);

            // flashdata
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect('admin/akun_dokter');

        }

    }

    // halaman edit akun dokter
    public function edit_akun_dokter($id){

        // data session 
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        $data['user_dokter'] = $this->user->get_data_by_id($id);
    
        // nama dokter
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama Dokter harus disii!'
            ]
        );

        // username dokter
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            [
                'required' => 'Username harus disii!'
            ]
        );

        // password 
        // $this->form_validation->set_rules(
        //     'passwordnew',
        //     'PasswordNew',
        //     'required|trim|min_length[8]',
        //     [
        //         'min_length' => "Password terlalu pendek!",
        //         'required' => 'Password baru tidak boleh kosong!'
        //     ]
        // );

        if ($this->form_validation->run() == false) {
            $data['nav'] = "akun_dokter";
            $data['title'] = 'Administrator';
            $data['all_akun_dokter'] = $this->user->get_all_data_dokter();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/akun_dokter/edit_akun_dokter', $data);
            $this->load->view('templates/footer');
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


            // jika admin tidak memasukan password maka gunakan password lama
            if($this->input->post('passwordnew') == null){
                $password = $data['user_dokter']['password'];
            }else{
                $password = password_hash($this->input->post('passwordnew'), PASSWORD_DEFAULT);
            }

            // edit data  akun dokter ke database
            $this->user->edit_dokter($id, $new_image, $password);

            // flashdata
            $this->session->set_flashdata('flash', 'diedit!');
            redirect('admin/akun_dokter');
        }
    }

    // halaman Tindakan
    public function tindakan(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "tindakan";
        $data['title'] = 'Administrator';
        $data['all_tindakan'] = $this->tindakan->get_all_data_tindakan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tindakan/index', $data);
        $this->load->view('templates/footer');
    }

    // halaman tambah tindakan
    public function tambah_tindakan(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nama_tindakan
        $this->form_validation->set_rules(
            'tindakan',
            'Tindakan',
            'required|trim',
            [
                'required' => 'Nama tindakan harus disii!'
            ]
        );

        // Biaya tindakan
        $this->form_validation->set_rules(
            'biaya',
            'Biaya',
            'required|trim',
            [
                'required' => 'Biaya tindakan harus disii!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['nav'] = "tindakan";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tindakan/tambah_tindakan', $data);
            $this->load->view('templates/footer');
        } else {

            // jika berhasil maka akan diinput ke database
            // insert data ke database
            $this->tindakan->insert_tindakan();

            // set flashdata
            $this->session->set_flashdata('flash', 'ditambahkan!');

            // redirect ke halaman tindakan
            redirect('admin/tindakan');
        }   
    }

    // halaman edit tindakan 
    public function edit_tindakan($id){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nama_tindakan
        $this->form_validation->set_rules(
            'tindakan',
            'Tindakan',
            'required|trim',
            [
                'required' => 'Nama tindakan harus disii!'
            ]
        );

        // Biaya tindakan
        $this->form_validation->set_rules(
            'biaya',
            'Biaya',
            'required|trim',
            [
                'required' => 'Biaya tindakan harus disii!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['tindakan'] = $this->tindakan->get_data_tindakan_by_id($id);
            $data['nav'] = "tindakan";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tindakan/edit_tindakan', $data);
            $this->load->view('templates/footer');
        } else {

            // jika berhasil maka akan diinput ke database
            // insert data ke database
            $this->tindakan->edit_tindakan($id);

            // set flashdata
            $this->session->set_flashdata('flash', 'diedit!');

            // redirect ke halaman tindakan
            redirect('admin/tindakan');
        }   
    }

    // fungsi hapus tindakan
    public function hapus_tindakan($id){
        $this->tindakan->delete_tindakan($id);

        // set flashdata
        $this->session->set_flashdata('flash', 'dihapus!');

        // redirect ke halaman jenis obat
        redirect('admin/tindakan');
    }

    // halaman jenis obat
    public function jenisobat(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "jenis_obat";
        $data['title'] = 'Administrator';
        $data['all_obat'] = $this->jenis_obat->get_all_data_obat();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jenis_obat/index', $data);
        $this->load->view('templates/footer');
    }

    // halaman tambah obat
    public function tambah_obat(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nama_obat
        $this->form_validation->set_rules(
            'nama_obat',
            'Nama_obat',
            'required|trim',
            [
                'required' => 'Nama obat harus disii!'
            ]
        );

        // harga_obat
        $this->form_validation->set_rules(
            'harga_obat',
            'Harga_obat',
            'required|trim',
            [
                'required' => 'Harga obat harus disii!'
            ]
        );

        if($this->form_validation->run() == false){
            $data['nav'] = "jenis_obat";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/jenis_obat/tambah_obat', $data);
            $this->load->view('templates/footer');
        }else{

            // jika berhasil maka akan diinput ke database
            // insert data ke database
            $this->jenis_obat->insert_obat();

            // set flashdata
            $this->session->set_flashdata('flash', 'ditambahkan!');

            // redirect ke halaman jenis obat
            redirect('admin/jenisobat');

        }   
    }


    // halaman edit obat
    public function edit_obat($id){

        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nama_obat
        $this->form_validation->set_rules(
            'nama_obat',
            'Nama_obat',
            'required|trim',
            [
                'required' => 'Nama obat harus disii!'
            ]
        );

        // harga_obat
        $this->form_validation->set_rules(
            'harga_obat',
            'Harga_obat',
            'required|trim',
            [
                'required' => 'Harga obat harus disii!'
            ]
        );

        if($this->form_validation->run() == false){
            $data['obat'] = $this->jenis_obat->get_data_obat_by_id($id);
            $data['nav'] = "jenis_obat";
            $data['title'] = 'Administrator';
            $data['all_obat'] = $this->jenis_obat->get_all_data_obat();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/jenis_obat/edit_obat', $data);
            $this->load->view('templates/footer');
        }else{

            // jika berhasil maka akan diinput ke database
            // insert data ke database
            $this->jenis_obat->edit_obat($id);

            // set flashdata
            $this->session->set_flashdata('flash', 'diubah!');

            // redirect ke halaman jenis obat
            redirect('admin/jenisobat');
        }
    }

    // fungsi hapus obat
    public function hapus_obat($id){
        $this->jenis_obat->delete_obat($id);

        // set flashdata
        $this->session->set_flashdata('flash', 'dihapus!');

        // redirect ke halaman jenis obat
        redirect('admin/jenisobat');
    }

    // halaman pajak
    public function pajak(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "pajak";
        $data['title'] = 'Administrator';
        $data['all_pajak'] = $this->pajak->get_all_data_pajak();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pajak/index', $data);
        $this->load->view('templates/footer');
    }

    // halaman tambah pajak
    public function tambah_pajak(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nominal_pajak
        $this->form_validation->set_rules(
            'pajak',
            'Pajak',
            'required|trim',
            [
                'required' => 'Nominal pajak harus disii!'
            ]
        );

        // keterangan
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required|trim',
            [
                'required' => 'keterangan harus disii!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['nav'] = "pajak";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pajak/tambah_pajak', $data);
            $this->load->view('templates/footer');
        } else {

            // jika berhasil maka akan diinput ke database
            // insert data ke database
            $this->pajak->insert_pajak();

            // set flashdata
            $this->session->set_flashdata('flash', 'ditambahkan!');

            // redirect ke halaman pajak
            redirect('admin/pajak');
        }  
    }

    // halaman edit pajak
    public function edit_pajak($id){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));

        // nominal_pajak
        $this->form_validation->set_rules(
            'pajak',
            'Pajak',
            'required|trim',
            [
                'required' => 'Nominal pajak harus disii!'
            ]
        );

        // keterangan
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required|trim',
            [
                'required' => 'keterangan harus disii!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['pajak'] = $this->pajak->get_data_pajak_by_id($id);
            $data['nav'] = "pajak";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pajak/edit_pajak', $data);
            $this->load->view('templates/footer');
        } else {

            // jika berhasil maka akan diinput ke database
            // insert data ke database
            $this->pajak->edit_pajak($id);

            // set flashdata
            $this->session->set_flashdata('flash', 'diubah!');

            // redirect ke halaman pajak
            redirect('admin/pajak');
        }
    }

    // fungsi hapus pajak
    public function hapus_pajak($id){
        $this->pajak->delete_pajak($id);

        // set flashdata
        $this->session->set_flashdata('flash', 'dihapus!');

        // redirect ke halaman pajak
        redirect('admin/pajak');
    }

    // halaman tentang
    public function tentang(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "tentang";
        $data['title'] = 'Administrator';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tentang', $data);
        $this->load->view('templates/footer');
    }

    // halaman my profile
    public function myprofile(){
        $data['user'] = $this->user->get_data_by_username($this->session->userdata('username'));
        $data['nav'] = "pengaturan";
        $data['title'] = 'Administrator';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengaturan/myprofile', $data);
        $this->load->view('templates/footer');
    }

    // halaman edit profile
    public function editprofile(){
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

        if($this->form_validation->run() == false){
            $data['nav'] = "pengaturan";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pengaturan/editprofile', $data);
            $this->load->view('templates/footer');
        }else{
            // upload gambar
            // cel jika ada gambar di upload atau tidak dari variable $_FILES
            $upload_image = $_FILES['gambar']['name'];
            
            if ($upload_image) {
                // file format yang boleh diupload
                $config['allowed_types'] = 'gif|jpg|png|jpeg|heic';

                // ukuran file yang boleh diupload lebh dari 5mb
                $config['max_size'] = '5120';

                // lokasi penyimpanan file
                $config['upload_path'] = './assets/img/admin/profile/';

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
                        unlink(FCPATH . 'assets/img/admin/profile/' . $old_image);
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
            redirect('admin/myprofile');
        }
    
    }

    // halaman ganti kata sandi
    public function gantikatasandi(){
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

        if($this->form_validation->run() == false){
            $data['nav'] = "pengaturan";
            $data['title'] = 'Administrator';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pengaturan/gantikatasandi', $data);
            $this->load->view('templates/footer');
        }else{
            // cek input password lama dan password baru
            $currentpassword =  $this->input->post('passwordcurrent');
            $newpassword = $this->input->post('passwordnew');

            // perkondisian pasword lama dan password baru
            // password diterjemahkan dengan password_verify
            if (!password_verify($currentpassword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
                redirect('admin/gantikatasandi');
            } else {
                // jika password lama dan password baru sama 
                if ($currentpassword == $newpassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('admin/gantikatasandi');
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
                    redirect('admin/gantikatasandi');
                }
            }
        }
    }
}

?>