<?php


namespace App\GraphQL\Queries;


use App\Project;
use GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type as GraphqlType;

class ProjectsQuery extends Query
{
    protected $attributes = [
        'name' => 'The Projects query',
        'description' => 'Retrieves projects',
    ];
    public function args(): array
    {
        return [
          'projectId' => ['type' => GraphqlType::int()]
        ];
    }

    public function type() : GraphqlType
    {
        return GraphqlType::listOf(GraphQL::type('project'));
    }
    public function resolve($root, $args){
        if(isset($args['projectId'])){
            return Project::where('id', $args['projectId'])->get();
        }
        return Project::all();
    }
}
