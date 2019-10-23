<?php


namespace App\GraphQL\Mutations;
use App\Project;
use App\Task;
use App\User;
use Auth;
use GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Illuminate\Support\Str;
use Rebing\GraphQL\Support\Mutation;

class SaveProjectMutation extends Mutation
{
    protected $attributes = [
        'name' => 'SaveProjectMutation'
    ];
    public function args(): array
    {
        return [
            'project' => ['type' => Graphql::type('projectInput')],
        ];
    }
    public function type() : GraphqlType
    {
        return GraphqlType::string();
    }
    public function resolve($root, $args){
        $proj = $args['project'];
        $project = Project::create([
            'title' => $proj['title'],
            'description' => $proj['description'],
            'manager_id' => Auth::user()->id,
        ]);

        $user = User::whereIn('id', $proj['users'])->get();

        foreach ($args['tasks'] as $task){
            Task::create([
               'title' => $task['title'],
               'description' => $task['description'],
               'user_id' => $task['userId'],
               'project_id' => $project->id,
               'status_code' => $task['statusCode'],
            ]);
        }

        $project->user()->saveMany($user);
        return '';
    }
}
