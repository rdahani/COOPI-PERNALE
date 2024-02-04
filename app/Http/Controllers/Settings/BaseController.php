<?php

namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use App\Http\Requests\BaseRequest;
use App\Models\Settings\Base;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        $bases = Base::all();
        return view('Settings.Base.index', compact('bases'));
    }
    public function addform(){
        $base = new Base();
        return view('Settings.Base.form' , compact('base'));
    }
    public function editForm(Base $base)
    {
        return view('Settings.Base.form', compact('base'));
    }

    public function add (BaseRequest $request)
    {
        $query = Base::create($request->all());

        if ($query){
            return redirect()
                ->route('configuration.base')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été crée avec succès']);
        }else{
            return redirect()
                ->route('configuration.base')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }

    public function edit (BaseRequest $request, Base $base)
    {
        $validated = $request->validated();
        $query = $base->update($request->all());

        if ($query){
            return redirect()
                ->route('configuration.base')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été modifié avec succès']);
        }else{
            return redirect()
                ->route('configuration.base')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
    public function delete (Base $base)
    {

        $query = $base->delete();

        if ($query){
            return redirect()
                ->route('configuration.base')
                ->with('notification', ['type' => 'success', 'message' => 'La ressource à été supprimé avec succès']);
        }else{
            return redirect()
                ->route('configuration.base')
                ->with('notification', ['type' => 'error', 'message' => 'Erreur']);
        }
    }
}
