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
final class AddressType extends InputObjectType implements GeneratedTypeInterface
{
    const NAME = 'Address';

    public function __construct(ConfigProcessor $configProcessor, GlobalVariables $globalVariables = null)
    {
        $configLoader = function(GlobalVariables $globalVariable) {
            return [
            'name' => 'Address',
            'description' => null,
            'fields' => function () use ($globalVariable) {
                return [
                'street' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => null,
                    'constraints' => [
                        new Assert\Length([
                            'min' => 10, 
                            'minMessage' => 'The street value should have minimum 10 characters', 
                            'groups' => [
                                'Default', 
                                'Address'
                            ]
                        ]),
                    ],
                    'cascade' => null
                ]
                ],
                'city' => [
                    'type' => Type::nonNull(Type::string()),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => null,
                    'constraints' => [
                        new Assert\Choice([
                            'choices' => [
                                'New York', 
                                'Berlin', 
                                'Tokyo'
                            ], 
                            'message' => 'You can only choose between Berlin, New York and Tokyo', 
                            'groups' => [
                                'Default', 
                                'Address'
                            ]
                        ]),
                    ],
                    'cascade' => null
                ]
                ],
                'zipCode' => [
                    'type' => Type::nonNull(Type::int()),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => null,
                    'constraints' => [
                        new Assert\Positive([
                            'groups' => [
                                'Default', 
                                'Address'
                            ]
                        ]),
                    ],
                    'cascade' => null
                ]
                ],
                'residents' => [
                    'type' => Type::listOf(Type::nonNull(Type::string())),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => null,
                    'constraints' => [
                        new Assert\Expression([
                            'expression' => '\'murtukov\' in value && this.getParent().getType() === \'Mutation\'', 
                            'groups' => [
                                'Default', 
                                'Address'
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
