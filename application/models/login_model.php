<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set("memory_limit", "512M");
class Login_model extends CI_Model
{

    public function login($username, $passwordx)
    {
        $data = $this->db->query("SELECT * FROM public.user WHERE username='$username' AND password='$passwordx'");
        $query_result = $data->result_array();
        return $query_result;
    }

    public function geomKabupaten()
    {
        //     $provinsi='Bali';
        // $data=$this->dashboard_model->getGeomKabupaten($provinsi);
        // $ubah=json_decode($data);

        // $string=$ubah[0]->geom;
        // $string=substr($string, 78);
        // $string=substr($string, 0, -7);
        // $string=str_replace(',0','',$string);
        // $string=str_replace('[','new google.maps.LatLng(',$string);
        // $string=str_replace(']',')',$string);
        // var_dump ($ubah[0]->geom);
        // $test=$ubah[0]->geom;
        // $test=substr($test, 40);
        // $test=substr($test, 0, -4);
        // $test=str_replace(',0','',$test);
        // $test=str_replace('],[','...',$test);
        // $test=str_replace('...',']/[',$test);
        // $test=str_replace('[','new google.maps.LatLng(',$test);
        // $test=str_replace(']',')',$test);
        // $test=str_replace('new google.maps.LatLng(','lat: ',$test);
        // $test=str_replace(',',', lng:',$test);
        // $test=str_replace(')','',$test);
        // $test=explode('/',$test);
        // $hasil=json_encode($test);
        // $hasil1=str_replace('",',"},",$hasil);
        // $hasil1=str_replace('"]',"}",$hasil1);
        // $hasil1=str_replace('"',"{",$hasil1);
        // $hasil1=str_replace('[',"",$hasil1);
        // print_r($test) ;
        // return $hasil1;

        // $provinsi='Bali';
        // $data=$this->dashboard_model->getGeomKabupaten($provinsi);
        // $ubah=json_encode($data);

        // $string=$ubah[0]->geom;
        // $string=substr($string, 40);
        // $string=substr($string, 0, -4);
        // $string=str_replace(',0','',$string);
        // $string=str_replace('],[',']/[',$string);
        // $string=str_replace('[','',$string);
        // $string=str_replace(']','',$string);
        // $string=explode('/',$string);
        // $string=str_replace('/',',',$string);
        // var_dump ($ubah[0]->geom);
        // print_r($test) ;
        // return $ubah;

        // Gua Nyerah make yg dari CI nya... jadi custom sendiri
        $sql = "SELECT kabupaten_,ST_AsGeoJSON(geom) as geom FROM indonesia_kab WHERE provinsi='Sumatera Barat'";
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
                    'kabupaten' => $isinya['kabupaten_'],
                ),
            );
            array_push($hasil['features'], $features);
        }
        return json_encode($hasil);

    }

    public function getPadang()
    {
        $sql = "SELECT kabupaten_,ST_AsGeoJSON(geom) as geom FROM indonesia_kab WHERE kabupaten_='Kota PADANG'";

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
                    'kabupaten' => $isinya['kabupaten_'],
                ),
            );
            array_push($hasil['features'], $features);
        }
        return json_encode($hasil);

    }

}
