<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create($histoireId) {
        $histoire = Histoire::findOrFail($histoireId);

        return view('chapitre.create', [
            'histoire' => $histoire,
        ]);
    }

    public function store(Request $request, $histoireId) {
        $request->validate([
            'titre' => 'required|string|max:255',
            'titrecourt' => 'required|string',
            'texte' => 'required|string',
        ]);

        $chapitre = new Chapitre([
            'titre' => $request->input('titre'),
            'titrecourt' => $request->input('titrecourt'),
            'texte' => $request->input('texte'),
            'histoire_id' => $histoireId,
            'premier' => $request->input('premier', false),
        ]);

        $chapitre->save();

        return redirect()->route('chapitre.show', [$histoireId, $chapitre->id]);
    }


}
