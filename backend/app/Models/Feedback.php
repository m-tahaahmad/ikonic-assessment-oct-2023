<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'category', 'vote_up', 'vote_down', 'is_comment'
    ];

    public function userFeedback()
    {
        return $this->hasOne(UserFeedback::class, 'feedback_id', 'id');
    }

    public function commentFeedback()
    {
        return $this->hasMany(FeedbackComment::class, 'feedback_id', 'id');
    }
}
