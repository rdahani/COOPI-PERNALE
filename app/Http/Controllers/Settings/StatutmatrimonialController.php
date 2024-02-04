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
        $statutmatrimonial = Statut_matrimonial::all();
        return view('Settings.Statut_Type_dossier.index', compact('statutmatrimonial'));
    }
    public function addform(){
        $typedossier = new Type_dossier();
        return view('Settings.Type_dossier.form' , compact('typedossier'));
    }
    public function editForm(Type_dossier $typedossier)
    {
        return view('Settings.Type_dossier.form', compact('typedossier'));
    }

    public function add (TypedossierRequest $request)
    {
        $query = Type_dossier::create($request->all());

        if ($query){
            return redirect()
                ->route('configuration.typedossier')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été crée avec succès']);
        }else{
            return redirect()
                ->route('configuration.typedossier')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }

    public function edit (TypedossierRequest $request, Type_dossier $typedossier)
    {
        $validated = $request->validated();
        $query = $typedossier->update($request->all());

        if ($query){
            return redirect()
                ->route('configuration.typedossier')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été modifié avec succès']);
        }else{
            return redirect()
                ->route('configuration.typedossier')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
    public function delete (Type_dossier $typedossier)
    {

        $query = $typedossier->delete();

        if ($query){
            return redirect()
                ->route('configuration.typedossier')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été supprimé avec succès']);
        }else{
            return redirect()
                ->route('configuration.typedossier')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
}
