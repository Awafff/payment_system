<?php if(! defined("BASEPATH")) exit("Akses langsung tidak diperkenankan");

class Soap extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library("Nusoap_library");
		

		$this->nusoap_server = new soap_server();
		$this->nusoap_server->configureWSDL('nusoap_server','urn:nusoap_server');
		$this->nusoap_server->soap_defencoding = 'utf-8';
		$this->nusoap_server->encode_utf8 = false;
		$this->nusoap_server->decode_utf8 = false;

		$this->nusoap_server->wsdl->addComplexType("productData","complexType","struct","all","",
			array(
				"id_product"=>array("name"=>"id_product","type"=>"xsd:string"),
				"name_product"=>array("name"=>"name_product","type"=>"xsd:string"),
				"describe_product"=>array("name"=>"describe_product","type"=>"xsd:string"),
				"price_product"=>array("name"=>"price_product","type"=>"xsd:int"),
				"amount_product"=>array("name"=>"amount_product","type"=>"xsd:int")
			)
		);
		$this->nusoap_server->wsdl->addComplexType("productArray","complexType","array","","SOAP-ENC:Array",
			array(),
			array(
				array(
					"ref"=>"SOAP-ENC:arrayType",
					"wsdl:arrayType"=>"tns:productData[]"
				)
			),
			"productData"
		);

	}

	public function index(){
		$this->nusoap_server->register('hello',   // method name
			array('name' => 'xsd:string'),        // input parameters
			array('return' => 'xsd:string'),      // output parameters
			'urn:nusoap_server',                  // namespace
			'urn:nusoap_server#hello',            // soapaction
			'rpc',                                // style
			'encoded',                            // use
			'Says hello to the caller'            // documentation
		);

		function hello($name) {   //fungsi yg d jalankan ktika webservice d panggil
			return 'Hellooo, ' . $name;
		}

		$GLOBALS['HTTP_RAW_POST_DATA'] = file_get_contents ('php://input');
		$HTTP_RAW_POST_DATA = $GLOBALS['HTTP_RAW_POST_DATA'];
		//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : ”;
		$this->nusoap_server->service($HTTP_RAW_POST_DATA);
	}

	function getProduct(){
		$input_readall = array(); // parameter ambil data kategori
		$return_readall = array("return" => "tns:productArray");

		$this->nusoap_server->register('readall',   // method name
			$input_readall,        					// input parameters
			$return_readall,      					// output parameters
			'urn:nusoap_server',                  	// namespace
			'urn:nusoap_server/readall',            // soapaction
			'rpc',                                	// style
			'encoded',                            	// use
			'Get Product All'            			// documentation
		);


		
		// $server->register('readall',
		// 	$input_readall,
		// 	$return_readall,
		// 	$ns,
		// 	"urn:".$ns."/readall",
		// 	"rpc",
		// 	"encoded",
		// 	"Get Product All");

			function readall(){
				$CI =& get_instance();
				$CI->load->model('Product_model');
				// require_once 'classDb/Classkategori.php';
				$dataProduct = $CI->Product_model->getProduct();
				// echo json_encode($dataProduct);
				$daftar = array();
				// echo json_encode($dataProduct->row_array());
				foreach ($dataProduct->result_array() as $product){
					$idProduct = $product['id_product']; 
					// $nameProduct = $product['name_product'];
					// $describeProduct = $product['describe_product'];
					// $priceProduct = $product['price_product'];
					// $amountProduct = $product['amount_product'];
					
					// echo $idProduct;
					// echo " | ". $nameProduct;

					array_push($daftar, array(
							'id_product'=>$product['id_product'],
							'name_product'=>$product['name_product'],
							'describe_product'=>$product['describe_product'],
							'price_product'=>$product['price_product'],
							'amount_product'=>$product['amount_product']
						)
					);
				}

				// while ($item = $hasil->fetch_assoc()) {
				// }

				// echo json_encode($daftar);
				return $daftar;
			}

		// $GLOBALS['HTTP_RAW_POST_DATA'] = file_get_contents ('php://input');
		// $HTTP_RAW_POST_DATA = $GLOBALS['HTTP_RAW_POST_DATA'];
		// $this->nusoap_server->service($HTTP_RAW_POST_DATA);
		$this->nusoap_server->service(file_get_contents ('php://input'));
	}





}



?>