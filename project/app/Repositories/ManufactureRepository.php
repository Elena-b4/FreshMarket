<?php


namespace App\Repositories;

use App\Models\Manufacture;
use App\Repositories\Contracts\ManufactureRepositoryInterface;

class ManufactureRepository implements ManufactureRepositoryInterface
{
    public function getAllManufactures()
    {
        return Manufacture::all();
    }

    public function getByTitle($title)
    {
        return Manufacture::where('title', $title)->first();
    }
}
