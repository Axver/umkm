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

        if($jumlah==1)
        {
                $session_data=array(
                 'username'=>$data[0]['username'],
                 'id'=>$data[0]['id']
                );
                $this->session->set_userdata('logged_in', $session_data);

        }
        $kabupaten=$this->dashboard_model->getKabupaten();
        // var_dump($kabupaten);
        $geom=$this->login_model->geomKabupaten();
        $padang=$this->login_model->getPadang();
        
        $view_array=array(
                'left_nav'=>$this->load->view('left_nav',array('kabupaten'=>$kabupaten),true),
                'map'=>$this->load->view('maps',array('geom'=>$geom,'padang'=>$padang),true)
                
        );
        $this->load->view('dashboard',$view_array);
         

        
        
        }
        
        function logout() {	
        $this->session->sess_destroy();
        $data['logout'] = 'You have been logged out.';		
        $this->load->view('login', $data);
        }

        

}


