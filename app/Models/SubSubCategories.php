<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategories extends Model
{
    use HasFactory;
    protected $table = 'sub_sub_categories';

    public function Category(){
        return $this->belongsTo(CategoryTest::class,'category_id','id');
    }

    public function Subcategori(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}
