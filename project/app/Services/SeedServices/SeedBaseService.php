<?php

namespace App\Services\SeedServices;


/**
 * Class SeedBaseService
 * @package App\Services\SeedServices
 */
abstract class SeedBaseService
{
    /**
     * @var
     */
    public $tableName;

    /**
     * @var
     */
    public $rows;

    /**
     * @param $tableName
     */
    protected function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    /**
     * @param $columns
     * @param $filePositions
     * @return mixed
     */
    protected function prepareArray($columns, $filePositions)
    {
        $i = 0;
        while (($row = fgetcsv($filePositions, 0, ',')) != FALSE) {
            foreach ($columns as $key => $column) {
                $this->rows[$i][$column] = $row[$key];
            }
            $i++;
        }

        return $this->rows;
    }
}

