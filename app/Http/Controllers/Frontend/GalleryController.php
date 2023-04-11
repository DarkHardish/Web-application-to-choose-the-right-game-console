<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsole;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
     function index($id)
    {
        $console = Konsole::find($id);
        dd($console->images);
        $images = Image::where('console_id', $console->id)->get();
        return view('details',compact('console', 'images'));
    }
}
