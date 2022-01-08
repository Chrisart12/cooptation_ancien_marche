<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function offres()
    {
        return $this->hasMany("App\Model\Offre", 'categorie_id');
    }
}
