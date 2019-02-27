<?php


class Insertumkm extends CI_Controller
{

   public function inputumkm()
   {

    $session_id = $this->session->logged_in['id'];
    // echo $session_id;
    // $logged_in['role'];
    $max=$this->login_model->maxid();
    // echo $max[0]['max'];
    $max=$max[0]['max'];
    $id=$max+1;
    $form_data = $this->input->post();
     $id_jenis=$form_data['jenis_umkm'];
     $nama_umkm=$form_data['nama_umkm'];
     $no_siup=$form_data['no_siup'];
    //  $nama_pemilik=$form_data['nama_pemilik'];
     $latitude=$form_data['lat'];
     $longitude=$form_data['lon'];
     
     $data = $this->db->query("INSERT INTO public.umkm(
        id_umkm, nomor_siup, id_user, id_jenis, latutude, longitude)
        VALUES ($id, '$no_siup', $session_id, $id_jenis, '$latitude', '$longitude')");
    //  Cek Id Terakhir

    
    redirect('http://localhost/project1/','refresh');
    
     
    
    // echo json_encode($result);
   }

}