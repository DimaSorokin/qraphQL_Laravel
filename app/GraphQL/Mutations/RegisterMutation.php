<?php


namespace App\GraphQL\Mutations;
use App\User;
use Auth;
use GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Illuminate\Support\Str;
use Rebing\GraphQL\Support\Mutation;

class RegisterMutation extends Mutation
{
    protected $attributes = [
        'name' => 'RegisterMutation'
    ];
    public function args(): array
    {
        return [
            'displayName' => ['type' => GraphqlType::string()],
            'email' => ['type' => GraphqlType::string()],
            'password' => ['type' => GraphqlType::string()],
        ];
    }
    public function type() : GraphqlType
    {
        return GraphqlType::string();
    }
    public function resolve($root, $args){
        $user = User::create([
            'name' => $args['displayName'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
            'api_token' => Str::random(60),
        ]);
        return $user->api_token;
    }
}
