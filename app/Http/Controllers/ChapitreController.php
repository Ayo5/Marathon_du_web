<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Comment;
use App\Models\Histoire;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{

    public function premier($histoireId)
    {
        $chapitre = Chapitre::where('histoire_id', $histoireId)->orderBy('id', 'asc')->first();
        return view('chapitre.show', ['chapitre' => $chapitre]);
    }
    public function show(int $id) {
        $histoire = Histoire::find($id);
        $chapitre = Chapitre::where('histoire_id', $id)->get()->first();

        return view('chapitre.show', ['chapitre' => $chapitre, 'histoire' => $histoire]);
    }

//    public function store(Request $request, $histoireId)
//    {
//        $histoire = Histoire::find($histoireId);
//
//        $chapitre = new Chapitre;
//        $chapitre->titre = $request->titre;
//        $chapitre->titrecourt = $request->titrecourt;
//        $chapitre->texte = $request->texte;
//        $chapitre->media = $request->media;
//        $chapitre->question = $request->question;
//        $chapitre->premier = $request->premier;
//        $chapitre->histoire()->associate($histoire);
//        $chapitre->save();
//
//        return redirect()->route('chapitre.show', ['id' => $chapitre->id]);
//    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'texte' => 'required',
            'histoire_id' => 'required|exists:histoires,id',
            'titrecourt' => 'required|max:255', // Ajoutez les règles de validation appropriées
            'media' => 'nullable|string', // Vous devrez peut-être ajuster selon vos besoins
            'question' => 'nullable|string', // Vous devrez peut-être ajuster selon vos besoins
            'premier' => 'required|boolean',
        ]);

        Chapitre::create([
            'titre' => $request->input('titre'),
            'texte' => $request->input('texte'),
            'histoire_id' => $request->input('histoire_id'),
            'titrecourt' => $request->input('titrecourt'),
            'media' => $request->input('media'),
            'question' => $request->input('question'),
            'premier' => $request->input('premier'),
        ]);

        return redirect()->route('home.show', ['id' => $request->input('histoire_id')])
            ->with('success', 'Chapitre ajouté avec succès');
    }
}
