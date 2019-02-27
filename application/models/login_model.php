<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set("memory_limit", "512M");
class Login_model extends CI_Model
{

    public function login($username, $passwordx)
    {
        $data = $this->db->query("SELECT * FROM public.user_umkm WHERE username='$username' AND password='$passwordx'");
        $query_result = $data->result_array();
        return $query_result;
    }

    public function geomKabupaten()
    {

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

    public function jenis_umkm()
    {
        $data = $this->db->query("SELECT * FROM public.jenis_umkm");
        $query_result = $data->result_array();
        return $query_result;
    }

    public function maxid()
    {
        $data = $this->db->query("SELECT MAX(id_umkm) as max FROM umkm");
        $query_result = $data->result_array();
        return $query_result;
    }

    public function getjenisumkm()
    {
        $data = $this->db->query("SELECT * FROM jenis_umkm");
        $query_result = $data->result_array();
        return $query_result;
    }


}
