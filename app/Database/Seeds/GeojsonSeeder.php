<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GeojsonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kecamatan' => 'Beji',
                'geojson'    => 'beji.geojson'
            ],
            [
                'kecamatan' => 'Bojongsari',
                'geojson'    => 'bojongsari.geojson'
            ],
            [
                'kecamatan' => 'Cilodong',
                'geojson'    => 'cilodong.geojson'
            ],
            [
                'kecamatan' => 'Cimanggis',
                'geojson'    => 'cimanggis.geojson'
            ],
            [
                'kecamatan' => 'Cinere',
                'geojson'    => 'cinere.geojson'
            ],
            [
                'kecamatan' => 'Cipayung',
                'geojson'    => 'cipayung.geojson'
            ],
            [
                'kecamatan' => 'Limo',
                'geojson'    => 'limo.geojson'
            ],
            [
                'kecamatan' => 'Pancoran Mas',
                'geojson'    => 'pancoranmas.geojson'
            ],
            [
                'kecamatan' => 'Sawangan',
                'geojson'    => 'sawangan.geojson'
            ],
            [
                'kecamatan' => 'Sukma Jaya',
                'geojson'    => 'sukmajaya.geojson'
            ],
            [
                'kecamatan' => 'Tapos',
                'geojson'    => 'tapos.geojson'
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO geojson (kecamatan, geojson) VALUES(:kecamatan:, :geojson:)', $data);

        // Using Query Builder
        // $this->db->table('geojson')->insert($data);
        $this->db->table('geojson')->insertBatch($data);
    }
}

// Run Seeder
// php spark db:seed GeojsonSeeder