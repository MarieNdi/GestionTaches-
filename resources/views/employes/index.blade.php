<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Employés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
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

                <h2>Liste des Employés</h2>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <a href="{{ route('employes.create') }}" class="btn btn-primary">Ajouter un Employé</a>
                        <a href="{{ route('taches.index') }}" class="btn btn-secondary">Aller aux Tâches</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Compétences</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employes as $employe)
                            <tr>
                                <td>{{ $employe->id }}</td>
                                <td>{{ $employe->nom }}</td>
                                <td>{{ $employe->email }}</td>
                                <td>
                                    @foreach($employe->competences as $competence)
                                        {{ $competence->nom }}@if (!$loop->last), @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('employes.show', $employe->id) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('employes.destroy', $employe->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet employé ?');">Supprimer</button>
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
