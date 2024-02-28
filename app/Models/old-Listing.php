<?php

    namespace App\Models;

    class Listing {
     public static function all() {
        return [
            [
            'id' => 1,
            'title' => 'Listing One',
            'description' => 'Labas rytas vakaras rutyks ijwerhfoi welf jwlef 
            wekfkg;hjyupkj iorf isweyg wueh llOl, Labas rytas vakaras 
            rutyks ijwerhfoi welf jwlef wekfkg;hjyupkj iorf isweyg wueh llOl'
          
        ],
        [
            'id' => 2,
            'title' => 'Listing Two',
            'description' => 'Labas rytas vakaras rutyks ijwerhfoi welf jwlef 
            wekfkg;hjyupkj iorf isweyg wueh llOl, Labas rytas vakaras 
            rutyks ijwerhfoi welf jwlef wekfkg;hjyupkj iorf isweyg wueh llOl'
        ]
        ];
    }
    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing) {
            if($listing['id'] == $id){
                return $listing;
            }
        }

    }
}