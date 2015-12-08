<?php

namespace PeerReview;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function users()
    {
        # Each area of expertise can relate to many users
        # Define a many-to-many relationship.
        return $this->belongsToMany('\PeerReview\User')->withTimestamps();
    }

    public function getAreasForCheckboxes()
    {
        $areas = $this->orderBy('area', 'ASC')->get();
        $areasForCheckboxes = [];
        foreach ($areas as $area) {
            $areasForCheckboxes[$area['id']] = $area;
        }
        return $areasForCheckboxes;
    }
}
