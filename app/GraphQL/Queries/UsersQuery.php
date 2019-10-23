<?php


namespace App\GraphQL\Queries;

use Auth;
use App\User;
use App\Project;
use GraphQL;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type as GraphqlType;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'User query',
        'description' => 'Retrieves projects',
    ];

    public function type() : GraphqlType
    {
        return GraphqlType::listOf(GraphQL::type('user'));
    }
    public function resolve($root, $args){
        return User::all();
    }
}
