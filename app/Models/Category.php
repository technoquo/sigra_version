<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'image',
        'type',
        'menu',
        'status',
        'url',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    public function multimedias()
{
    return $this->belongsToMany(Multimedia::class, 'category_multimedia');
}

public function getThumbnailUrl()
{
    $isUrl = str_contains($this->image, 'http');

    return ($isUrl) ? $this->image : Storage::disk()->url($this->image);
}

}
