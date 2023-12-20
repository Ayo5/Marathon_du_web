<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Genre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        if (!isset($cat)) {
            if (!isset($value)) {
                $histoires = Histoire::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $histoires = Histoire::whereHas('genre', function ($query) use ($value) {
                    $query->where('label', $value);
                })->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);
            }
        } else {
            if ($cat == 'All') {
                $histoires = Histoire::all();
                Cookie::expire('cat');
            } else {
                $histoires = Histoire::whereHas('genre', function ($query) use ($cat) {
                    $query->where('label', $cat);
                })->get();
                Cookie::queue('cat', $cat, 10);
            }
        }

        $genres = Genre::distinct('label')->pluck('label');

        return view('welcome', ['histoires' => $histoires, 'genres' => $genres, 'cat' => $cat]);
    }

    public function create() {
        $genres = Genre::all();
        return view('create', ['genres' => $genres]);
    }


    public function store(Request $request) {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'photo' => 'required|string',
            'pitch' => 'required|string',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $active = optional($request->input('active'))->has('active') ? true : false;

        $histoire = Histoire::create([
            'titre' => $validatedData['titre'],
            'photo' => $validatedData['photo'],
            'pitch' => $validatedData['pitch'],
            'genre_id' => $validatedData['genre_id'],
            'active' => $active,

        ]);

        return redirect()->route('show', $histoire->id)
            ->with('success', 'L\'histoire a été créée avec succès.');
    }

    public function show(int $id): View {
        $histoire = Histoire::find($id);
        $avis =Avis::where('histoire_id', $id)->get();
        return view('show', ['histoire' => $histoire, 'avis'=>$avis]);
    }
     public function apropos() {
          return view('home.apropos', ['titre'=>'A propos']);
     }

     public function contact() {
          return view('home.contact', ['titre'=>'Contact']);
     }
}
