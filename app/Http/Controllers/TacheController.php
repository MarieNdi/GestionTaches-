<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\Employe;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        $taches = Tache::all();
        return view('taches.index', compact('taches'));
    }

    public function create()
    {
        $employes = Employe::all();
        return view('taches.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'nullable',
            'complexite' => 'required|integer|min:1',
            'employe_id' => 'required|exists:employes,id',
        ]);

        Tache::create($validatedData);
        return redirect()->route('taches.index');
    }

    public function show($id)
    {
        $tache = Tache::findOrFail($id);
        return view('taches.show', compact('tache'));
    }

    public function edit($id)
    {
        $tache = Tache::findOrFail($id);
        $employes = Employe::all();
        return view('taches.edit', compact('tache', 'employes'));
    }

    public function update(Request $request, $id)
    {
        $tache = Tache::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'nullable',
            'complexite' => 'required|integer|min:1',
            'employe_id' => 'required|exists:employes,id',
        ]);

        $tache->update($validatedData);
        return redirect()->route('taches.index');
    }

    public function destroy($id)
    {
        $tache = Tache::findOrFail($id);
        $tache->delete();
        return redirect()->route('taches.index');
    }
}

