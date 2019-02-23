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
}


