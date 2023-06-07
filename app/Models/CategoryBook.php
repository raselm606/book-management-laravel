<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    use HasFactory;

    public function parent_category($parent_id){
        $category = CategoryBook::find($parent_id);
        return $category;
    }
}
