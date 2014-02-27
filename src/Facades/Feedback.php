<?php
namespace Almeida\UIKitLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class Feedback extends Facade
{

    /**
     * Get the registered name of the component
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'uikit.feedback';
    }
}
