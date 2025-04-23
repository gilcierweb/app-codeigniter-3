<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Faker\Factory;

class Profile_seeder_model extends CI_Model {

    protected $faker;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->faker = Factory::create('pt_BR');
    }

    public function run($num_profiles = 5)
    {
        $users = $this->db->get('users')->result_array();
        if (!empty($users)) {
            $num_users = count($users);
            for ($i = 0; $i < $num_profiles; $i++) {
                $user_index = $i % $num_users; 
                $data = array(
                    'first_name' => $this->faker->firstName(),
                    'last_name'  => $this->faker->lastName(),
                    'website'    => $this->faker->url(),
                    'instagram'  => 'https://www.instagram.com/'.$this->faker->userName(),
                    'facebook'   => 'https://www.fb.com/' .$this->faker->userName(),
                    'linkedin'   => 'https://www.linkedin.com/in/' .$this->faker->userName(),
                    'twitter_x'  => 'https://x.com/' .$this->faker->userName(),
                    'avatar'     => $this->faker->imageUrl(200, 200, 'People', true, 'Faker'),
                    'bio'        => $this->faker->sentence(6),
                    'user_id'    => $users[$user_index]['id']
                );
                $this->db->insert('profiles', $data);
            }
            echo "$num_profiles dados da tabela 'profiles' inseridos com sucesso.\n";
        } else {
            echo "Não existem usuários para criar perfis.\n";
        }
    }
}
