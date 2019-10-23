<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use App\Project;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProjectInput extends GraphQLType
{
    protected $inputObject = true;
    protected $attributes = [
        'name' => 'ProjectInput',
        'description' => 'A project input',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The projects\`s ID',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string())
            ],
            'description' => [
                'type' => Type::nonNull(Type::string())
            ],
            'user' => [
                'type' => Type::listOf(Type::int())
            ],
            'tasks' => [
                'type' => Type::listOf(GraphQL::type('taskInput'))
            ]
        ];
    }
}
