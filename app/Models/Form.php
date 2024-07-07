<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Form extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function user():BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function question():HasMany
    {
        return $this->hasMany(Question::class);
    }

}
