<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <h2>Liste des Tâches</h2>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <a href="{{ route('taches.create') }}" class="btn btn-primary">Ajouter une Tâche</a>
                        <a href="{{ route('employes.index') }}" class="btn btn-secondary">Aller aux Employés</a>
                        <a href="{{ route('competences.index') }}" class="btn btn-secondary">Aller aux Compétences</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Employé</th>
                            <th>Statut</th> <!-- Ajout de la colonne Statut -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taches as $tache)
                            <tr>
                                <td>{{ $tache->id }}</td>
                                <td>{{ $tache->nom }}</td>
                                <td>{{ $tache->description }}</td>
                                <td>{{ $tache->employe->nom ?? 'N/A' }}</td>
                                <td>{{ $tache->status }}</td> <!-- Affichage du statut -->
                                <td>
                                    <a href="{{ route('taches.show', $tache->id) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('taches.edit', $tache->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('taches.destroy', $tache->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cette tâche ?');">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
