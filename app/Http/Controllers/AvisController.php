<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AvisController extends Controller
{
    public function create(int $id): View
    {
        $histoire = Histoire::find($id);
        return view('avis.create', ['histoire' => $histoire]);
    }

    public function edit(int $id)
    {
        $comment = Avis::find($id);
        return view('avis.edit', ['comment' => $comment]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenu' => 'required',
            'user_id' => 'required|exists:users,id',
            'histoire_id' => 'required|exists:histoires,id',
        ]);

        Avis::create([
            'contenu' => $request->input('contenu'),
            'user_id' => $request->input('user_id'),
            'histoire_id' => $request->input('histoire_id'),
        ]);

        return redirect()->route('histoire.show', ['id' => $request->input('histoire_id')])
            ->with('success', 'Commentaire ajouté avec succès');
    }

    public function update(Request $request, int $id)
    {
        $comment = Avis::find($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'text' => 'required',
        ]);

        $comment->title = $request->title;
        $comment->text = $request->text;

        $comment->save();

        return redirect()->route('histoire.show', ['id' => $comment->histoire_id])
            ->with('success', 'Commentaire mis à jour avec succès');
    }

    public function destroy(Request $request, int $id)
    {
        $avis = Avis::find($id);
        $histoireId = $avis->histoire_id;
        $avis->delete();

        if ($request->delete == 'valide') {
            return redirect()->route('histoire.show', ['id' => $histoireId])
                ->with('success', 'Commentaire supprimé avec succès');
        }

        return redirect()->route('histoire.show', ['id' => $histoireId])->with('error', 'Suppression annulée');
    }
}
