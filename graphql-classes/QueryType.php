<?php
namespace Overblog\GraphQLBundle\__DEFINITIONS__;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Overblog\GraphQLBundle\Definition\ConfigProcessor;
use Overblog\GraphQLBundle\Definition\GlobalVariables;
use Overblog\GraphQLBundle\Definition\LazyConfig;
use Overblog\GraphQLBundle\Definition\Type\GeneratedTypeInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * THIS FILE WAS GENERATED AND SHOULD NOT BE MODIFIED!
 */
final class QueryType extends ObjectType implements GeneratedTypeInterface
{
    const NAME = 'Query';

    public function __construct(ConfigProcessor $configProcessor, GlobalVariables $globalVariables = null)
    {
        $configLoader = function(GlobalVariables $globalVariable) {
            return [
            'name' => 'Query',
            'description' => 'Overblog GraphQLBundle Demo Project',
            'fields' => function () use ($globalVariable) {
                return [
                'author' => [
                    'type' => Type::string(),
                    'args' => [
                        [
                            'name' => 'id',
                            'type' => Type::int(),
                            'description' => 'Возвращает автора по его ID',
                        ],
                    ],
                    'resolve' => function ($value, $args, $context, ResolveInfo $info) use ($globalVariable) {
                        return $globalVariable->get('resolverResolver')->resolve(["Author", [0 => $args, 1 => $info]]);
                    },
                    'description' => null,
                    'deprecationReason' => null,
                    'complexity' => null,
                    # public and access are custom options managed only by the bundle
                    'public' => null,
                    'access' => null,
                    'useStrictAccess' => true,
                ],
            ];
            },
            'interfaces' => function () use ($globalVariable) {
                return [];
            },
            'isTypeOf' => null,
            'resolveField' => null,
        ];
        };
        $config = $configProcessor->process(LazyConfig::create($configLoader, $globalVariables))->load();
        parent::__construct($config);
    }
}
