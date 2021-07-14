<?php


namespace App\Repositories\Contracts;


interface ManufactureRepositoryInterface
{
    public function getAllManufactures();
    public function getByTitle($title);
}
