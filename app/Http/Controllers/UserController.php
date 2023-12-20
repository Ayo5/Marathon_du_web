<?php

namespace App\Http\Controllers;

use App\Models\Histoire;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index(int $idCurr) {
        $user = User::find($idCurr);

        if ($user) {
            $terminees = $user->terminees()->get();
            $nombreOeuvresTerminees = $terminees->count();

            $avis = $user->avis()->get();

            $oeuvres = Histoire::all();
            return view('user.index', ['oeuvres' => $oeuvres, 'avis' => $avis, 'terminees' => $terminees, 'user' => $user, 'nombreOeuvresTerminees' => $nombreOeuvresTerminees]);
        } else {
            // Gérer le cas où l'utilisateur n'est pas trouvé
            // Par exemple, rediriger vers une page d'erreur
            return redirect()->route('error.page');
        }
    }
}
