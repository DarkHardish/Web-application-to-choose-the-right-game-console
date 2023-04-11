<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consoles_questions_2 extends Model
{
    use HasFactory;
    protected $table = 'consoles_questions_2';
    protected $fillable=[
        'nazwa',
        'image',
        'opis',
        'podroze',
        'price',
        'VR',
        'RAM'
    ];
}
