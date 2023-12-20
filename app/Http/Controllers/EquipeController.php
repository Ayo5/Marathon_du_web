<?php

namespace App\Http\Controllers;

class EquipeController extends Controller
{
    public function index(){
        $equipe= [
            'nomEquipe'=>"Lucky Seven",
            'logo'=>"/images/logo.jpg",
            'slogan'=>"....",
            'localisation'=>"Salle 1X",
            'membres'=> [
                [ 'nom'=>"Djedid",'prenom'=>"Adel", 'image'=>"nomFichier", 'fonctions'=>["développer", "concepteur"] ],
                [ 'nom'=>"Dai",'prenom'=>"Abdelkader", 'image'=>"nomFichier", 'fonctions'=>["développer", "concepteur"] ],
                [ 'nom'=>"Vanbandon",'prenom'=>"Théo", 'image'=>"nomFichier", 'fonctions'=>["validateur","développer", "concepteur"] ],
                [ 'nom'=>"Grasso",'prenom'=>"Antoine", 'image'=>"nomFichier", 'fonctions'=>["développer", "concepteur"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipe' => $equipe]);
    }
}
