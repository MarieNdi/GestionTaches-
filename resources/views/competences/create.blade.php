<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une Compétence</title>
</head>
<body>
    <h1>Ajouter une Compétence</h1>
    <form action="{{ route('competences.store') }}" method="POST">
        @csrf
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <button type="submit">Créer</button>
    </form>
    <a href="{{ route('competences.index') }}">Retour à la liste</a>
</body>
</html>
