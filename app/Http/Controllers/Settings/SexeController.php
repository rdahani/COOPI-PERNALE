<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\SexeRequest;
use App\Models\Settings\Sexe;
use Illuminate\Http\Request;

class SexeController extends Controller
{
    public function index()
    {
        $sexes = Sexe::all();
        return view('Settings.Sexe.index', compact('sexes'));
    }

    public function addForm()
    {
        $sexe = new Sexe();
        return view('Settings.Sexe.form' , compact('sexe'));
    }

    public function editForm(Sexe $sexe)
    {
        return view('Settings.Sexe.form', compact('sexe'));
    }

    public function add (SexeRequest $request)
    {
        $query = Sexe::create($request->all());

        if ($query){
            return redirect()
                ->route('configuration.sexe')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été crée avec succès']);
        }else{
            return redirect()
                ->route('configuration.sexe')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }

    public function edit (SexeRequest $request, Sexe $sexe)
    {
        $validated = $request->validated();
        $query = $sexe->update($request->all());

        if ($query){
            return redirect()
                ->route('configuration.sexe')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été modifié avec succès']);
        }else{
            return redirect()
                ->route('configuration.sexe')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
    public function delete (Sexe $sexe)
    {

        $query = $sexe->delete();

        if ($query){
            return redirect()
                ->route('configuration.sexe')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été supprimé avec succès']);
        }else{
            return redirect()
                ->route('configuration.sexe')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
}
