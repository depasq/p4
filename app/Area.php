<?php

namespace PeerReview;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function reviewers() {
        # Each area of expertise can relate to many reviewers
        # Define a many-to-many relationship.
        return $this->belongsToMany('\PeerReview\Reviewer')->withTimestamps();
    }
}
