<?php

use Illuminate\Database\Seeder;

class AreaUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//     'Solar System', 'Normal Stars and WD', 'BH and NS Binaries',
//     'WD Binaries and CV', 'SN, SNR and Isolated NS', 'Galaxies: Populations',
//     'Active Galaxies and Quasars', 'Clusters of Galaxies',
//     'Extragalctic Diffuse Emission and Surveys', 'Galactic Diffuse Emission and Surveys',
//     'Pundit', 'Galaxies: Diffuse Emission'

         # First, create an array of all the users we want to associate areas with
         # The *key* will be the user id, and the *value* will be an array of areas.
         $users =[
              '1' => ['Solar System','Clusters of Galaxies','Galaxies: Diffuse Emission','Active Galaxies and Quasars'],
              '2' => ['SN, SNR and Isolated NS', 'Galaxies: Populations', 'Active Galaxies and Quasars'],
              '3' => ['Galaxies: Populations','Active Galaxies and Quasars', 'Clusters of Galaxies',],
              '4' => ['Extragalctic Diffuse Emission and Surveys', 'Galactic Diffuse Emission and Surveys'],
              '5' => ['Galaxies: Diffuse Emission','Galactic Diffuse Emission and Surveys'],
              '6' => ['Solar System', 'WD Binaries and CV', 'SN, SNR and Isolated NS'],
              '7' => ['Solar System','Clusters of Galaxies','Galaxies: Diffuse Emission','Active Galaxies and Quasars'],
              '8' => ['Extragalctic Diffuse Emission and Surveys', 'Galactic Diffuse Emission and Surveys'],
              '9' => ['Solar System', 'Normal Stars and WD', 'BH and NS Binaries'],
              '10' => ['Solar System','Clusters of Galaxies','Galaxies: Diffuse Emission','Active Galaxies and Quasars'],
              '11' => ['SN, SNR and Isolated NS', 'Galaxies: Populations', 'Active Galaxies and Quasars'],
         ];

        # Now loop through the above array, creating a new pivot for each user to area
        foreach ($users as $user_id => $areas) {
            $user = \PeerReview\User::where('id', '=', $user_id)->first();
             # Now loop through each area of expertise, adding the pivot
            foreach ($areas as $areaName) {
                 $area = \PeerReview\Area::where('area', 'LIKE', $areaName)->first();

                 # Connect this area to this reviewer
                 $user->areas()->save($area);
            }

        }
    }
}
