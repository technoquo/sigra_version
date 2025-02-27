<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryAge extends Model
{
    use HasFactory;

    protected $table = 'category_age';

    protected $fillable = [
        'category_id',
        'age_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
