<?php

namespace Mahmoud217TR\StructuredObject\Properties;

use Mahmoud217TR\StructuredObject\Attributes\Property;
use Mahmoud217TR\StructuredObject\Schema\Person;

/**
 * Expected Types: Organization, Person.
 *
 * The author of this content or rating.
 *
 * https://schema.org/author
*/
trait AuthorProperty
{
    #[Property(Person::class)]
    protected $author = null;
}
