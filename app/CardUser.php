<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardUser extends Model
{
    protected $table = 'cards_users';

    public function fetch_cards($id){
        return CardUser::where('users_id',$id)->get();
    }
}
