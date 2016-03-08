<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    /**
     * Get the user that owns the phone.
     */

    protected $table = 'cars';
    protected $primaryKey = 'carID';

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}