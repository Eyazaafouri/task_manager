<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes tâches</title>
   <link href="/css/user.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Bienvenue {{ auth()->user()->name }}</h2>
            <a href="{{ url('/logout') }}" class="btn-logout">Se déconnecter</a>
        </div>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <h3>Mes Tâches</h3>

<div class="task-columns">
   
    <div class="task-column">
        <h4> En attente</h4>
        @forelse($tasks->where('is_done', false) as $task)
            <div class="task-item">
                <div class="task-title">{{ $task->title }}</div>
                <div class="task-description">{{ $task->description }}</div>
                <div class="task-status status-pending">En attente</div>
                <div class="task-actions">
                    <form method="POST" action="{{ url('/user/mark-done/' . $task->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Marquer comme fait</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <p>Aucune tâche en attente</p>
            </div>
        @endforelse
    </div>

    
    <div class="task-column">
        <h4> Tâches faites</h4>
        @forelse($tasks->where('is_done', true) as $task)
            <div class="task-item">
                <div class="task-title">{{ $task->title }}</div>
                <div class="task-description">{{ $task->description }}</div>
                <div class="task-status status-done">Fait</div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-state-icon">📭</div>
                <p>Aucune tâche terminée</p>
            </div>
        @endforelse
    </div>
</div>

    </div>
</body>
</html>