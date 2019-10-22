<?php


namespace App\GraphQL\Mutations;
use Auth;
use GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;
use Rebing\GraphQL\Support\Mutation;

class LoginMutation extends Mutation
{
    protected $attributes = [
        'name' => 'Login'
    ];
    public function args(): array
    {
        return [
            'email' => ['type' => GraphqlType::string()],
            'password' => ['type' => GraphqlType::string()],
        ];
    }
    public function type() : GraphqlType
    {
        return GraphqlType::string();
    }
    public function resolve($root, $args){
        $credentials = [
            'email' => $args['email'],
            'password' => $args['password']
        ];
        if(Auth::guard('web')->attempt($credentials)){
            return Auth::guard('web')->user()->api_token;
        }
        return null;
    }
}
