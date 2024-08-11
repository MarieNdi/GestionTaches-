<!DOCTYPE html>
<html>
<head>
    <title>Détails de la Tâche</title>
</head>
<body>
    <h1>Détails de la Tâche</h1>
    <table>
        <tr>
            <th>ID :</th>
            <td>{{ $tache->id }}</td>
        </tr>
        <tr>
            <th>Nom :</th>
            <td>{{ $tache->nom }}</td>
        </tr>
        <tr>
            <th>Description :</th>
            <td>{{ $tache->description }}</td>
        </tr>
        <tr>
            <th>Complexité :</th>
            <td>{{ $tache->complexite }}</td>
        </tr>
        <tr>
            <th>Employé :</th>
            <td>{{ $tache->employe->nom }}</td>
        </tr>
        <tr>
            <th>Statut :</th> <!-- Ajout de l'affichage du statut -->
            <td>{{ $tache->status }}</td>
        </tr>
    </table>

    <a href="{{ route('taches.index') }}">Retour à la liste</a>
    <a href="{{ route('taches.edit', $tache->id) }}">Modifier</a>
    <form action="{{ route('taches.destroy', $tache->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
</body>
</html>
