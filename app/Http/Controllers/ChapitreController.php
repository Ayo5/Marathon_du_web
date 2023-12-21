<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;

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




}
