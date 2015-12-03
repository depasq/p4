<?php

namespace PeerReview;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function users() 
    {
        // Get a reviewer from contact info
        return $this->belongsTo('\PeerReview\User')->withTimestamps();
    }
}
