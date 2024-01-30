<?php

namespace App\Models;

use App\Models\Settings\Annee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeRelation extends Model
{
    use HasFactory;


    public function annee()
    {
        $this->belongsTo(Annee::class);
    }
}
