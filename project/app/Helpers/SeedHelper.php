<?php

namespace App\Helpers;

use App\Services\SeedServices\Contracts\SeedServiceInterface;
use App\Services\SeedServices\CategoriesSeedService;
use App\Services\SeedServices\ManufacturesSeedService;
use App\Services\SeedServices\ProductsSeedService;
use Illuminate\Contracts\Container\BindingResolutionException;


class SeedHelper
{
    /**
     * @throws BindingResolutionException
     */
    public static function prepareSeed($tableName, $filePositions)
    {
        switch ($tableName) {
            case 'categories':
                app()->bind(SeedServiceInterface::class, CategoriesSeedService::class);
                break;
            case 'manufactures':
                app()->bind(SeedServiceInterface::class, ManufacturesSeedService::class);
                break;
            case 'products':
                app()->bind(SeedServiceInterface::class, ProductsSeedService::class);
                break;
        }

        $service = app()->make(SeedServiceInterface::class);
        return $service->prepareDataToSeed($filePositions);
    }
}
