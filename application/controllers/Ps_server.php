<?php if(! defined("BASEPATH")) exit("Akses langsung tidak diperkenankan");

class Ps_server extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library("Nusoap_library");
		$this->nusoap_server = new soap_server();
		$this->nusoap_server->configureWSDL('nusoap_server','urn:nusoap_server');
	}

	public function index(){
		$this->nusoap_server->register('hello',                // method name
		array('name' => 'xsd:string'),        // input parameters
		array('return' => 'xsd:string'),    // output parameters
		'urn:nusoap_server',                    // namespace
		'urn:nusoap_server#hello',                // soapaction
		'rpc',                                // style
		'encoded',                            // use
		'Says hello to the caller'            // documentation
	);

	function hello($name) {   //fungsi yg d jalankan ktika webservice d panggil
		return 'Hellooo, ' . $name;
	}

	// Use the request to (try to) invoke the service
		$GLOBALS['HTTP_RAW_POST_DATA'] = file_get_contents ('php://input');
		$HTTP_RAW_POST_DATA = $GLOBALS['HTTP_RAW_POST_DATA'];
		//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : ”;
		$this->nusoap_server->service($HTTP_RAW_POST_DATA);
	}
}



?>