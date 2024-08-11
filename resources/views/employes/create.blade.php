<!DOCTYPE html>
<html>
<head>
    <title>Créer un Nouvel Employé</title>
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
    <h1>Créer un Nouvel Employé</h1>
    <form action="{{ route('employes.store') }}" method="POST">
        @csrf
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="competences">Compétences:</label>
        <select id="competences" name="competences[]" multiple>
            @foreach ($competences as $competence)
                <option value="{{ $competence->id }}">{{ $competence->nom }}</option>
            @endforeach
        </select>

        <button type="submit">Créer</button>
    </form>
</body>
</html>
