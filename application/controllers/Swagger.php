<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';

class Swagger extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        
        // Handle OPTIONS method
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit(0);
        }
	}

    public function index() {

        $this->load->view('swagger/index');
    }
    
    public function json() {
		// error_reporting(-1);
		//  ini_set('display_errors', 1);
        // Caminho para os seus controladores e modelos
        $paths = [
            APPPATH . 'controllers/api/Users_controller.php',
			APPPATH . 'controllers/api/Profiles_controller.php',
            // APPPATH . 'models'
        ];
        
        try {
			// Caminho para os seus controladores e modelos
			$paths = [
				APPPATH . 'controllers/api/Users_controller.php',
				APPPATH . 'controllers/api/Profiles_controller.php',
			];
			
			// Gere o JSON do Swagger
			$openapi = \OpenApi\Generator::scan($paths,
			);
			$json = $openapi->toJson();
			
			// Verifique se o JSON é válido
			$test = json_decode($json);
			if (json_last_error() !== JSON_ERROR_NONE) {
				// Se o JSON for inválido, retorne um JSON básico
				$json = json_encode([
					'openapi' => '3.0.0',
					'info' => [
						'title' => 'API Documentation',
						'version' => '1.0.0'
					],
					'paths' => []
				]);
			}
			
			header('Content-Type: application/json');
			echo $json;
		} catch (Exception $e) {
			header('Content-Type: application/json');
			echo json_encode([
				'openapi' => '3.0.0',
				'info' => [
					'title' => 'API Documentation',
					'version' => '1.0.0'
				],
				'paths' => [],
				'error' => $e->getMessage()
			]);
		}
    }
}
