<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'feedback_id', 'comment_id'
    ];

    public function comments()
    {
        return $this->hasOne(Comment::class, 'id', 'comment_id');
    }
}
