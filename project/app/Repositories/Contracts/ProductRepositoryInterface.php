<?php


namespace App\Repositories\Contracts;


interface ProductRepositoryInterface
{
    public function getAllProductsPaginate();
    public function getAllProducts();
    public function getQueryProducts();
    public function getByTitle($title);
    public function getById($id);
    public function getByCategoryId($categoryId);
    public function addWhereCategoryId($query, $categories);
    public function addWhereManufactureId($query, $manufactures);
    public function addOrderBySalePrice($query, $salePrice);
    public function addWhereInStock($query, $inStock);
    public function searchByName($name);
}
