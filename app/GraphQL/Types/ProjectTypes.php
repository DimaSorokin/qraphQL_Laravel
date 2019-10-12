<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Project;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProjectTypes extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProjectTypes',
        'description' => 'A type',
        'model' => Project::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The projects\`s ID',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string())
            ],
            'description' => [
                'type' => Type::nonNull(Type::string())
            ]
//            ,
//            'manager' => [
//                'type' => Type::nonNull(Type::int())
//            ],
//            'tasks' => [
//                'type' => Type::nonNull(Type::int())
//            ]
        ];
    }
}
