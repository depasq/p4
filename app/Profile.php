<?php

namespace PeerReview;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['institution', 'street', 'city', 'state', 'zip', 'country'];

    public function users()
    {
        // Get a reviewer from contact info
        return $this->belongsTo('PeerReview\User');
    }
}
