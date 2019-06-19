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
final class UniversityType extends InputObjectType implements GeneratedTypeInterface
{
    const NAME = 'University';

    public function __construct(ConfigProcessor $configProcessor, GlobalVariables $globalVariables = null)
    {
        $configLoader = function(GlobalVariables $globalVariable) {
            return [
            'name' => 'University',
            'description' => null,
            'fields' => function () use ($globalVariable) {
                return [
                'title' => [
                    'type' => Type::string(),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => ['App\Entity\University', 'title', 'member'],
                    'constraints' => null,
                    'cascade' => null
                ]
                ],
                'address' => [
                    'type' => Type::string(),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => ['App\Entity\University', 'address', 'property'],
                    'constraints' => null,
                    'cascade' => null
                ]
                ],
                'phone' => [
                    'type' => Type::string(),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => ['App\Entity\University', 'phone', 'property'],
                    'constraints' => null,
                    'cascade' => null
                ]
                ],
                'country' => [
                    'type' => Type::string(),
                    'description' => null,
                    # validation is a custom option managed only by the bundle
                    'validation' => [
                    'link' => ['App\Entity\University', 'country', 'getter'],
                    'constraints' => null,
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
