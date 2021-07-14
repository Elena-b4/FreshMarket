<?php


namespace App\Services\SeedServices;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ManufactureRepositoryInterface;
use App\Services\SeedServices\Contracts\SeedServiceInterface;

class ProductsSeedService extends SeedBaseService implements SeedServiceInterface
{
    /**
     * @var string
     */
    public $tableName = 'products';

    /**
     * @var
     */
    public $rows;

    private $categoryRepository;
    private $manufactureRepository;


    public function __construct(CategoryRepositoryInterface $categoryRepository, ManufactureRepositoryInterface $manufactureRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->manufactureRepository = $manufactureRepository;
        $this->setTableName($this->tableName);
    }

    /**
     * @param $filePositions
     * @param $isRepeat
     * @return array
     */
    public function prepareDataToSeed($filePositions): array
    {
        return $this->getArray($filePositions);
    }

    /**
     * @param $filePositions
     * @return array
     */
    private function getArray($filePositions): array
    {
        $columns = [
            0 => 'name',
            1 => 'description',
            2 => 'main_image_path',
            3 => 'sale_price',
            4 => 'base_price',
            5 => 'in_stock',
            6 => 'category_id',
            7 => 'manufacture_id',
        ];

        $this->prepareArray($columns, $filePositions);
        return $this->rows;
    }

    /**
     *
     * @param $columns
     * @param $filePositions
     * @return mixed|void
     */
    protected function prepareArray($columns, $filePositions)
    {
        $i = 0;
        while ($row = fgetcsv($filePositions, 0, ',')) {
            foreach ($columns as $key => $column) {
                if ($column == 'category_id') {
                    $this->rows[$i][$column] = $this->categoryRepository->getByTitle($row[$key])->id;
                } elseif ($column == 'manufacture_id') {
                    $this->rows[$i][$column] = $this->manufactureRepository->getByTitle($row[$key])->id;
                } else {
                    $this->rows[$i][$column] = $row[$key];
                }
            }
            $i++;
        }
    }

}
