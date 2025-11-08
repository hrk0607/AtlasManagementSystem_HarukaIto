<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $table = 'main_categories';
    protected $fillable = [
        'main_category'
    ];

    public function subCategories()
    {
        // リレーションの定義
        return $this->hasMany(SubCategory::class, 'main_category_id');
    }
}
