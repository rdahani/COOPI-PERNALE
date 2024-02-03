<?php

namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\BanqueRequest;
use App\Models\Settings\Banque;
use Illuminate\Http\Request;

class BanqueController extends Controller
{
    public function index()
    {
        $banques = Banque::all();
        return view('Settings.Banque.index', compact('banques'));
    }
    public function addform(){
        $banque = new Banque();
        return view('Settings.Banque.form' , compact('banque'));
    }
    public function editForm(Banque $banque)
    {
        return view('Settings.Banque.form', compact('banque'));
    }

    public function add (BanqueRequest $request)
    {
        $query = Banque::create($request->all());

        if ($query){
            return redirect()
                ->route('configuration.banque')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été crée avec succès']);
        }else{
            return redirect()
                ->route('configuration.banque')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }

    public function edit (AnneeRequest $request, Banque $banque)
    {
        $validated = $request->validated();
        $query = $banque->update($request->all());

        if ($query){
            return redirect()
                ->route('configuration.banque')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été modifié avec succès']);
        }else{
            return redirect()
                ->route('configuration.banque')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
    public function delete (Banque $banque)
    {

        $query = $banque->delete();

        if ($query){
            return redirect()
                ->route('configuration.banque')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été supprimé avec succès']);
        }else{
            return redirect()
                ->route('configuration.banque')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
}
