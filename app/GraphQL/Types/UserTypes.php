<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserTypes extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A users',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The projects\`s ID',
            ],
            'email' => [
                'type' => Type::nonNull(Type::string())
            ],
            'name' => [
                'type' => Type::nonNull(Type::string())
            ],
        ];
    }
}
