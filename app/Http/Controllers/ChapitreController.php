<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChapitreController extends Controller
{
    public function premier($histoireId)
    {
        $chapitre = Chapitre::where('histoire_id', $histoireId)->orderBy('id', 'asc')->first();
        return view('chapitre.show', ['chapitre' => $chapitre]);
    }
    public function show(int $histoireId, int $id) {
        $chapitre = Chapitre::find($id);

        return view('chapitre.show', [
            'chapitre' => $chapitre
        ]);
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

    public function showSuiteForm($chapitreId)
    {
        $chapitreSource = Chapitre::findOrFail($chapitreId);
        $chapitresDisponibles = Chapitre::where('id', '!=', $chapitreId)->get();

        return view('chapitre.showSuiteForm', compact('chapitreSource', 'chapitresDisponibles'));
    }

    public function storeSuite(Request $request)
    {
        $request->validate([
            'chapitre_source_id' => 'required|exists:chapitres,id',
            'chapitre_destination_id' => 'required|exists:chapitres,id',
            'reponse' => 'required',
        ]);

        DB::table('suites')->insert([
            'chapitre_source_id' => $request->input('chapitre_source_id'),
            'chapitre_destination_id' => $request->input('chapitre_destination_id'),
            'reponse' => $request->input('reponse'),
        ]);
        $histoire = Chapitre::find($request->input('chapitre_source_id'))->histoire;

        return redirect()->route('chapitre.show', ['histoire'=> $histoire ,'id' => $request->input('chapitre_source_id')])
            ->with('success', 'Chapitres liés avec succès');
    }
}
