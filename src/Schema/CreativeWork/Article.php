<?php

namespace Mahmoud217TR\StructuredObject\Schema\CreativeWork;

use Mahmoud217TR\StructuredObject\Properties\AuthorProperty;
use Mahmoud217TR\StructuredObject\Schema\Thing;

class Article extends Thing
{
    use AuthorProperty;
}
