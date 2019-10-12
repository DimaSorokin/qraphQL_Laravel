<?php

use App\Project;
use App\Task;
use App\User;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::truncate();
        Project::truncate();
        Task::truncate();

        DB::table('project_user')->truncate();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@local',
            'password' => bcrypt('password'),
            'api_token' => Str::random(60),
        ]);
        $user1 = User::create([
            'name' => 'Dima',
            'email' => 'dima@local',
            'password' => bcrypt('password'),
            'api_token' => Str::random(60),
        ]);
        $project1 = Project::create([
            'title' => 'Project manager',
            'description' => 'Project manager',
            'manager_id' => $admin->id,
        ]);
        $task1 = Task::create([
            'title' => 'Project manager dev',
            'description' => 'Project manager dev',
            'user_id' => $admin->id,
            'project_id' => $project1->id,
            'status_code' => 'open',
        ]);
        $task2 = Task::create([
            'title' => 'Project manager dev 2',
            'description' => 'Project manager dev 2',
            'user_id' => $user1->id,
            'project_id' => $project1->id,
            'status_code' => 'open',
        ]);
        $project1->users()->saveMany([$admin, $user1]);
    }
}
