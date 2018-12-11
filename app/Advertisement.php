<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class Advertisement extends Model
{
    protected $table='advertisement';
    protected $fillable = ['id', 'category_id', 'title', 'description', 'created_at', 'updated_at', 'user_id', 'status'];
    

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function  advimages(){
        return $this->hasMany('App\AdvImage', 'advertisement_id');
    }
}
