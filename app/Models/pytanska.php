<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pytanska extends Model
{
    protected $table = 'pytanska';
    protected $fillable = ['Pytanie'];


    public function consoles()
    {
        return $this->belongsToMany(Konsole::class, 'id','nazwa');
    }
}
