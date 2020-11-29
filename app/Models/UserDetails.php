<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserDetails extends Authenticatable
{

    protected $table = 'user_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'dob',
        'city'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_details_id');
    } 
}
