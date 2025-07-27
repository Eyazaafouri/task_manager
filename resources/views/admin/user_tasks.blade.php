<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tâches de {{ $user->name }}</title>
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="user-tasks-header">
            <h2>Tâches de {{ $user->name }}</h2>
        </div>

        <ul class="tasks-list">
            @forelse($tasks as $task)
                <li class="task-item">
                    <span class="task-title"><strong>Titre :</strong> {{ $task->title }}</span><br>
                    <span class="task-date"><strong>Crée le :</strong> {{ $task->created_at->format('d/m/Y') }}</span><br>
                    <span class="task-status {{ $task->is_done ? 'status-done' : 'status-pending' }}">
                        {{ $task->is_done ? ' Fait' : ' En attente' }}
                    </span>
                </li>
            @empty
                <div class="empty-tasks">
                    Aucune tâche trouvée pour cet utilisateur
                </div>
            @endforelse
        </ul>

        <a href="{{ route('admin.index') }}" class="back-link">
            Retour à la liste des utilisateurs
        </a>
    </div>
</body>
</html>
