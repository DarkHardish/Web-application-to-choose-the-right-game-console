<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class comment_replies extends Model
{
    use HasFactory;
    protected $table = 'comment_replies';
    protected $fillable = [
        'user_id', 'comment_id', 'comment_reply_body'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function comment() {
        return $this->belongsTo(Comment::class, 'comment_id','id');
    }

}
