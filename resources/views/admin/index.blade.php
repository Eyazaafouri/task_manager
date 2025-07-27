<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
   

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="/css/admin.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    <div class="container mt-4">
         <div class="header d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Bienvenue Admin</h2>
    <a href="{{ url('/logout') }}" class="btn-logout">Se déconnecter</a>
</div>


        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <h2 class="mb-4">Liste des utilisateurs</h2>

        <form method="GET" action="{{ route('admin.index') }}" class="mb-3 d-flex gap-2">
            <input type="text" name="search" class="form-control" placeholder="Rechercher par nom ou email" value="{{ $search ?? '' }}">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>

        @if($users->count())
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.user.tasks', $user->id) }}" class="btn btn-info btn-sm">Voir les tâches</a>
                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#assignModal{{ $user->id }}">
                                    Assigner une tâche
                                </button>
                            </td>
                        </tr>

                 
                        <div class="modal fade" id="assignModal{{ $user->id }}" tabindex="-1" aria-labelledby="assignModalLabel{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.assign.task', $user->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="assignModalLabel{{ $user->id }}">Assigner une tâche à {{ $user->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="title{{ $user->id }}" class="form-label">Titre</label>
                                                <input type="text" name="title" id="title{{ $user->id }}" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description{{ $user->id }}" class="form-label">Description</label>
                                                <textarea name="description" id="description{{ $user->id }}" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Assigner</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">Aucun utilisateur enregistré.</div>
        @endif
    </div>
</body>
</html>
