<?php

namespace Mahmoud217TR\StructuredObject\Schema;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Mahmoud217TR\StructuredObject\Attributes\Property;
use Mahmoud217TR\StructuredObject\Properties\AdditionalTypeProperty;
use Mahmoud217TR\StructuredObject\Properties\AlternateNameProperty;
use Mahmoud217TR\StructuredObject\Properties\DescriptionProperty;
use Mahmoud217TR\StructuredObject\Properties\DisambiguatingDescriptionProperty;
use Mahmoud217TR\StructuredObject\Properties\IdentifierProperty;
use Mahmoud217TR\StructuredObject\Properties\NameProperty;
use ReflectionClass;

class Thing implements Arrayable, Jsonable
{
    use AdditionalTypeProperty;
    use AlternateNameProperty;
    use DescriptionProperty;
    use DisambiguatingDescriptionProperty;
    use IdentifierProperty;
    use NameProperty;

    #[Property('string')]
    protected $id = null;

    #[Property('string')]
    protected $type = null;

    public function __construct()
    {
        $this->type = $this->getType();
    }

    public function setAttribute(string $key, $value = null): static
    {
        $this->$key = $value;

        return $this;
    }

    public function toObject(bool $hideContext = false, bool $asArray = false): object|array
    {
        $attributes = [];

        if (! $hideContext) {
            $attributes['@context'] = $this->getContext();
        }

        foreach ($this->getAttributes() as $name) {
            $value = $this->$name;

            if (blank($value)) {
                continue;
            }

            if (in_array($name, ['id', 'type'])) {
                $name = "@{$name}";
            }

            if ($value instanceof Thing) {
                $value = $value->toObject(
                    $this->getContext() == $value->getContext(),
                    $asArray
                );
            }

            $attributes[$name] = $value;
        }

        if (! $asArray) {
            $attributes = (object) $attributes;
        }

        return $attributes;
    }

    public function toArray()
    {
        return $this->toObject(asArray: true);
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toObject(), $options);
    }

    public static function getAttributes(): array
    {
        return Property::extractPropertyNames(new static);
    }

    protected static function getType(): string
    {
        return (new ReflectionClass(static::class))->getShortName();
    }

    protected static function getContext(): string
    {
        return 'https://schema.org/';
    }
}
