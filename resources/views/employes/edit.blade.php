<!DOCTYPE html>
<html>
<head>
    <title>Modifier l'Employé</title>
    <style>
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, select, button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Modifier l'Employé</h1>
    <form action="{{ route('employes.update', $employe->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="{{ $employe->nom }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $employe->email }}" required>

        <label for="competences">Compétences:</label>
        <select id="competences" name="competences[]" multiple>
            @foreach ($competences as $competence)
                <option value="{{ $competence->id }}" 
                    @if(in_array($competence->id, $employe->competences->pluck('id')->toArray())) selected @endif>
                    {{ $competence->nom }}
                </option>
            @endforeach
        </select>

        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
