<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubThreeCategory extends Model
{

    protected  $appends = ['next_level'];
    protected  $hidden = ['SubCategories'];
    protected $fillable = ['title_en', 'title_ar', 'image', 'deleted', 'sub_category_id','sort','is_show'];


    public function category() {
        return $this->belongsTo('App\SubTwoCategory', 'sub_category_id');
    }

    public function products() {
        return $this->hasMany('App\Product', 'sub_category_three_id')->where('status', 1)->where('publish', 'Y')->where('deleted', 0);
    }

    public function SubCategories() {
        return $this->hasMany('App\SubFourCategory', 'sub_category_id')->where('deleted', 0)->where('is_show', 1);
    }

    public function getNextLevelAttribute(){
        $result = false ;
        if(count($this->SubCategories) > 0 ){
            foreach ($this->SubCategories as $row){
                if(count($row->SubCategories) > 0 ){
                    $result = true ;
                    break;
                }else{
                    $result = false ;
                }
            }
        }else{
            $result = false ;
        }
        return $result ;
    }
}
