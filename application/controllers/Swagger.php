<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';
/**
 * Swagger Controller
 *
 * This controller handles the generation of Swagger documentation for the API.
 *
 * @package     CodeIgniter
 * @category    Controller
 * @author      Gilcierweb
 * @link        https://swagger.io/
 */
class Swagger extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		// $this->output->set_content_type('application/json');
	}
	// Gera o JSON OpenAPI
	public function json()
	{
		try {
			$openapi = \OpenApi\Generator::scan([APPPATH . 'controllers/api/Users_controller.php', APPPATH . 'controllers/api/Profiles_controller.php']); // Escaneia a pasta de controllers
			// var_dump(APPPATH . 'controllers/api/' );die('sddsdsd');
			header('Content-Type: application/json');
			$this->output->set_output($openapi->toJson());
		} catch (Exception $e) {
			log_message('error', 'Erro ao gerar Swagger JSON: ' . $e->getMessage());
			show_error('Erro interno ao gerar documentação.', 500);
		}
	}

	// Exibe a UI do Swagger
	public function ui()
	{
		$data['swagger_url'] = site_url('swagger/json');
		$this->load->view('swagger-ui', $data);
	}

	public function generate()
	{
		// Carrega o autoload do Composer
		$openapi = \OpenApi\Generator::scan([APPPATH . 'controllers/api/Users_controller.php', APPPATH . 'controllers/api/Profiles_controller.php']); // Escaneia a pasta de controllers
		
		// Você pode adicionar outros caminhos para escanear models, etc.
		$this->output->set_output($openapi->toJson());
	}

	public function yaml()
	{
		$openapi = \OpenApi\Generator::scan([APPPATH . 'controllers/']);
		$this->output->set_output($openapi->toYaml());
	}
}
