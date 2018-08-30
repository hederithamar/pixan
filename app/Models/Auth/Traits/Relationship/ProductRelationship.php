<?php

namespace App\Models\Auth\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Auth\SocialAccount;
use App\Models\Auth\User;

/**
 * Class ProductRelationship.
 */
trait ProductRelationship
{

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
