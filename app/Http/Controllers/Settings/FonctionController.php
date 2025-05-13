<?php

namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\FonctionRequest;
use App\Models\Settings\Fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    public function index()
    {
        $fonctions = Fonction::all();
        return view('Settings.Fonction.index', compact('fonctions'));
    }
    public function addform(){
        $fonction = new Fonction();
        return view('Settings.Fonction.form' , compact('fonction'));
    }
    public function editForm(Fonction $fonction)
    {
        return view('Settings.Fonction.form', compact('fonction'));
    }

    public function add (fonctionRequest $request)
    {
        $query = Fonction::create($request->all());

        if ($query){
            return redirect()
                ->route('configuration.fonction')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été crée avec succès']);
        }else{
            return redirect()
                ->route('configuration.fonction')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }

    public function edit (FonctionRequest $request, Fonction $fonction)
    {
        $validated = $request->validated();
        $query = $fonction->update($request->all());

        if ($query){
            return redirect()
                ->route('configuration.fonction')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été modifié avec succès']);
        }else{
            return redirect()
                ->route('configuration.fonction')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
    public function delete (Fonction $fonction)
    {

        $query = $fonction->delete();

        if ($query){
            return redirect()
                ->route('configuration.fonction')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été supprimé avec succès']);
        }else{
            return redirect()
                ->route('configuration.fonction')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
}
