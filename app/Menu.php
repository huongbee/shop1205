<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";

    public function MenuDetail(){
    	return $this->hasMany('App\MenuDetail','id_menu','id');
    }

    public function Foods(){
    	return $this->belongsToMany('App\Foods','menu_detail','id_menu','id_food');
    }
}
