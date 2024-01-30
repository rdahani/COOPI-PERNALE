<?php

namespace App\Models\Settings;

use App\Models\AnneeRelation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle'
    ];

    public function anneeRelation()
    {
        $this->hasMany(AnneeRelation::class);
    }
}
