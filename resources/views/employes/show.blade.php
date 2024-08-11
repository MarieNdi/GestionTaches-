<!DOCTYPE html>
<html>
<head>
    <title>Détails de l'Employé</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        p {
            margin-bottom: 10px;
        }
        .actions {
            text-align: center;
            margin-top: 20px;
        }
        .actions a, .actions form {
            display: inline-block;
            margin: 0 10px;
        }
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c82333;
        }
        a {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Détails de l'Employé</h1>
        <p><strong>ID :</strong> {{ $employe->id }}</p>
        <p><strong>Nom :</strong> {{ $employe->nom }}</p>
        <p><strong>Email :</strong> {{ $employe->email }}</p>
        <p><strong>Compétences :</strong> 
            @if($employe->competences->isEmpty())
                Aucune compétence associée.
            @else
                <ul>
                    @foreach($employe->competences as $competence)
                        <li>{{ $competence->nom }}</li>
                    @endforeach
                </ul>
            @endif
        </p>
        <div class="actions">
            <a href="{{ route('employes.edit', $employe->id) }}">Modifier</a>
            <form action="{{ route('employes.destroy', $employe->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
            <a href="{{ route('employes.index') }}">Retour à la liste</a>
        </div>
    </div>
</body>
</html>
