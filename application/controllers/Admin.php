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
        $kecamatan=$this->dashboard_model->getGeomKecamatan();
    
        
        
        
        $view_array=array(
                'left_nav'=>$this->load->view('left_nav',array('jenis_umkm'=>$jenisumkm),true),
                'map'=>$this->load->view('maps',array('padang'=>$padang,'kecamatan'=>$kecamatan),true),
                'modal_umkm'=>$this->load->view('modal_umkm',array('jenis_siup'=>$jenis_siup),true),
                'modal_insert'=>$this->load->view('modal_insert',array('jenis_umkm'=>$jenisumkm),true),
                'modal_list_user'=>$this->load->view('modal_list_user',array('listuser'=>$listuser),true),
                'modal_maps'=>$this->load->view('modal_maps',array(),true,),         
                'nama_kecamatan'=>$this->dashboard_model->getKecamatan()
        );
        $this->load->view('admin/index',$view_array);
    }


    public function getPoliGeom()
    {
        $sql = "SELECT id_umkm_geom, id_umkm, ST_AsGeoJSON(geom) as geom
        FROM public.umkm_geom;";
        $result = pg_query($sql);
        $hasil = array(
            'type' => 'FeatureCollection',
            'features' => array(),
        );
        while ($isinya = pg_fetch_assoc($result)) {
            $features = array(
                'type' => 'Feature',
                'geometry' => json_decode($isinya['geom']),
                'properties' => array(
                    'id_umkm' => $isinya['id_umkm'],
                    'id_umkm_geom' => $isinya['id_umkm_geom']
                ),
            );
            array_push($hasil['features'], $features);
        }
        echo json_encode($hasil);

    }

    public function geomPerKec($id)
    {
      $data=$this->dashboard_model->geomPerKecamatan($id);
      echo $data;
    }

    public function umkmKec($id)
    {
      $umkmkec=$this->dashboard_model->umkm_kecamatan($id);
      echo $umkmkec;
    }
}