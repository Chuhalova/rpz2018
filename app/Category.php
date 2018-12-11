<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 */
class Category extends Model
{
    protected $table = 'advertisement_categories';

    protected $fillable = ['id','created_at', 'update_at', 'category', 'parent_id'];

    public function parentChain()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')->with('parentChain');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id', 'id');
    }
    
    
}
