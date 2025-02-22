<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id', 'videos_id', 'subscriptions_id', 'status'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'videos_id' => 'array',
        'subscriptions_id' => 'integer',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    

    public function subscriptions(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    public function videos(): BelongsTo
    {
        return $this->BelongsTo(Video::class);
    }
}
