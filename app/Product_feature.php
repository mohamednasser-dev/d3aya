<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_feature extends Model
{
    protected $fillable = ['product_id','target_id', 'type','option_id'];

    public function Producr() {
        return $this->belongsTo('App\Product', 'product_id');
    }
    public function Option()
    {
        if(session('lang') == 'en'){
            return $this->belongsTo('App\Category_option', 'option_id')->select('id', 'image','title_en as title', 'is_required');
        }else{
            return $this->belongsTo('App\Category_option', 'option_id')->select('id','image', 'title_ar as title', 'is_required');
        }
    }

    public function Option_value()
    {
        if(session('lang') == 'en'){
            return $this->belongsTo('App\Category_option_value', 'target_id')->select('id', 'value_en as value');
        }else{
            return $this->belongsTo('App\Category_option_value', 'target_id')->select('id', 'value_ar as value');
        }
    }

}
