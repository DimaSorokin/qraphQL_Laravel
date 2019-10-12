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

    public function type() : GraphqlType
    {
        return GraphqlType::listOf(GraphQL::type('project'));
    }
    public function resolve($root, $args){
        return Project::all();
    }
}
