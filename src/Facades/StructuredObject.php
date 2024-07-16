<?php

namespace Mahmoud217TR\StructuredObject\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mahmoud217TR\StructuredObject\StructuredObject
 */
class StructuredObject extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mahmoud217TR\StructuredObject\StructuredObject::class;
    }
}
