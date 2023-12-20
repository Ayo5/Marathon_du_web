<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
     public function index(){
         $histoires = Histoire::all();
          return view('welcome', ['histoires'=>$histoires]);
     }

    public function show(int $id): View {
        $histoire = Histoire::find($id);
        $avis =Avis::where('histoire_id', $id)->get();
        return view('show', ['histoires' => $histoire, 'avis'=>$avis]);
    }

     public function apropos() {
          return view('home.apropos', ['titre'=>'A propos']);
     }

     public function contact() {
          return view('home.contact', ['titre'=>'Contact']);
     }


}
