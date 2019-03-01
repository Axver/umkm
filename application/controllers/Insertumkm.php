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


   public function inputsiup()
   {
    $form_data = $this->input->post();
    // var_dump($form_data);
    $no_siup=$form_data['nomor_siup'];
    $nama_perusahaan=$form_data['nama_perusahaan'];
    $alamat_perusahaan=$form_data['alamat_perusahaan'];
    $jenis_siup=$form_data['jenis_siup'];
    $fax=$form_data['fax'];
    $no_telepon=$form_data['no_telepon'];
    $nama_pemilik=$form_data['nama_pemilik'];
    $alamat_pemilik=$form_data['alamat_pemilik'];
    $npwp=$form_data['npwp'];
    $modal_kekayaan=$form_data['modal_kekayaan'];
    $kegiatan_usaha=$form_data['kegiatan_usaha'];
    $kelembagaan=$form_data['kelembagaan'];
    $bidang_usaha=$form_data['bidang_usaha'];
    $dagangan=$form_data['dagangan'];

    $data = $this->db->query("INSERT INTO public.siup_umkm(
        nomor_siup, id_jenis_up, nama_perusahaan, alamat_perusahaan, fax, no_telepon, nama_pemilik, alamat_pemilik, npwp, modal_kekayaan, kegiatan_usaha, kelembagaan, bidang_usaha, barang_jasa_dagangan)
        VALUES ('$no_siup', $jenis_siup, '$nama_perusahaan', '$alamat_perusahaan', '$fax', '$no_telepon', '$nama_pemilik', '$alamat_pemilik', '$npwp', $modal_kekayaan, '$kegiatan_usaha', '$kelembagaan', '$bidang_usaha', '$dagangan')");

redirect('http://localhost/project1/','refresh');
   }

   public function inputpoli()
   {
    $id_umkm = $this->input->post('id_umkm');
    $poli = $this->input->post('poli');
    // echo $id_umkm;
    // echo $poli;
    $panjang=$this->db->query("SELECT MAX(id_umkm_geom) as MAX FROM umkm_geom");
    $result=$panjang->result_array();
    $id_umkm_geom=$result[0]['max']+1;
    // echo $id_umkm_geom;

    $data=$this->db->query("INSERT INTO public.umkm_geom(
        id_umkm_geom, id_umkm, geom)
        VALUES ($id_umkm_geom, $id_umkm, ST_GeomFromText('POLYGON(($poli))'))");
        redirect('http://localhost/project1/','refresh');
   }

}