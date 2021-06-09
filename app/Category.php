<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['image', 'title_en', 'title_ar', 'deleted'];

    public function products() {
        return $this->hasMany('App\Product', 'category_id');
    }


    public function Sub_categories() {
        if(session('lang_api') == 'ar') {
            return $this->hasMany('App\SubCategory', 'category_id')->select('id', 'title_ar as title','category_id')->where('deleted','0');
        }else{
            return $this->hasMany('App\SubCategory', 'category_id')->select('id', 'title_en as title','category_id')->where('deleted','0');
        }
    }

    public function Category_ads() {
            return $this->hasMany('App\Categories_ad', 'cat_id')->select('image', 'cat_id','type','ad_type' ,'content')->where('type','category')->where('deleted','0');
    }
}
