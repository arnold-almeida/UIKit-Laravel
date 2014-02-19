<?php
namespace Almeida\UiKitLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class Table extends Facade
{

    /**
     * Get the registered name of the component
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'uikit.table';
    }
}
