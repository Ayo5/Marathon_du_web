<?php

namespace App\Http\Controllers;

use App\Models\Chapitre;
use App\Models\Histoire;
use Illuminate\Http\Request;

class ChapitreController extends Controller
{
    public function show(int $id) {
        $histoire = Histoire::find($id);
        $chapitre = Chapitre::where('histoire_id', $id)->get()->first();

        return view('chapitre.show', ['chapitre' => $chapitre, 'histoire' => $histoire]);
    }


}
