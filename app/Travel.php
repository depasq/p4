<?php

namespace PeerReview;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    public function users()
    {
        // connect user to travel itinerary
        return $this->belongsTo('PeerReview\User');
    }
}
