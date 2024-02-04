<?php

namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\StatutmatrimonialRequest;
use App\Models\Settings\Statut_matrimonial;
use Illuminate\Http\Request;

class StatutmatrimonialController extends Controller
{
    public function index()
    {
        $statutmatrimonials = Statut_matrimonial::all();
        return view('Settings.Statut_matrimonial.index', compact('statutmatrimonials'));
    }
    public function addform(){
        $statutmatrimonial = new Statut_matrimonial();
        return view('Settings.Statut_matrimonial.form' , compact('statutmatrimonial'));
    }
    public function editForm(Statut_matrimonial $statutmatrimonial)
    {
        return view('Settings.Statut_matrimonial.form', compact('statutmatrimonial'));
    }

    public function add (StatutmatrimonialRequest $request)
    {
        $query = Statut_matrimonial::create($request->all());

        if ($query){
            return redirect()
                ->route('configuration.statutmatrimonial')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été crée avec succès']);
        }else{
            return redirect()
                ->route('configuration.statutmatrimonial')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }

    public function edit (StatutmatrimonialRequest $request, Statut_matrimonial $typedossier)
    {
        $validated = $request->validated();
        $query = $typedossier->update($request->all());

        if ($query){
            return redirect()
                ->route('configuration.statutmatrimonial')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été modifié avec succès']);
        }else{
            return redirect()
                ->route('configuration.statutmatrimonial')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
    public function delete (Statut_matrimonial $typedossier)
    {

        $query = $typedossier->delete();

        if ($query){
            return redirect()
                ->route('configuration.statutmatrimonial')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été supprimé avec succès']);
        }else{
            return redirect()
                ->route('configuration.statutmatrimonial')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
}
