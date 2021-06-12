<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['image', 'title_en', 'title_ar', 'deleted','offers_image'];

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
    public function Offers() {
        $user = auth()->user();
        return $this->hasMany('App\Product', 'category_id')->select('id','title','main_image as image','price','category_id','created_at')->where('offer', 1)
            ->where('status', 1)
            ->where('deleted', 0)
            ->where('publish', 'Y');
    }
}
