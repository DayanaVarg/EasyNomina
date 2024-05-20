<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_nom extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'ID_NOM' => array(
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'DATE_STAR' => array(
				'type' => 'DATE',
				'null' => FALSE,
			),
			'DATE_END' => array(
				'type' => 'DATE',
				'null' => FALSE,
			),
			'PAYMENT' => array(
				'type' => 'FLOAT'
			),
			'IDENTIFICATION' => array(
				'type' => 'VARCHAR',
				'constraint' => 10,
				'unsigned' => TRUE,
			),
		));
		$this->dbforge->add_key('ID_NOM', TRUE);
		$this->dbforge->create_table('TB_SALARY');

		$this->db->query("
            ALTER TABLE TB_SALARY 
            ADD CONSTRAINT FK_EMPLOYEE 
            FOREIGN KEY (IDENTIFICATION) 
            REFERENCES TB_EMPLOYEE(IDENTIFICATION)
        ");
	}

	public function down()
	{
		$this->dbforge->drop_table('TB_SALARY');
	}
}