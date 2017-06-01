<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'users_profiles';
    protected $fillable =['email_address'];
    public $timestamps = false;
    protected $primaryKey = 'user_id';



}
