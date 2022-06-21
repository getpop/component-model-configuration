<?php

declare(strict_types=1);

namespace PoP\ConfigurationComponentModel\HelperServices;

use PoP\ComponentModel\TypeResolvers\ObjectType\ObjectTypeResolverInterface;
use PoP\ComponentModel\TypeResolvers\RelationalTypeResolverInterface;
use PoP\ComponentModel\TypeResolvers\UnionType\UnionTypeResolverInterface;
use PoP\GraphQLParser\Spec\Parser\Ast\FieldInterface;

class TypeResolverHelperService implements TypeResolverHelperServiceInterface
{
    /**
     * If the TypeResolver is of Union type, and we don't have the object
     * (eg: when printing the configuration), then generate a list of the
     * unique field outputs for all the target ObjectTypeResolvers.
     *
     * If the TypeResolver is an Object type, to respect the same response,
     * return an array of a single element, with its own unique field output.
     *
     * @return array<string,string>
     */
    final public function getTargetObjectTypeUniqueFieldOutputKeys(
        RelationalTypeResolverInterface $relationalTypeResolver,
        FieldInterface $field,
    ): array {
        $uniqueFieldOutputKeys = [];
        /** @var ObjectTypeResolverInterface[] */
        $targetObjectTypeResolvers = $relationalTypeResolver instanceof UnionTypeResolverInterface ?
            $relationalTypeResolver->getTargetObjectTypeResolvers()
            : [$relationalTypeResolver];

        foreach ($targetObjectTypeResolvers as $targetObjectTypeResolver) {
            $uniqueFieldOutputKeys[$targetObjectTypeResolver->getTypeName()] = $field->getOutputKey();
        }
        return $uniqueFieldOutputKeys;
    }
}
