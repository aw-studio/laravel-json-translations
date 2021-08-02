<?php

namespace AwStudio\LaravelJsonTranslations\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Builder make(Refundable | RefundableCollection $refundable)
 *
 * @see \AwStudio\LaravelJsonTranslations\JsonTranslations
 */
class JsonTranslations extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-json-translations';
    }
}
