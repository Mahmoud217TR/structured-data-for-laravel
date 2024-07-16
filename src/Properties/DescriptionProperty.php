<?php

namespace Mahmoud217TR\StructuredObject\Properties;

use Mahmoud217TR\StructuredObject\Attributes\Property;

/**
 * Expected Types: Text, TextObject.
 *
 * A description of the item.
 *
 * https://schema.org/description
*/
trait DescriptionProperty
{

    #[Property('string')]
    protected $description = null;
}
