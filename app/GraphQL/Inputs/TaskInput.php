<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use App\Task;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TaskInput extends GraphQLType
{
    protected $inputObject = true;

    protected $attributes = [
        'name' => 'TaskInput',
        'description' => 'A tasks',
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
            'statusCode' => [
                'type' => Type::nonNull(Type::string())
            ],
            'userId' => [
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }
}
