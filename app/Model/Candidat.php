<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    protected $fillable = ["id", "firstname", "lastname", "poste", "reference", "offre_id"];

    public function offre()
    {
        return $this->belongsTo("App\Model\Offre");
    }

}
