<?php

namespace Mahmoud217TR\StructuredObject\Attributes;

use Attribute;
use ReflectionClass;
use ReflectionProperty;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Property
{
    public function __construct(public array|string|null $type = null) {}

    public static function extractProperties(object $object): array
    {
        $reflectionClass = new ReflectionClass($object);

        return array_values(
            array_filter(
                $reflectionClass->getProperties(),
                fn ($reflectionProperty) => filled($reflectionProperty->getAttributes(self::class))
            )
        );
    }

    public static function extractPropertyNames(object $object): array
    {
        $names = [];
        foreach (static::extractProperties($object) as $property) {
            $names[] = $property->getName();
        }

        return $names;
    }

    public static function validatePropertyTypes(object $object): void
    {
        foreach (static::extractProperties($object) as $property) {
            static::validatePropertyType($property, $object);
        }
    }

    protected static function validatePropertyType(ReflectionProperty $property, object $object): void
    {
        $attribute = $property->getAttributes(self::class)[0];
        $property->setAccessible(true);
        $value = $property->getValue($object);
        $actualType = is_object($value) ? get_class($value) : gettype($value);
        $expectedType = $attribute->getArguments();

        if (filled($expectedType) && ! is_null($value)) {
            $expectedType = $expectedType[0];
        } else {
            return;
        }

        if (is_array($expectedType)) {
            throw_unless(
                in_array($actualType, $expectedType),
                "Property '{$property->getName()}' should be one of the types: ".implode(', ', $expectedType).", {$actualType} given."
            );
        }

        if (is_string($expectedType)) {
            throw_unless(
                $actualType == $expectedType,
                "Property '{$property->getName()}' should be of type {$expectedType}, {$actualType} given."
            );
        }
    }
}
