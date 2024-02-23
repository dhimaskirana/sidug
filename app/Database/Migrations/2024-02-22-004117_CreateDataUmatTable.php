<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDataUmatTable extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nokk' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'tanggal_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'golongan_darah' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('data_umat');
    }

    public function down() {
        $this->forge->dropTable('data_umat');
    }
}
