<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question_text','question_type','form_id'];

    public function form():BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
}
