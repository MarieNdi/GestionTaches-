<!DOCTYPE html>
<html>
<head>
    <title>Afficher la Compétence</title>
</head>
<body>
    <h1>Détails de la Compétence</h1>
    <p><strong>Nom :</strong> {{ $competence->nom }}</p>

    <a href="{{ route('competences.index') }}">Retour à la liste</a>
    <a href="{{ route('competences.edit', $competence->id) }}">Modifier</a>

    <form action="{{ route('competences.destroy', $competence->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
</body>
</html>
