<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_dossier extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle'
    ];

}
