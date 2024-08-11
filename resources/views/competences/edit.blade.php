<!DOCTYPE html>
<html>
<head>
    <title>Modifier une Compétence</title>
</head>
<body>
    <h1>Modifier une Compétence</h1>
    <form action="{{ route('competences.update', $competence->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="{{ $competence->nom }}" required>

        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('competences.index') }}">Retour à la liste</a>
</body>
</html>
