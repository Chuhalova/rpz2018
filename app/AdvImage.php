<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvImage extends Model
{
    protected $table='adv_images';
    protected $fillable = ['id', 'created_at','update_at', 'image','advertisement_id'];
//    public function advertisement()
//    {
//        return $this->belongsToMany('App\Advertisement');
//    }
}
