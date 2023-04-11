<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Konsole;
use App\Models\comment_replies;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable=[
        'post_id',
        'user_id',
        'comment_body',
        'rating'
        
    ];

  
    public function post()
    {
        return $this->belongsTo(Konsole::class, 'post_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function replies() {
        return $this->hasMany(comment_replies::class, 'comment_id','id');
    }
}
