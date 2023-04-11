<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Konsole;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable=[
        'console_id',
        'image'
    ];

    public function getImageUrlAttribute(){
        return '/image/' .$this->image;
    }

    public function console(){
        return $this->belongsTo(Konsole::class, 'console_id', 'id');
    }
}
