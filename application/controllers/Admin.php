<?php


class Admin extends CI_Controller{
    public function index()
    {
        $kabupaten=$this->dashboard_model->getKabupaten();
        // var_dump($kabupaten);
        // $geom=$this->login_model->geomKabupaten();
        $padang=$this->login_model->getPadang();
        $jenisumkm=$this->login_model->jenis_umkm();
        $listuser=$this->dashboard_model->getUserList();
        $jenis_siup=$this->dashboard_model->jenisSiup();
        
        
        
        $view_array=array(
                'left_nav'=>$this->load->view('left_nav',array('jenis_umkm'=>$jenisumkm),true),
                'map'=>$this->load->view('maps',array('padang'=>$padang),true),
                'modal_umkm'=>$this->load->view('modal_umkm',array('jenis_siup'=>$jenis_siup),true),
                'modal_insert'=>$this->load->view('modal_insert',array('jenis_umkm'=>$jenisumkm),true),
                'modal_list_user'=>$this->load->view('modal_list_user',array('listuser'=>$listuser),true),
                'modal_maps'=>$this->load->view('modal_maps',array(),true)         
                
        );
        $this->load->view('admin/index',$view_array);
    }
}