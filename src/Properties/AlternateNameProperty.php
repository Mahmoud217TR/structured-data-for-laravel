<?php

namespace Mahmoud217TR\StructuredObject\Properties;

use Mahmoud217TR\StructuredObject\Attributes\Property;

/**
 * Expected Types: Text.
 *
 * An alias for the item.
 *
 * https://schema.org/alternateName
 */
trait AlternateNameProperty
{
    #[Property('string')]
    protected $alternateName = null;
}
