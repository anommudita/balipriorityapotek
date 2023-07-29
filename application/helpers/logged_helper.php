<?php 

    function is_logged_in(){
        
        // instasisasi class CI
        // untuk memanggil Controlller CI karena ini adalah helper yang kit buat sendiri maka dariitu harus instasiasi
        $ci = get_instance();

        // memanggil data dari session dan jika tidak ada data yang di session maka akan di redirect ke halaman auth
        if(!$ci->session->userdata('username') && !$ci->session->userdata('role_id')){
            redirect('auth');
        }else{
            // mengambil data role id dari session 
            // result antara 1 atau 2
            $role = $ci->session->userdata('role_id'); 
            // mengambil controller melalui URI
            // result antara admin dan dokter
            $controller = $ci->uri->segment('1');

            $query = $ci->db->get_where('user_role', ['role' => $controller], )->row_array();

            // jika ada query(role admin atau guru) maka akan di cek role id nya
            if ($query) {
                $role_id_query = $query['id'];

                // perkondisian and harus keduanya bernilai true agar bisa di akses
                // role id sudah 1 dan selain role id 1 maka akan di redirect ke halaman blocked
                if ($role_id_query == 1 && $role != 1) {
                    redirect('auth/block');
                }

                if ($role_id_query == 2 && $role != 2) {
                    redirect('auth/block');
                }

            }else{
                // jika tidak ada query maka akan di redirect ke halaman blocked
                redirect('auth/block');
            }
            
        }
    }
