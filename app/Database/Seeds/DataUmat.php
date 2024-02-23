<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataUmat extends Seeder {
    public function run() {
        for ($i = 0; $i < 100; $i++) {
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'nama_lengkap' => $faker->name(),
                'nik' => $faker->nik(),
                'nokk' => $faker->nik(),
                'tempat_lahir' => $faker->city(),
                'tanggal_lahir' => $faker->date(),
                'jenis_kelamin' => $faker->randomElement(['LAKI-LAKI', 'PEREMPUAN']),
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'alamat' => $faker->address(),
                'no_hp' => $faker->phoneNumber(),
            ];
            $this->db->table('data_umat')->insert($data);
        }
    }
}
