<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Age extends Model
{
    use HasFactory;

     protected $fillable = ['name', 'image', 'status'];




public function getThumbnailUrl()
{
    $isUrl = str_contains($this->image, 'http');

    return ($isUrl) ? $this->image : Storage::disk()->url($this->image);
}
}
