<?php


namespace App\Repositories\Contracts;


interface CategoryRepositoryInterface
{

    public function getAllCategories();
    public function getByTitle($title);
}
