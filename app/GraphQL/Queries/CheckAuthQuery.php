<?php


namespace App\GraphQL\Queries;


use App\Project;
use GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type as GraphqlType;

class CheckAuthQuery extends Query
{
    protected $attributes = [
        'name' => 'User Auth Query',
        'description' => 'Check the user auth',
    ];
    public function args(): array
    {
        return [
            'projectId' => ['type' => GraphqlType::int()]
        ];
    }

    public function type() : GraphqlType
    {
        return GraphqlType::string();
    }
    public function resolve($root, $args){
        return '';
    }
}
