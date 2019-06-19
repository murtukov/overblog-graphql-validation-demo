<?php
namespace Overblog\GraphQLBundle\__DEFINITIONS__;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;
use Overblog\GraphQLBundle\Definition\ConfigProcessor;
use Overblog\GraphQLBundle\Definition\GlobalVariables;
use Overblog\GraphQLBundle\Definition\LazyConfig;
use Overblog\GraphQLBundle\Definition\Type\GeneratedTypeInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * THIS FILE WAS GENERATED AND SHOULD NOT BE MODIFIED!
 */
final class PeriodType extends InputObjectType implements GeneratedTypeInterface
{
    const NAME = 'Period';

    public function __construct(ConfigProcessor $configProcessor, GlobalVariables $globalVariables = null)
    {
        $configLoader = function(GlobalVariables $globalVariable) {
            return [
            'name' => 'Period',
            'description' => null,
            'fields' => function () use ($globalVariable) {
                return [
                'startDate' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => null,
                    'constraints' => [
                        new Assert\Date([
                            'groups' => [
                                'Default', 
                                'Period'
                            ]
                        ]),
                    ],
                    'cascade' => null
                ]
                ],
                'endDate' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => null,
                    'constraints' => [
                        new Assert\Date([
                            'groups' => [
                                'Default', 
                                'Period'
                            ]
                        ]),
                        new Assert\GreaterThan([
                            'propertyPath' => 'startDate', 
                            'groups' => [
                                'Default', 
                                'Period'
                            ]
                        ]),
                    ],
                    'cascade' => null
                ]
                ],
            ];
            },
        ];
        };
        $config = $configProcessor->process(LazyConfig::create($configLoader, $globalVariables))->load();
        parent::__construct($config);
    }
}
