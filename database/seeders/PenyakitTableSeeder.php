<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penyakit;

class PenyakitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penyakit::insert([
            [
                'kode' => 'JP0001',
                'nama' => 'Campak Bayi',
                'deskripsi' => 'Lorem ipsum dolor sit amet.',
                'solusi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis, corrupti!',
            ],
            [
                'kode' => 'JP0002',
                'nama' => 'Campak Rubeola',
                'deskripsi' => 'Lorem ipsum dolor sit amet.',
                'solusi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis, corrupti!',
            ],
            [
                'kode' => 'JP0003',
                'nama' => 'Campak Rubella',
                'deskripsi' => 'Lorem ipsum dolor sit amet.',
                'solusi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis, corrupti!',
            ],
        ]);
    }
}
