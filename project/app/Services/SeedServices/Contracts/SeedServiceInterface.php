<?php


namespace App\Services\SeedServices\Contracts;


/**
 * Interface SeedServiceInterface
 * @package App\Services\SeedServices\Contracts
 */
interface SeedServiceInterface
{
    /**
     * @param $filePositions
     * @return mixed
     */
    public function prepareDataToSeed($filePositions): array;

}
