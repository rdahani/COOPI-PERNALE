<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Type_fonctionRequest;
use App\Models\Settings\Type_fonction;
use Illuminate\Http\Request;

class Type_fonctionController extends Controller
{
    public function index()
    {
        $type_fonctions = Type_fonction::all();
        return view('Settings.Type_fonction.index', compact('type_fonctions'));
    }

    public function addForm()
    {
        $type_fonction = new Type_fonction();
        return view('Settings.Type_fonction.form' , compact('type_fonction'));
    }

    public function editForm(Type_fonction $type_fonction)
    {
        return view('Settings.Type_fonction.form', compact('type_fonction'));
    }

    public function add (Type_fonctionRequest $request)
    {
        $query = Type_fonction::create($request->all());

        if ($query){
            return redirect()
                ->route('configuration.type_fonction')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été crée avec succès']);
        }else{
            return redirect()
                ->route('configuration.type_fonction')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }

    public function edit (Type_fonctionRequest $request, Type_fonction $type_fonction)
    {
        $validated = $request->validated();
        $query = $type_fonction->update($request->all());

        if ($query){
            return redirect()
                ->route('configuration.type_fonction')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été modifié avec succès']);
        }else{
            return redirect()
                ->route('configuration.type_fonction')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
    public function delete (Type_fonction $type_fonction)
    {

        $query = $type_fonction->delete();

        if ($query){
            return redirect()
                ->route('configuration.type_fonction')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été supprimé avec succès']);
        }else{
            return redirect()
                ->route('configuration.type_fonction')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
}
