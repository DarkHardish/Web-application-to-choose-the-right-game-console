<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionzs extends Model
{
    use HasFactory;
    protected $table = "questionzs";
    protected $fillable = ['Pytanie'];
}
