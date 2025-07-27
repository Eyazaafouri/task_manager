<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    $user = \App\Models\User::first() ?? \App\Models\User::factory()->create();

    \App\Models\Task::create([
        'title' => 'Tâche testée depuis Cypress',
        'description' => 'Test minimal via artisan',
        'user_id' => $user->id,
        'is_done' => false,
        'created_at' => now(),
    ]);
}

}
