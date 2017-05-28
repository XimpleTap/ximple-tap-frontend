<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}

// namespace App;
// use Illuminate\Database\Eloquent\Model;
// class User extends Model
// {
//     protected $table = 'users';

//     public function profile(){
//         return $this->hasOne('App\UserProfile');
//     }

//     public function fetch_user_data($id){
//         return User::find($id);
//     }

//     public function fetch_user_profile($id){
//         return UserProfile::where('user_id',$id)->get();
//     }


// }

