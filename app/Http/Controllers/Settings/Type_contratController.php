<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Type_contratRequest;
use App\Models\Settings\Type_contrat;
use Illuminate\Http\Request;

class Type_contratController extends Controller
{
    public function index()
    {
        $type_contrats = Type_contrat::all();
        return view('Settings.Type_contrat.index', compact('type_contrats'));
    }

    public function addForm()
    {
        $type_contrat = new Type_contrat();
        return view('Settings.Type_contrat.form' , compact('type_contrat'));
    }

    public function editForm(Type_contrat $type_contrat)
    {
        return view('Settings.Type_contrat.form', compact('type_contrat'));
    }

    public function add (Type_contratRequest $request)
    {
        $query = Type_contrat::create($request->all());

        if ($query){
            return redirect()
                ->route('configuration.type_contrat')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été crée avec succès']);
        }else{
            return redirect()
                ->route('configuration.type_contrat')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }

    public function edit (Type_contratRequest $request, Type_contrat $type_contrat)
    {
        $validated = $request->validated();
        $query = $type_contrat->update($request->all());

        if ($query){
            return redirect()
                ->route('configuration.type_contrat')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été modifié avec succès']);
        }else{
            return redirect()
                ->route('configuration.type_contrat')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
    public function delete (Type_contrat $type_contrat)
    {

        $query = $type_contrat->delete();

        if ($query){
            return redirect()
                ->route('configuration.type_contrat')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été supprimé avec succès']);
        }else{
            return redirect()
                ->route('configuration.type_contrat')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
}
