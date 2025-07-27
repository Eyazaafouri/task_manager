<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class UserController extends Controller
{
       public function index()
    {
        $tasks = auth()->user()->tasks;
        return view('user', compact('tasks'));
    }

    public function markDone($id)
    {
        $task = Task::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $task->update(['is_done' => true]);

        return redirect('/user')->with('success', 'Tâche marquée comme terminée.');
    }
}
