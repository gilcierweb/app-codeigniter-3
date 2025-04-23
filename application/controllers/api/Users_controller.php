<?php
// die('No direct script access allowed');
defined('BASEPATH') or exit('No direct script access allowed');
// error_reporting(-1);
//  ini_set('display_errors', 1);

require_once APPPATH . '../vendor/autoload.php'; // Carrega o autoload do Composer
use OpenApi\Annotations as OA;


/**
 * @OA\Info(
 * version="1.0.0",
 * title="API de Usuários e Perfis",
 * description="API para gerenciar usuários e seus perfis.",
 * @OA\Contact(
 * email="seuemail@example.com"
 * )
 * )
 * @OA\Server(
 * url="{scheme}://{host}/api",
 * description="Servidor da API",
 * @OA\ServerVariable(
 * serverVariable="scheme",
 * enum={"http", "https"},
 * default="http"
 * ),
 * @OA\ServerVariable(
 * serverVariable="host",
 * default=API_HOST
 * )
 * )
 * @OA\Tag(
 * name="Users",
 * description="Operações relacionadas a usuários"
 * )
 * @OA\Tag(
 * name="Profiles",
 * description="Operações relacionadas a perfis de usuário"
 * )
 * @OA\Schema(
 * schema="User",
 * type="object",
 * properties={
 * @OA\Property(property="id", type="integer", format="int64"),
 * @OA\Property(property="username", type="string"),
 * @OA\Property(property="email", type="string"),
 * @OA\Property(property="created_at", type="string", format="date-time"),
 * @OA\Property(property="updated_at", type="string", format="date-time")
 * }
 * )
 * @OA\Schema(
 * schema="NewUser",
 * type="object",
 * required={"username", "email", "password"},
 * properties={
 * @OA\Property(property="username", type="string"),
 * @OA\Property(property="email", type="string"),
 * @OA\Property(property="password", type="string")
 * }
 * )
 * @OA\Schema(
 * schema="UpdateUser",
 * type="object",
 * properties={
 * @OA\Property(property="username", type="string"),
 * @OA\Property(property="email", type="string"),
 * @OA\Property(property="password", type="string")
 * }
 * )
 * @OA\Schema(
 * schema="Profile",
 * type="object",
 * properties={
 * @OA\Property(property="id", type="integer", format="int64"),
 * @OA\Property(property="first_name", type="string", nullable=true),
 * @OA\Property(property="last_name", type="string", nullable=true),
 * @OA\Property(property="website", type="string", nullable=true),
 * @OA\Property(property="instagram", type="string", nullable=true),
 * @OA\Property(property="facebook", type="string", nullable=true),
 * @OA\Property(property="linkedin", type="string", nullable=true),
 * @OA\Property(property="twitter_x", type="string", nullable=true),
 * @OA\Property(property="avatar", type="string", nullable=true),
 * @OA\Property(property="bio", type="string", nullable=true),
 * @OA\Property(property="user_id", type="integer", format="int64"),
 * @OA\Property(property="created_at", type="string", format="date-time"),
 * @OA\Property(property="updated_at", type="string", format="date-time")
 * }
 * )
 * @OA\Schema(
 * schema="NewProfile",
 * type="object",
 * required={"user_id"},
 * properties={
 * @OA\Property(property="first_name", type="string", nullable=true),
 * @OA\Property(property="last_name", type="string", nullable=true),
 * @OA\Property(property="website", type="string", nullable=true),
 * @OA\Property(property="instagram", type="string", nullable=true),
 * @OA\Property(property="facebook", type="string", nullable=true),
 * @OA\Property(property="linkedin", type="string", nullable=true),
 * @OA\Property(property="twitter_x", type="string", nullable=true),
 * @OA\Property(property="avatar", type="string", nullable=true),
 * @OA\Property(property="bio", type="string", nullable=true),
 * @OA\Property(property="user_id", type="integer", format="int64")
 * }
 * )
 * @OA\Schema(
 * schema="UpdateProfile",
 * type="object",
 * properties={
 * @OA\Property(property="first_name", type="string", nullable=true),
 * @OA\Property(property="last_name", type="string", nullable=true),
 * @OA\Property(property="website", type="string", nullable=true),
 * @OA\Property(property="instagram", type="string", nullable=true),
 * @OA\Property(property="facebook", type="string", nullable=true),
 * @OA\Property(property="linkedin", type="string", nullable=true),
 * @OA\Property(property="twitter_x", type="string", nullable=true),
 * @OA\Property(property="avatar", type="string", nullable=true),
 * @OA\Property(property="bio", type="string", nullable=true),
 * @OA\Property(property="user_id", type="integer", format="int64")
 * }
 * )
 * @OA\Response(
 * response="404",
 * description="Recurso não encontrado"
 * )
 * @OA\Response(
 * response="400",
 * description="Erro de validação"
 * )
 * @OA\Response(
 * response="201",
 * description="Criado com sucesso"
 * )
 * @OA\Response(
 * response="200",
 * description="Sucesso"
 * )
 */

class Users_controller extends CI_Controller
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
		$this->load->model('user_model');
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
     * @SWG\Get(
     * path="/users",
     * summary="Lista todos os usuários",
     * tags={"Users"},
     * @SWG\Response(
     * response="200",
     * description="Lista de usuários",
     * @SWG\Schema(
     * type="array",
     * @SWG\Items(ref="#/definitions/User")
     * )
     * )
     * )
     */
	public function index()
	{
		$users = $this->user_model->all();

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($users));
	}

	 /**
     * @SWG\Get(
     * path="/users/{id}",
     * summary="Busca um usuário por ID",
     * tags={"Users"},
     * @SWG\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID do usuário a ser buscado",
     * type="integer",
     * format="int64"
     * ),
     * @SWG\Response(
     * response="200",
     * description="Dados do usuário",
     * @SWG\Schema(ref="#/definitions/User")
     * ),
     * @SWG\Response(response="404")
     * )
     */
	public function show($id)
	{
		$user = $this->user_model->find($id);

		if ($user) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($user));
		} else {
			show_404();
		}
	}
 /**
     * @SWG\Post(
     * path="/users",
     * summary="Cria um novo usuário",
     * tags={"Users"},
     * @SWG\Parameter(
     * name="body",
     * in="body",
     * required=true,
     * description="Dados do novo usuário",
     * @SWG\Schema(ref="#/definitions/NewUser")
     * ),
     * @SWG\Response(response="201"),
     * @SWG\Response(response="400")
     * )
     */
	public function create()
	{
		$this->load->library('form_validation', 'input');

		$data = json_decode($this->input->raw_input_stream, true);

		// $this->user_model->insert($data);

		if ($this->validation($data)) {
			$this->output
				->set_content_type('application/json')
				->set_status_header(201)
				->set_output(json_encode(['status' => 'success', 'Message' => "Success"]));
		} else {
			$this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode(['status' => 'error', 'message' => validation_errors()]));
		}
	}
 /**
     * @SWG\Put(
     * path="/users/{id}",
     * summary="Atualiza um usuário existente",
     * tags={"Users"},
     * @SWG\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID do usuário a ser atualizado",
     * type="integer",
     * format="int64"
     * ),
     * @SWG\Parameter(
     * name="body",
     * in="body",
     * description="Dados para atualizar o usuário",
     * @SWG\Schema(ref="#/definitions/UpdateUser")
     * ),
     * @SWG\Response(response="200"),
     * @SWG\Response(response="400"),
     * @SWG\Response(response="404")
     * )
     */
	public function update($id)
	{
		$data = json_decode($this->input->raw_input_stream, true);

		$this->user_model->update($id, $data);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['status' => 'success']));
	}
/**
     * @SWG\Delete(
     * path="/users/{id}",
     * summary="Deleta um usuário",
     * tags={"Users"},
     * @SWG\Parameter(
     * name="id",
     * in="path",
     * required=true,
     * description="ID do usuário a ser deletado",
     * type="integer",
     * format="int64"
     * ),
     * @SWG\Response(response="200"),
     * @SWG\Response(response="404")
     * )
     */
	public function delete($id)
	{
		$this->user_model->delete($id);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['status' => 'success']));
	}

	function validation($data)
	{
		$this->load->library('form_validation', 'input');
		// gambiarra codeigniter 3
		$this->form_validation->set_data($data);

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			return false;
		} else {
			$username = $data['username'];
			$email = $data['email'];
			$password = $data['password'];

			$this->db->where('email', $email);
			$query = $this->db->get('users');

			if ($query->num_rows() > 0) {
				$this->form_validation->set_message('email', 'The {field} field must be unique.');
				$this->output->set_content_type('application/json')
					->set_status_header(400)
					->set_output(json_encode(['status' => 'error', 'message' => 'Email already exists']));
				return false;
			}

			$encrypted_password = password_hash($password, PASSWORD_BCRYPT);

			$data = array(
				'username' => $username,
				'email' => $email,
				'password' => $encrypted_password
			);

			$this->user_model->insert($data);

			return true;
		}
	}
}
