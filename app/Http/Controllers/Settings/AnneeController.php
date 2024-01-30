<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnneeRequest;
use App\Models\Settings\Annee;
use Illuminate\Http\Request;

class AnneeController extends Controller
{
    public function index()
    {
        $annees = Annee::all();
        return view('Settings.Annee.index', compact('annees'));
    }

    public function addForm()
    {
        $annee = new Annee();
        return view('Settings.Annee.form' , compact('annee'));
    }

    public function editForm(Annee $annee)
    {
        return view('Settings.Annee.form', compact('annee'));
    }

    public function add (AnneeRequest $request)
    {
        $query = Annee::create($request->all());

        if ($query){
            return redirect()
                ->route('configuration.annee')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été crée avec succès']);
        }else{
            return redirect()
                ->route('configuration.annee')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }

    public function edit (AnneeRequest $request, Annee $annee)
    {
        $validated = $request->validated();
        $query = $annee->update($request->all());

        if ($query){
            return redirect()
                ->route('configuration.annee')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été modifié avec succès']);
        }else{
            return redirect()
                ->route('configuration.annee')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
    public function delete (Annee $annee)
    {

        $query = $annee->delete();

        if ($query){
            return redirect()
                ->route('configuration.annee')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été supprimé avec succès']);
        }else{
            return redirect()
                ->route('configuration.annee')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
}
