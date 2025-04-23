<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php'; // Carrega o autoload do Composer


use OpenApi\Annotations as OA;
/**
 * @OA\Tag(
 * name="Profiles",
 * description="Operações relacionadas a perfis de usuário"
 * )
 */
class Profiles_controller extends CI_Controller
{
	public $benchmark;
	public $hooks;
	public $config;
	public $log;
	public $utf8;
	public $uri;
	public $router;
	public $output;
	public $security;
	public $input;
	public $lang;
	public $load;
	public $form_validation;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
		$this->load->library('form_validation');
		
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        
        // Handle OPTIONS method
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit(0);
        }
	}

/**
     * @OA\Get(
     * path="/profiles",
     * summary="Lista todos os perfis",
     * tags={"Profiles"},
     * @OA\Response(
     * response="200",
     * description="Lista de perfis",
     * @OA\JsonContent(
     * type="array",
     * @OA\Items(ref="#/components/schemas/Profile")
     * )
     * )
     * )
     */
	public function index()
	{
		$profiles = $this->profile_model->all();

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($profiles));
	}
	   /**
     * @OA\Get(
     * path="/profiles/{id}",
     * summary="Busca um perfil por ID",
     * tags={"Profiles"},
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID do perfil a ser buscado",
     * @OA\Schema(type="integer", format="int64")
     * ),
     * @OA\Response(
     * response="200",
     * description="Dados do perfil",
     * @OA\JsonContent(ref="#/components/schemas/Profile")
     * ),
     * @OA\Response(response="404")
     * )
     */
	public function show($id)
	{
		$profile = $this->profile_model->find($id);

		if ($profile) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($profile));
		} else {
			show_404();
		}
	}
	  /**
     * @OA\Post(
     * path="/profiles",
     * summary="Cria um novo perfil",
     * tags={"Profiles"},
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(ref="#/components/schemas/NewProfile")
     * ),
     * @OA\Response(response="201"),
     * @OA\Response(response="400")
     * )
     */
	public function create()
	{
		$this->load->library('form_validation', 'input');

		$data = json_decode($this->input->raw_input_stream, true);

		if ($this->validation($data)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(201)
				->set_output(json_encode(['status' => 'success', 'Message' => "Success"]))->_display();
			exit;
		} else {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['status' => 'error', 'Message' => "Error"]))->_display();
			exit;
		}
	}
	   /**
     * @OA\Put(
     * path="/profiles/{id}",
     * summary="Atualiza um perfil existente",
     * tags={"Profiles"},
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID do perfil a ser atualizado",
     * @OA\Schema(type="integer", format="int64")
     * ),
     * @OA\RequestBody(
     * @OA\JsonContent(ref="#/components/schemas/UpdateProfile")
     * ),
     * @OA\Response(response="200"),
     * @OA\Response(response="400"),
     * @OA\Response(response="404")
     * )
     */
	public function update($id)
	{
		$this->load->library('form_validation', 'input');

		$data = json_decode($this->input->raw_input_stream, true);

		if ($this->validation($data)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(200)
				->set_output(json_encode(['status' => 'success', 'Message' => "Success"]))->_display();
			exit;
		} else {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['status' => 'error', 'Message' => "Error"]))->_display();
			exit;
		}
	}
	   /**
     * @OA\Delete(
     * path="/profiles/{id}",
     * summary="Deleta um perfil",
     * tags={"Profiles"},
     * @OA\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID do perfil a ser deletado",
     * @OA\Schema(type="integer", format="int64")
     * ),
     * @OA\Response(response="200"),
     * @OA\Response(response="404")
     * )
     */
	public function delete($id)
	{
		$this->profile_model->delete($id);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['status' => 'success']));
	}
	public function validation($data)
	{
		$this->form_validation->set_data($data);
        $this->form_validation->set_rules('first_name', 'First Name', 'trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim');
        $this->form_validation->set_rules('website', 'Website', 'valid_url|trim');
        $this->form_validation->set_rules('instagram', 'Instagram', 'trim');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
        $this->form_validation->set_rules('linkedin', 'LinkedIn', 'trim');
        $this->form_validation->set_rules('twitter_x', 'Twitter X', 'trim');
        $this->form_validation->set_rules('avatar', 'Avatar', 'valid_url|trim');
        $this->form_validation->set_rules('bio', 'Bio', 'trim');
        $this->form_validation->set_rules('user_id', 'User ID', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
	}
	
	}
