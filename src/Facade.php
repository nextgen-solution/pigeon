<?php

namespace NextGenSolution\Pigeon;

use Illuminate\Support\Facades\Facade as BaseFacade;
use NextGenSolution\Pigeon\Pigeon;

class Facade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Pigeon::class;
    }
}
