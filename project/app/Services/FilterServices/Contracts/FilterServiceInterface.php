<?php


namespace App\Services\FilterServices\Contracts;


interface FilterServiceInterface
{
    public function filter($requestFilters);

    public function search($data);
}
