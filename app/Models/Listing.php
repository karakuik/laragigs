<?php

namespace App\Models;

class Listing
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'This is the description for Listing One.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'This is the description for Listing Two.'
            ]
        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing){
            if ($listing['id'] == $id){
                return $listing;
            }
        }
    }
}
