<!DOCTYPE html>
<html>
<head>
    <title>Modifier une Tâche</title>
</head>
<body>
    <h1>Modifier une Tâche</h1>
    <form action="{{ route('taches.update', $tache->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="{{ $tache->nom }}" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $tache->description }}</textarea>

        <label for="complexite">Complexité:</label>
        <input type="text" id="complexite" name="complexite" value="{{ $tache->complexite }}" required>

        <label for="employe_id">Employé:</label>
        <select id="employe_id" name="employe_id" required>
            @foreach($employes as $employe)
                <option value="{{ $employe->id }}" {{ $employe->id == $tache->employe_id ? 'selected' : '' }}>
                    {{ $employe->nom }}
                </option>
            @endforeach
        </select>

        <label for="status">Statut:</label> <!-- Ajout du champ statut -->
        <select id="status" name="status">
            <option value="en cours" {{ $tache->status == 'en cours' ? 'selected' : '' }}>En cours</option>
            <option value="terminé" {{ $tache->status == 'terminé' ? 'selected' : '' }}>Terminé</option>
            <option value="en attente" {{ $tache->status == 'en attente' ? 'selected' : '' }}>En attente</option>
        </select>

        <button type="submit">Mettre à jour</button>
    </form>
    <a href="{{ route('taches.index') }}">Retour à la liste</a>
</body>
</html>
