<?php


namespace App\Services\SeedServices;

use App\Services\SeedServices\Contracts\SeedServiceInterface;

class CategoriesSeedService extends SeedBaseService implements SeedServiceInterface
{
    /**
     * @var string
     */
    public $tableName = 'categories';

    /**
     * @var
     */
    public $rows;


    public function __construct()
    {
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
            0 => 'title',
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
                    $this->rows[$i][$column] = $row[$key];
            }
            $i++;
        }
    }

}
