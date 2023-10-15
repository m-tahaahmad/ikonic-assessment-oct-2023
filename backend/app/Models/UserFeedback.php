<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'feedback_id'
    ];

    protected $table = 'user_feedbacks';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
