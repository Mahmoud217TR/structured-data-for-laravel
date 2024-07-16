<?php

namespace Mahmoud217TR\StructuredObject\Properties;

use Mahmoud217TR\StructuredObject\Attributes\Property;

/**
 * Expected Types: Text, URL.
 *
 * A description of the item.
 *
 * https://schema.org/additionalType
*/
trait AdditionalTypeProperty
{
    #[Property('string')]
    protected $additionalType = null;
}
