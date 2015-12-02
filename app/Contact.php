<?php

namespace PeerReview;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function reviewers() {
        // Get a reviewer from contact info
        return $this->belongsTo('\PeerReview\Reviewer')->withTimestamps();
}
