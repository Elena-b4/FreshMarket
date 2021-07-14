<?php


namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProductsPaginate()
    {
        return Product::paginate(9);
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function getQueryProducts()
    {
        return Product::query();
    }

    public function getByTitle($title)
    {
        return Product::where('title', $title)->first();
    }

    public function getById($id)
    {
        return Product::find($id);
    }



    public function getByCategoryId($categoryId)
    {
        return Product::where('category_id', $categoryId)->get();
    }

    public function addWhereCategoryId($query, $categories)
    {
        return $query->whereIn('category_id', $categories);
    }

    public function addWhereManufactureId($query, $manufactures)
    {
        return $query->whereIn('manufacture_id', $manufactures);
    }

    public function addOrderByName($query, $name)
    {
        return $query->orderBy('name', $name);
    }

    public function addOrderBySalePrice($query, $salePrice)
    {
        return $query->orderBy('sale_price', $salePrice);
    }

    public function addWhereInStock($query, $inStock)
    {
        return $query->where('in_stock', $inStock);
    }

    public function searchByName($name)
    {
        return Product::where('name', 'LIKE', "%$name%")->paginate(2);
    }


}
