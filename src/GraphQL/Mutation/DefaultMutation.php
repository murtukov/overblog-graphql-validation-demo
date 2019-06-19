<?php
declare(strict_types=1);

namespace App\GraphQL\Mutation;

use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;
use Overblog\GraphQLBundle\Exception\MutationValidationException;
use Overblog\GraphQLBundle\Validator\MutationValidator;

class DefaultMutation implements MutationInterface, AliasedInterface
{
    /**
     * @param MutationValidator $validator
     * @return string
     * @throws MutationValidationException
     */
    public function createUser(MutationValidator $validator): string
    {
        $validator->validate();

        return "Everything is valid!";
    }


    public static function getAliases(): array
    {
        return [
            'createUser' => 'createUser'
        ];
    }
}