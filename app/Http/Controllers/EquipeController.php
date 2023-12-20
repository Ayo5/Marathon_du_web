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
                [ 'nom'=>"Djedid",'prenom'=>"Adel", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur"] ],
                [ 'nom'=>"Dai",'prenom'=>"Abdelkader", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur"] ],
                [ 'nom'=>"Vanbandon",'prenom'=>"Théo", 'image'=>"nomFichier", 'fonctions'=>["validateur","développeur", "concepteur"] ],
                [ 'nom'=>"Grasso",'prenom'=>"Antoine", 'image'=>"nomFichier", 'fonctions'=>["développeur", "concepteur"] ],

                [ 'nom'=>"Courbet",'prenom'=>"Loic", 'image'=>"nomFichier", 'fonctions'=>["UI/UX designer", "Direction artistique"] ],
                [ 'nom'=>"Screve",'prenom'=>"Louis", 'image'=>"nomFichier", 'fonctions'=>["Direction artistique", "Motion designer"] ],
                [ 'nom'=>"Ternois",'prenom'=>"Antonin", 'image'=>"nomFichier", 'fonctions'=>["Direction artistique", "Écrivain"] ],
            ],
            'autres'=>"Autre chose",
        ];
        return view('equipes.index', ['equipe' => $equipe]);
    }
}
