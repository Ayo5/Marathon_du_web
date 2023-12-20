<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(){
        $equipe= [
            'nomEquipe'=>"L'equipe de l'année !",
            'logo'=>"referenceDuFichier",
            'slogan'=>"....",
            'localisation'=>"numero de la salle",
            'membres'=> [
                [ 'nom'=>"nom",'prenom'=>"prenom", 'image'=>"nomFichier", 'fonctions'=>["validateur","développer", "concepteur"] ],
                [ 'nom'=>"nom",'prenom'=>"prenom", 'image'=>"nomFichier", 'fonctions'=>["validateur","développer", "concepteur"] ],
                [ 'nom'=>"nom",'prenom'=>"prenom", 'image'=>"nomFichier", 'fonctions'=>["validateur","développer", "concepteur"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipe' => $equipe]);
    }
}