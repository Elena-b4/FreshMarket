<?php


namespace App\Services\FilterServices;

use App\Enums\ShopEnums;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\FilterServices\Contracts\FilterServiceInterface;


class FilterService implements FilterServiceInterface
{
    private $productRepository;

    /**
     * AbstractFilter constructor.
     *
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;

    }

    public function filter($requestFilters)
    {
        $query = $this->productRepository->getQueryProducts();
        if (isset($requestFilters[ShopEnums::PRODUCT_CATEGORY_ID])) {
            $this->productRepository->addWhereCategoryId($query, $requestFilters[ShopEnums::PRODUCT_CATEGORY_ID]);
        }
        if ($requestFilters[ShopEnums::PRODUCT_MANUFACTURE_ID]) {
            $this->productRepository->addWhereManufactureId($query, $requestFilters[ShopEnums::PRODUCT_MANUFACTURE_ID]);
        }
        if ($requestFilters[ShopEnums::PRODUCT_NAME]) {
            $this->productRepository->addOrderByName($query, $requestFilters[ShopEnums::PRODUCT_NAME]);
        }
        if ($requestFilters[ShopEnums::PRODUCT_SALE_PRICE]) {
            $this->productRepository->addOrderBySalePrice($query, $requestFilters[ShopEnums::PRODUCT_SALE_PRICE]);
        }
        if (isset($requestFilters[ShopEnums::PRODUCT_IN_STOCK])) {
            $this->productRepository->addWhereInStock($query, $requestFilters[ShopEnums::PRODUCT_IN_STOCK]);
        }
        return $query->paginate(9);
    }

    public function search($data)
    {
        return $this->productRepository->searchByName($data[ShopEnums::PRODUCT_NAME]);
    }
}
