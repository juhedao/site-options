<?php
namespace Juhedao\SiteOptions;

use Illuminate\Support\Facades\Facade;

class OptionFacade extends Facade
{
    /**
     * Return the facade name accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Juhedao\SiteOptions\Option';
    }
}