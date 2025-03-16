<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réclamations Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Liste des réclamations</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reclamations as $reclamation)
                    <tr>
                        <td>{{ $reclamation->id }}</td>
                        <td>{{ $reclamation->nom }}</td>
                        <td>{{ $reclamation->prenom }}</td>
                        <td>{{ $reclamation->telephone }}</td>
                        <td>{{ $reclamation->email }}</td>
                        <td>{{ $reclamation->type }}</td>
                        <td>{{ $reclamation->message }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
