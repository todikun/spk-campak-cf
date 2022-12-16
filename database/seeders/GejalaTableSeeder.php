<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gejala::insert([
            [
                'kode' => 'KG0001',
                'nama' => 'Demam selama 3-5 hari',
            ],
            [
                'kode' => 'KG0002',
                'nama' => 'Batuk',
            ],
            [
                'kode' => 'KG0003',
                'nama' => ucfirst('pilek'),
            ],
            [
                'kode' => 'KG0004',
                'nama' => ucfirst('sakit tenggorokan'),
            ],
            [
                'kode' => 'KG0005',
                'nama' => ucfirst('sakit telinga'),
            ],
            [
                'kode' => 'KG0006',
                'nama' => ucfirst('diare'),
            ],
            [
                'kode' => 'KG0007',
                'nama' => ucfirst('hilang nafsu makan'),
            ],
            [
                'kode' => 'KG0008',
                'nama' => ucfirst('kelopak mata bengkak'),
            ],
            [
                'kode' => 'KG0009',
                'nama' => ucfirst('kelenjar getah bening di leher membesar'),
            ],
            [
                'kode' => 'KG0010',
                'nama' => ucfirst('muncul ruam di kulit setelah demam mereda'),
            ],
            [
                'kode' => 'KG0011',
                'nama' => ucfirst('mata sensitif terhadap cahaya terang'),
            ],
            [
                'kode' => 'KG0012',
                'nama' => ucfirst('sakit kepala'),
            ],
            [
                'kode' => 'KG0013',
                'nama' => ucfirst('iritasi ringan pada mata'),
            ],
            [
                'kode' => 'KG0014',
                'nama' => ucfirst('hidung tersumbat'),
            ],
            [
                'kode' => 'KG0015',
                'nama' => ucfirst('ruam berbentuk bintik-bintik kemerahan muncul di sekitar kulit wajah'),
            ],
            [
                'kode' => 'KG0016',
                'nama' => ucfirst('rasa nyeri pada sendi'),
            ],
        ]);
    }
}
