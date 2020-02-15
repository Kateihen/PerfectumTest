<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once dirname(__DIR__) . "/third_party/Faker/autoload.php";

class Migration_Comments_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'body' => [
                'type' => 'TEXT',
            ],
        ]);
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('comments');

        $faker = Faker\Factory::create();
        $faker->seed(50);

        for ($i = 1; $i <= 50; $i++) {
            $seedData = [
                'user_name' => $faker->name,
                'email' => $faker->email,
                'body' => $faker->text,
            ];
            $sql = "INSERT INTO comments (user_name, email, body) 
            VALUES ('".$seedData['user_name']."', '".$seedData['email']."', '".$seedData['body']."');";
            $this->db->query($sql);
        }
    }
    
    public function down()
    {
        $this->dbforge->drop_table('comments');
    }
}