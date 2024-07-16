<?php

namespace Mahmoud217TR\StructuredObject\Properties;

use Mahmoud217TR\StructuredObject\Attributes\Property;

/**
 * Expected Types: PropertyValue, Text, URL.
 *
 * The identifier property represents any kind of identifier for any kind of Thing, such as ISBNs, GTIN codes, UUIDs etc.
 *
 * https://schema.org/identifier
 */
trait IdentifierProperty
{
    #[Property('string')]
    protected $identifier = null;
}
