<?php namespace BoundedContext\Event;

use BoundedContext\Contracts\Event;
use BoundedContext\ValueObject\Uuid;

class AbstractEvent implements Event
{
    private $id;

    public function __construct(Uuid $id)
    {
        $this->id = $id;
    }

    public function id()
    {
        return $this->id;
    }

    public function toString()
    {
        return $this->id;
    }

    public function serialize()
    {
        $class_vars = (new \ReflectionObject($this))->getProperties(\ReflectionProperty::IS_PUBLIC);

        $command = [];

        foreach ($class_vars as $property) {
            $name = $property->getName();
            $command[$name] = $this->$name->serialize();
        }

        return $command;
    }
}
