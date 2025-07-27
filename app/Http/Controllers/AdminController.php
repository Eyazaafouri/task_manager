<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class AdminController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $users = User::where('role', 'user')
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        })
        ->get();

    return view('admin.index', compact('users', 'search'));
}

    public function assignTask(Request $request, User $user)
{
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    Task::create([
        'user_id' => $user->id,
        'title' => $request->title,
        'description' => $request->description, 
        'status' => 'pending', 
    ]);

    return redirect()->route('admin.index')->with('success', 'Tâche assignée avec succès à ' . $user->name);
}

    public function showUserTasks($id)
    {
       $user = User::findOrFail($id);
       $tasks = Task::where('user_id', $id)->get();
       return view('admin.user_tasks', compact('user', 'tasks'));
    }
}