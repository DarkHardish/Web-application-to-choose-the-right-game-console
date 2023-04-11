<?php

namespace App\Models;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Konsole extends Model
{
    use HasFactory;
    protected $table = 'konsoles';
    protected $fillable=[
        'nazwa',
        'image',
        'opis',
        'podroze',
        'price',
        'VR',
        'GB',
        'IO',
        'rozdzielczosc',
        'kompatybilnosc',
        'producent',
        'kolor',
        'dysk_twardy',
        'wifi',
        'bluetooth',
        'Ethernet',
        'wysokosc',
        'szerokosc',
        'glebokosc',
        'waga'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id','id');
    }
   
   public function images()
   {
    return $this->hasMany(Image::class, 'console_id','id');
   }
}
