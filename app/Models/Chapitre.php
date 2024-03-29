<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model {
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'titre',
        'texte',
        'titrecourt',
        'histoire_id',
        'premier',
        'question'
    ];

    public function histoire() {
        return $this->belongsTo(Histoire::class);
    }

    public function suivants() {
        return $this->belongsToMany(Chapitre::class, "suites",
            "chapitre_source_id", "chapitre_destination_id")
            ->wherePivot("chapitre_source_id", $this->id)
            ->withPivot('reponse');
    }

    public function precedents() {
        return $this->belongsToMany(Chapitre::class, "suites",
            "chapitre_source_id", "chapitre_destination_id")
            ->wherePivot("chapitre_destination_id", $this->id)
            ->withPivot('reponse');
    }

    public function premier() {
        return $this->chapitres()->where("premier", true)->first();
    }

    public function chapitrePremier() {
        return $this->hasOne(Histoire::class, 'histoire_id')->where('premier', true);
    }


}
