<?php


namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function getByTitle($title)
    {
        return Category::where('title', $title)->first();
    }
}
