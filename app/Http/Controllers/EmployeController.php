<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Competence;

class EmployeController extends Controller
{
    public function index()
    {
        
        $employes = Employe::with('competences')->get();
        return view('employes.index', compact('employes'));
    }

    public function create()
    {
        
        $competences = Competence::all();
        return view('employes.create', compact('competences'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'email' => 'required|email|unique:employes',
            'competences' => 'array',
            'competences.*' => 'exists:competences,id',
        ]);

        
        $employe = Employe::create($validatedData);

        
        if ($request->has('competences')) {
            $employe->competences()->attach($request->input('competences'));
        }

        return redirect()->route('employes.index');
    }

    public function show($id)
    {
        
        $employe = Employe::with('competences')->findOrFail($id);
        return view('employes.show', compact('employe'));
    }

    public function edit($id)
    {
        
        $employe = Employe::findOrFail($id);
        $competences = Competence::all();
        return view('employes.edit', compact('employe', 'competences'));
    }

    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'email' => 'required|email|unique:employes,email,' . $id,
            'competences' => 'array',
            'competences.*' => 'exists:competences,id',
        ]);

        
        $employe = Employe::findOrFail($id);
        $employe->update($validatedData);

        
        if ($request->has('competences')) {
            $employe->competences()->sync($request->input('competences'));
        } else {
            $employe->competences()->sync([]); 
        }

        return redirect()->route('employes.index');
    }

    public function destroy($id)
    {
        
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return redirect()->route('employes.index');
    }
}
