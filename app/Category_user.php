<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_user extends Model
{
    protected $guarded = [];


    public function Category() {
        return $this->belongsTo('App\Category', 'cat_id');
    }


    public function User() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
