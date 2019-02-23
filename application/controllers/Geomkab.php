<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geomkab extends CI_Controller {

    public function index()
    {
        echo "test";
    }

	public function geomKabupaten()
	{
        $sql = "SELECT kabupaten_,ST_AsGeoJSON(geom) as geom FROM indonesia_kab WHERE provinsi='Bali'";
        $result = pg_query($sql);
$hasil = array(
	'type'	=> 'FeatureCollection',
	'features' => array()
	);
while ($isinya = pg_fetch_assoc($result)) {
	$features = array(
		'type' => 'Feature',
		'geometry' => json_decode($isinya['geom']),
		'properties' => array(
			'kabupaten' => $isinya['kabupaten_']
			)
		);
	array_push($hasil['features'], $features);
}
echo json_encode($hasil);

	}
	

	public function umkmgeom($id)
	{
		echo "Test";
	}
}
