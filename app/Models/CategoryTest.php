<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTest extends Model
{
    use HasFactory;
    protected $table = 'category_test';
    protected $guarded = [];

    public function subcatdel(){
        return $this->hasMany(SubCategory::class,'id','category_id');
    }
    public function subsubcatdel(){
        return $this->hasMany(SubSubCategories::class,'id','category_id');
    }
}
