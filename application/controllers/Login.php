<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

   
        function index() {
               
        $this->load->view('login');
        }

        
        function proseslogin() {
        $username = $this->input->post('username'); 
        $password = $this->input->post('password'); 
        $passwordx=md5($password);
        $data_array=array(
          'username'=>$username,
          'password'=>$passwordx      
        );
        $data=$this->login_model->login($username,$passwordx);

        // var_dump($data);
        // echo count($data);
        $jumlah=count($data);

        if($jumlah==1 AND $data[0]['role']=='admin')
        {
                $session_data=array(
                 'username'=>$data[0]['username'],
                 'id'=>$data[0]['id_user'],
                 'role'=>$data[0]['role']
                );
                $this->session->set_userdata('logged_in', $session_data);

        }
        redirect('admin');
         

        
        
        }
        
        function logout() {	
        $this->session->sess_destroy();
        $data['logout'] = 'You have been logged out.';		
        $this->load->view('login', $data);
        }

        

}


