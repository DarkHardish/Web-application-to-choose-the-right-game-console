<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsole;
use Illuminate\Support\Facades\DB;
use App\Models\questionzs;
use Session;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_konsoles = Konsole::get();
        $search = "i";
        $data2 = DB::table('Konsoles')->where('nazwa','like','%'.$search.'%')->get();
        $zapytanie1 = DB::table('Konsoles')->where('nazwa','like','%'.'Xbo'.'%')->get();
   
        return view('index',compact('featured_konsoles','data2','zapytanie1'));
        
    }

   /* public function nazwaview()
    {
            $featured_konsoles = Konsole::all();
            return view('details', compact('featured_konsoles'));
        

    
    }*/
   /* public function nazwaview($id){
        $id = Konsole::where('id',3)->get();
        return view('details', compact('id'));
    }*/

    function detail($id)
    {
        $data =  Konsole::find($id);
        return view('details',['Konsole'=>$data]);

    }

   function konsole(Request $request){
    $konsole = Konsole::get();
    $producent = $request->input('producent');
    $price = $request->input('price');
    $name = $request->input('name');
    if($name != null){
        $consoles = Konsole::where('nazwa','LIKE','%'.$name.'%')->get();
    }elseif(is_array($producent) && count($producent) > 0 && $price != null) {
        $consoles = Konsole::whereIn('producent', $producent)
            ->where('price','<=',$price)
            ->get();
    }elseif($price != null){
        $consoles = Konsole::where('price','<=',$price)->get();
    }elseif(is_array($producent) && count($producent) > 0){
        $consoles = Konsole::whereIn('producent', $producent)->get();
    }else{
        $consoles = Konsole::all();
    }
    return view('konsole', ['consoles' => $consoles]);
}

public function reset() {
    $consoles = Konsole::all();
    return view('konsole', ['consoles' => $consoles]);
}



public function informacje(){
    return view('informacje');
}
}





    


    


  

