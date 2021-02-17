<?php
class Login extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Model_admin');
        $this->load->model('Model_login');
    }
    function index(){
        $data['data'] = $this->Model_admin->getAll();
        $this->load->view('view_login.php',$data);
    }
    function cek(){
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);
        $akses = $this->input->post('akses',true); 

        if ($akses == 'admin'){
            $cek_login = $this->Model_login->cek_admin($username, md5($password));
            if($cek_login){
                $data=array(
                    'username' => $username, 
                    'akses' => 'admin',
                    'logged_in' => true
                );
                $this->session->set_userdata($data);

                redirect ('siswa');
                // echo "berhasil";
            } else {
                $this->session->set_flashdata('DANGER','username dan password yang anda masukan salah');
                redirect('login','refresh');
                // echo "gagal";
            }
        }else{
            //echo "ini siswa"
            $cek_siswa = $this->Model_login->cek_siswa($username, md5($password));
            if($cek_siswa){
                //echo "selamat datang siswa "
                $data = array(
                    'nis' => $username,
                    'akses' => 'siswa',
                    'logged_in' => true);
                $this->session->set_userdata($data);

                redirect('rapot');
                #code...
            }else{
                //echo "data siswa tida ada"
                $this->session->set_flashdata('DANGER',"Data Siswa Tidak Ada");
                redirect('login','refresh');
            }
        }

    }
    function logout(){
        //hapus session
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        $this->session->set_flashdata('DANGER',"Berhasil logout");
        redirect('login','refresh');
    }
}