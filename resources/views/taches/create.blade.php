<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une Tâche</title>
</head>
<body>
    <h1>Ajouter une Tâche</h1>
    <form action="{{ route('taches.store') }}" method="POST">
        @csrf
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="complexite">Complexité:</label>
        <input type="text" id="complexite" name="complexite" required>

        <label for="employe_id">Employé:</label>
        <select id="employe_id" name="employe_id" required>
            @foreach($employes as $employe)
                <option value="{{ $employe->id }}">{{ $employe->nom }}</option>
            @endforeach
        </select>

        <label for="status">Statut:</label> <!-- Ajout du champ statut -->
        <select id="status" name="status">
            <option value="en cours">En cours</option>
            <option value="terminé">Terminé</option>
            <option value="en attente">En attente</option>
        </select>

        <button type="submit">Créer</button>
    </form>
    <a href="{{ route('taches.index') }}">Retour à la liste</a>
</body>
</html>
