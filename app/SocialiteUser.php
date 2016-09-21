<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialiteUser extends Model
{
    //
    protected $fillable=[
      "vendors","vendor_user_id","user_id"
    ];

    /**
     * @return array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
