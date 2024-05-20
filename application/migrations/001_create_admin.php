<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_admin extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'IDENTIFICATION' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'unsigned' => TRUE,
			),
			'NAME' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'LASTNAME' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'PHONE' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
			),
			'EMAIL' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
			),
			'PASSWORD' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
		));
		$this->dbforge->add_key('IDENTIFICATION', TRUE);
		$this->dbforge->create_table('TB_ADMIN');
	}

	public function down()
	{
		$this->dbforge->drop_table('TB_ADMIN');
	}
}