<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

      public function getKabupaten()
      {
          $kabupaten=$this->db->query("SELECT DISTINCT(provinsi) FROM public.indonesia_kab");
          $result_query=$kabupaten->result_array();
          return $result_query;
      }

      public function getGeomKabupaten($provinsi)
      {
        $kabupaten=$this->db->query("SELECT kabupaten_,ST_AsGeoJSON(geom) as geom FROM indonesia_kab WHERE provinsi='$provinsi';");
        $result_query=$kabupaten->result_array();
         //add the header here
        
        return json_encode($result_query);
     
      }

      public function getGeomUmkm($id)
      {
        $geomumkm=$this->db->query("SELECT * FROM umkm INNER JOIN siup_umkm ON umkm.nomor_siup=siup_umkm.nomor_siup WHERE id_jenis=$id");
        $result_query=$geomumkm->result_array();
        return $result_query;
      }

      public function getUserList()
      {
        $geomumkm=$this->db->query("SELECT * FROM public.user_umkm");
        $result_query=$geomumkm->result_array();
        return $result_query;
      }

      public function jenisSiup()
      {
        $jenis=$this->db->query("SELECT * FROM public.jenis_up");
        $result=$jenis->result_array();
        return $result;
      }

      public function getGeomKecamatan()
      {
        $sql = "SELECT gid, id, id_kec, kecamatan, xcoord, ycoord, kode_prop, kode_kab, ST_asGeoJSON(geom) as geom
        FROM public.indonesia_kec WHERE kode_kab='1371';";
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
                    'kecamatan' => $isinya['kecamatan'],
                ),
            );
            array_push($hasil['features'], $features);
        }
        return json_encode($hasil);

      }

      public function getKecamatan()
      {
        $kecamatan=$this->db->query("SELECT id,kecamatan FROM public.indonesia_kec WHERE kode_kab='1371'");
        $result_query=$kecamatan->result_array();
        return $result_query;
      }

      public function geomPerKecamatan($id)
      {
        $sql = "SELECT gid, id, id_kec, kecamatan, xcoord, ycoord, kode_prop, kode_kab, ST_asGeoJSON(geom) as geom
        FROM public.indonesia_kec WHERE id='$id';";
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
                    'kecamatan' => $isinya['kecamatan'],
                ),
            );
            array_push($hasil['features'], $features);
        }
        return json_encode($hasil);
      }
}


