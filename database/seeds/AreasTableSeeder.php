<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = array('Solar System', 'Normal Stars and WD', 'BH and NS Binaries',
            'WD Binaries and CV', 'SN, SNR and Isolated NS', 'Galaxies: Populations',
            'Active Galaxies and Quasars', 'Clusters of Galaxies',
            'Extragalctic Diffuse Emission and Surveys', 'Galactic Diffuse Emission and Surveys',
            'Pundit', 'Galaxies: Diffuse Emission',
        );
        for ($i=0; $i<=count($areas)-1; $i++) {
            DB::table('areas')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'area' => $areas[$i],
            ]);
        };
    }
}
