<?php

use Illuminate\Database\Seeder;

class AreaReviewerTableSeeder extends Seeder
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

         # First, create an array of all the reviewers we want to associate areas with
         # The *key* will be the reviewer id, and the *value* will be an array of areas.
        $reviewers =[
             '1' => ['Solar System','Clusters of Galaxies','Galaxies: Diffuse Emission','Active Galaxies and Quasars'],
             '2' => ['SN, SNR and Isolated NS', 'Galaxies: Populations', 'Active Galaxies and Quasars'],
             '3' => ['Solar System', 'Normal Stars and WD', 'BH and NS Binaries'],
             '4' => ['Solar System','Clusters of Galaxies','Galaxies: Diffuse Emission','Active Galaxies and Quasars'],
             '5' => ['SN, SNR and Isolated NS', 'Galaxies: Populations', 'Active Galaxies and Quasars'],
             '6' => ['Solar System', 'Normal Stars and WD', 'BH and NS Binaries'],
             '7' => ['Solar System','Clusters of Galaxies','Galaxies: Diffuse Emission','Active Galaxies and Quasars'],
             '8' => ['SN, SNR and Isolated NS', 'Galaxies: Populations', 'Active Galaxies and Quasars'],
             '9' => ['Solar System', 'Normal Stars and WD', 'BH and NS Binaries'],
             '10' => ['Solar System','Clusters of Galaxies','Galaxies: Diffuse Emission','Active Galaxies and Quasars'],
             '11' => ['SN, SNR and Isolated NS', 'Galaxies: Populations', 'Active Galaxies and Quasars'],
        ];

        # Now loop through the above array, creating a new pivot for each reviewer to area
        foreach ($reviewers as $reviewer_id => $areas) {
            $reviewer = \PeerReview\Reviewer::where('id', '=', $reviewer_id)->first();
             # Now loop through each area of expertise, adding the pivot
            foreach ($areas as $areaName) {
                 $area = \PeerReview\Area::where('area', 'LIKE', $areaName)->first();

                 # Connect this area to this reviewer
                 $reviewer->areas()->save($area);
            }

        }
    }
}
