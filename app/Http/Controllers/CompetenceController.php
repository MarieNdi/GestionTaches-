<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    public function index()
    {
        $competences = Competence::all();
        return view('competences.index', compact('competences'));
    }

    public function create()
    {
        return view('competences.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
        ]);

        Competence::create($validatedData);
        return redirect()->route('competences.index');
    }

    public function show($id)
    {
        $competence = Competence::findOrFail($id);
        return view('competences.show', compact('competence'));
    }

    public function edit($id)
    {
        $competence = Competence::findOrFail($id);
        return view('competences.edit', compact('competence'));
    }

    public function update(Request $request, $id)
    {
        $competence = Competence::findOrFail($id);

        $validatedData = $request->validate([
            'nom' => 'required|max:255',
        ]);

        $competence->update($validatedData);
        return redirect()->route('competences.index');
    }

    public function destroy($id)
    {
        $competence = Competence::findOrFail($id);
        $competence->delete();
        return redirect()->route('competences.index');
    }
}

