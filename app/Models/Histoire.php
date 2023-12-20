<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Histoire extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function chapitres() {
        return $this->hasMany(Chapitre::class);
    }

    /**
     * @return Model|HasMany|object|null
     */
    public function premier() {
        return $this->chapitres()->where("premier", true)->first();
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function avis() {
        return $this->hasMany(Avis::class);
    }

    public function terminees() {
        return $this->belongsToMany(User::class, "terminees", "histoire_id", "user_id")->withPivot("nombre");
    }

    public function dernierChapitre() {
        return $this->chapitres()->latest()->first();
    }

    public function scopeTerminee(Builder $query) {
        return $query->whereHas('terminees', function ($query) {
            $query->where('user_id', auth()->id());
        });
    }

    protected $fillable = ['titre', 'pitch', 'photo', 'genre_id', 'active'];

}
