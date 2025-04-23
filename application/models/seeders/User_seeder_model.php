<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Faker\Factory;

class User_seeder_model extends CI_Model {

    protected $faker;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();  
        $this->faker = Factory::create('pt_BR');
    }

    public function run($num_users = 5)
    {
        for ($i = 0; $i < $num_users; $i++) {
            $username = $this->faker->userName();
         
            while ($this->db->where('username', $username)->count_all_results('users') > 0) {
                $username = $this->faker->userName();
            }

            $email = $this->faker->email();
          
            while ($this->db->where('email', $email)->count_all_results('users') > 0) {
                $email = $this->faker->email();
            }

            $data = array(
                'username' => $username,
                'email'    => $email,
                'password' => password_hash('secret', PASSWORD_BCRYPT)
            );
            $this->db->insert('users', $data);
        }

        echo "$num_users dados da tabela 'users' inseridos com sucesso.\n";
    }
}
