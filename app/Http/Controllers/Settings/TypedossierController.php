<?php

namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypedossierRequest;
use App\Models\Settings\Type_dossier;
use Illuminate\Http\Request;

class TypedossierController extends Controller
{
    public function index()
    {
        $typedossiers = Type_dossier::all();
        return view('Settings.Type_dossier.index', compact('typedossiers'));
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
