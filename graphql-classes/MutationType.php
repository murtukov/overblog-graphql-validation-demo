<?php
namespace Overblog\GraphQLBundle\__DEFINITIONS__;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Overblog\GraphQLBundle\Definition\ConfigProcessor;
use Overblog\GraphQLBundle\Definition\GlobalVariables;
use Overblog\GraphQLBundle\Definition\LazyConfig;
use Overblog\GraphQLBundle\Definition\Type\GeneratedTypeInterface;
use Overblog\GraphQLBundle\Validator\MutationValidator;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * THIS FILE WAS GENERATED AND SHOULD NOT BE MODIFIED!
 */
final class MutationType extends ObjectType implements GeneratedTypeInterface
{
    const NAME = 'Mutation';

    public function __construct(ConfigProcessor $configProcessor, GlobalVariables $globalVariables = null)
    {
        $configLoader = function(GlobalVariables $globalVariable) {
            return [
            'name' => 'Mutation',
            'description' => null,
            'fields' => function () use ($globalVariable) {
                return [
                'createUser' => [
                    'type' => Type::string(),
                    'args' => [
                        [
                            'name' => 'username',
                            'type' => Type::nonNull(Type::string()),
                            'description' => null,
                        ],
                        [
                            'name' => 'password',
                            'type' => Type::nonNull(Type::string()),
                            'description' => null,
                        ],
                        [
                            'name' => 'passwordRepeat',
                            'type' => Type::nonNull(Type::string()),
                            'description' => null,
                        ],
                        [
                            'name' => 'birthday',
                            'type' => Type::nonNull(Type::string()),
                            'description' => null,
                        ],
                        [
                            'name' => 'emails',
                            'type' => Type::listOf(Type::string()),
                            'description' => null,
                        ],
                        [
                            'name' => 'about',
                            'type' => Type::nonNull(Type::string()),
                            'description' => null,
                        ],
                        [
                            'name' => 'extraConfig',
                            'type' => Type::nonNull(Type::string()),
                            'description' => null,
                        ],
                        [
                            'name' => 'address',
                            'type' => $globalVariable->get('typeResolver')->resolve('Address'),
                            'description' => null,
                        ],
                        [
                            'name' => 'workPeriod',
                            'type' => Type::nonNull($globalVariable->get('typeResolver')->resolve('Period')),
                            'description' => null,
                        ],
                        [
                            'name' => 'university',
                            'type' => $globalVariable->get('typeResolver')->resolve('University'),
                            'description' => null,
                        ],
                    ],
                    'resolve' => function ($value, $args, $context, ResolveInfo $info) use ($globalVariable) {
                        $validator = new MutationValidator(
                            $args,
                            $info,
                            $globalVariable->get('container')->get('validator'),
                            $globalVariable->get('container')->get('translator'),
                            [
                                'username' => [
                                    'link' => null,
                                    'constraints' => [
                                        new Assert\Length([
                                            'min' => 6, 
                                            'max' => 32, 
                                            'minMessage' => 'createUser.username.not_blank', 
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                        new Assert\NotBlank([
                                            'message' => 'Something is empty', 
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                    ],
                                    'cascade' => null
                                ],
                                'password' => [
                                    'link' => null,
                                    'constraints' => [
                                        new Assert\Length([
                                            'min' => 6, 
                                            'max' => 32, 
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                        new Assert\IdenticalTo([
                                            'propertyPath' => 'passwordRepeat', 
                                            'message' => 'Passwords are not equal!', 
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                    ],
                                    'cascade' => null
                                ],
                                'passwordRepeat' => null,
                                'birthday' => [
                                    'link' => null,
                                    'constraints' => [
                                        new Assert\Date([
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                        new Assert\Callback([
                                            'callback' => [
                                                'App\Util\Validator', 
                                                'greaterThan'
                                            ], 
                                            'payload' => '-18 years', 
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                    ],
                                    'cascade' => null
                                ],
                                'emails' => [
                                    'link' => null,
                                    'constraints' => [
                                        new Assert\Unique([
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                        new Assert\Count([
                                            'max' => 3, 
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                        new Assert\All([
                                            'constraints' => [
                                                new Assert\Email([
                                                    'message' => 'The email "{{ value }}" is not a valid email.', 
                                                    'groups' => [
                                                        'Default', 
                                                        'Mutation'
                                                    ]
                                                ])
                                            ], 
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                    ],
                                    'cascade' => null
                                ],
                                'about' => [
                                    'link' => null,
                                    'constraints' => [
                                        new Assert\NotBlank([
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                    ],
                                    'cascade' => null
                                ],
                                'extraConfig' => [
                                    'link' => null,
                                    'constraints' => [
                                        new Assert\Json([
                                            'groups' => [
                                                'Default', 
                                                'Mutation'
                                            ]
                                        ]),
                                    ],
                                    'cascade' => null
                                ],
                                'address' => [
                                    'link' => null,
                                    'constraints' => null,
                                    'cascade' => [
                                        'groups' => ['Default'],
                                        'referenceType' => 'Address',
                                        'isCollection' => false
                                    ],
                                ],
                                'workPeriod' => [
                                    'link' => null,
                                    'constraints' => null,
                                    'cascade' => [
                                        'groups' => ['Default'],
                                        'referenceType' => 'Period',
                                        'isCollection' => false
                                    ],
                                ],
                                'university' => [
                                    'link' => null,
                                    'constraints' => null,
                                    'cascade' => [
                                        'groups' => ['Default'],
                                        'referenceType' => 'University',
                                        'isCollection' => false
                                    ],
                                ],
                            ]
                        );

                        return $globalVariable->get('mutationResolver')->resolve(["createUser", [0 => $validator]]);
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
