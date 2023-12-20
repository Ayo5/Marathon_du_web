<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function index(){
         $histoires = Histoire::all();
          return view('welcome', ['histoires'=>$histoires]);
     }
     public function apropos() {
          return view('home.apropos', ['titre'=>'A propos']);
     }

     public function contact() {
          return view('home.contact', ['titre'=>'Contact']);
     }
}
