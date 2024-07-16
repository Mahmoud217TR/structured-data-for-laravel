<?php

namespace Mahmoud217TR\StructuredObject\Properties;

use Mahmoud217TR\StructuredObject\Attributes\Property;

/**
 * Expected Types: Text.
 *
 * The name of the item.
 *
 * https://schema.org/name
*/
trait NameProperty
{
    #[Property('string')]
    protected $name = null;
}
