<?php namespace BoundedContext\Contracts\Projection;

use BoundedContext\Contracts\Core\Playable;
use BoundedContext\Contracts\Core\ResetableByGenerator;
use BoundedContext\Contracts\Core\Versionable;

interface Projector extends ResetableByGenerator, Playable, Versionable
{
    public function count();

    public function projection();
}
