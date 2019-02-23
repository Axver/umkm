<?php


class Insertumkm extends CI_Controller
{

   public function inputumkm()
   {
    $max=$this->login_model->maxid();
    // echo $max[0]['max'];
    $max=$max[0]['max'];
    $id=$max+1;
    $form_data = $this->input->post();
     $id_jenis=$form_data['jenis_umkm'];
     $nama_umkm=$form_data['nama_umkm'];
     $nama_pemilik=$form_data['nama_pemilik'];
     $latitude=$form_data['lat'];
     $longitude=$form_data['lon'];
     
     $data = $this->db->query("INSERT INTO public.umkm(
        id_umkm, id_jenis, nama_umkm, latutude, longitude, nama_pemilik)
        VALUES ($id, $id_jenis, '$nama_umkm', '$latitude', '$longitude', '$nama_pemilik')");
    //  Cek Id Terakhir
     
    
    // echo json_encode($result);
   }

}