<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_profiles extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
				'null' => TRUE
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
				'null' => TRUE
            ),
            'website' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
				'null' => TRUE
            ),
            'instagram' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
				'null' => TRUE
            ),
            'facebook' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
				'null' => TRUE
            ),
            'linkedin' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
				'null' => TRUE
            ),
            'twitter_x' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
				'null' => TRUE
            ),
            'avatar' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
				'null' => TRUE
            ),
            'bio' => array(
				'type' => 'TEXT',
				'null' => TRUE,
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP'
            ),
            'updated_at' => array(
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
            )
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(id)');
        $this->dbforge->add_field('UNIQUE (user_id)');
        $this->dbforge->create_table('profiles');
    }

    public function down() {
		$this->dbforge->drop_table('profiles');
    }
}
