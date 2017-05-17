<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
	parent::__construct();
	$this->load->library('googlemaps');

	}
	public function index()
	{
		$config = array();
$config['center'] = 'auto';
$config['onboundschanged'] = 'if (!centreGot) {
	var mapCentre = map.getCenter();
	marker_0.setOptions({
		position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
	});
}
centreGot = true;';
$this->googlemaps->initialize($config);

// set up the marker ready for positioning
// once we know the users location
$marker = array();
$this->googlemaps->add_marker($marker);
$data['map'] = $this->googlemaps->create_map();


		$this->load->view('index',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
