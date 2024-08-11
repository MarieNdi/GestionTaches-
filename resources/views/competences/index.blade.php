<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compétence Index</title>
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

                <h2>Liste des Compétences</h2>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <a href="{{ route('competences.create') }}" class="btn btn-primary">Ajouter une Compétence</a>
                        <a href="{{ route('employes.index') }}" class="btn btn-secondary">Aller aux Employés</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competences as $competence)
                            <tr>
                                <td>{{ $competence->id }}</td>
                                <td>{{ $competence->nom }}</td>
                                <td>
                                    <a href="{{ route('competences.edit', $competence->id) }}" class="btn btn-warning">Éditer</a>
                                    <form action="{{ route('competences.destroy', $competence->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette compétence ?');">Supprimer</button>
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
