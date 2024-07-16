<?php

namespace Mahmoud217TR\StructuredObject;

use Illuminate\Support\Traits\Macroable;
use Mahmoud217TR\StructuredObject\Attributes\Property;
use Mahmoud217TR\StructuredObject\Schema\Thing;

class Builder
{
    use Macroable;

    protected Thing $object;

    public function __construct(Thing|string $object = null)
    {
        $this->object = static::getObjectInstance($object);
        foreach ($this->object->getAttributes() as $attribute) {
            static::macro($attribute, function ($value) use ($attribute) {
                $this->addAttribute($attribute, $value);
                return $this;
            });
        }
    }

    public static function object(Thing|string $object = null): static
    {
        return new static($object);
    }

    public function build(): Thing
    {
        Property::validatePropertyTypes($this->object);
        return $this->object;
    }

    public function addAttribute(string $key, $value = null): static
    {
        $this->object->setAttribute($key, $value);
        return $this;
    }

    protected static function getObjectInstance(Thing|string $object = null): Thing
    {
        if (is_null($object)) {
            return new Thing();
        }

        if ($object instanceof Thing) {
            return $object;
        }

        return new $object;
    }
}
