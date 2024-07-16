<?php

namespace Mahmoud217TR\StructuredObject\Properties;

use Mahmoud217TR\StructuredObject\Attributes\Property;

/**
 * Expected Types: Text.
 *
 * A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.
 *
 * https://schema.org/disambiguatingDescription
 */
trait DisambiguatingDescriptionProperty
{
    #[Property('string')]
    protected $disambiguatingDescription = null;
}
