<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['form_id','user_id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function form():BelongsTo
    {
        return $this->belongsTo(Form::class)->withDefault([
            'name' => 'Форма не найдена'
        ]);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
