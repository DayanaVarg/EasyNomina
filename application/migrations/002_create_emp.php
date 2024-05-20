<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_emp extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'TIPO_IDE' => array(
				'type' => 'VARCHAR',
				'constraint' => '2',
			),
			'IDENTIFICATION' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'unsigned' => TRUE
			),
			'NAME' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'LASTNAME' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'EMAIL' => array(
				'type' => 'VARCHAR',
				'constraint' => '60',
			),
			'POSITION' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'AREA' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
			),
			'STATE' => array(
				'type' => 'INT',
				'constraint' => '1',
			),
		));
		$this->dbforge->add_key('IDENTIFICATION', TRUE);
		$this->dbforge->create_table('TB_EMPLOYEE');
	}

	public function down()
	{
		$this->dbforge->drop_table('TB_EMPLOYEE');
	}
}