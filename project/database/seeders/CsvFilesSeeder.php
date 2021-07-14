<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Helpers\SeedHelper;


class CsvFilesSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        $namesOfFiles = $this->getArrayNamesFilesCsv();
        foreach ($namesOfFiles as $nameOfFile) {
            $this->prepareRowsToExecute($nameOfFile);
        }
    }

    /**
     *
     * @param $nameOfDirectory
     * @param $isRepeat
     */
    private function prepareRowsToExecute($nameOfDirectory)
    {
        $filePositions = fopen('database/seeders/csvs/' . $nameOfDirectory, 'r');
        $nameTable = str_replace('.csv', '', $nameOfDirectory);
        $rows = SeedHelper::prepareSeed($nameTable, $filePositions);
        $this->execute($nameTable, $rows);
    }

    /**
     * @param $nameTable
     * @param $rows
     */
    private function execute($nameTable, $rows)
    {
        DB::table($nameTable)->insert($rows);

        try {

        } catch (\Exception $exception) {
        }
    }

    /**
     * @return array
     */
    private function getArrayNamesFilesCsv(): array
    {
        $namesOfFiles = scandir('database/seeders/csvs');
        unset($namesOfFiles[0]);
        unset($namesOfFiles[1]);
        return $namesOfFiles;
    }
}
