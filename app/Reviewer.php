<?php

namespace PeerReview;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    public function contact_info() {
        # Each reviewer has one set of contact info
        return $this->hasOne('\PeerReview\Contact')->withTimestamps();
    }
    public function areas() {
        # Each reviewer has many Areas of Expertise
        # Define a many-to-many relationship.
        return $this->belongsToMany('\PeerReview\Area')->withTimestamps();
    }
}
