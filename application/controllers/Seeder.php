<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';

class Seeder extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		if (!is_cli()) {
			show_404();
		}
	}

	public function users()
    {
        $this->load->model('seeders/user_seeder_model');
        $this->user_seeder_model->run();
    }

    public function profiles()
    {
        $this->load->model('seeders/profile_seeder_model');
        $this->profile_seeder_model->run();
    }

    public function all()
    {
        $this->users();
        $this->profiles();
        echo "Todos os seeders foram executados.<br>";
    }
}
