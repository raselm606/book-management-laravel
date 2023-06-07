<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';

    public function categorytest(){
        return $this->belongsTo(CategoryTest::class,'category_id','id');
    }
    public function subsubcatdel(){
        return $this->hasMany(SubSubCategories::class,'id','subcategory_id');
    }
}
