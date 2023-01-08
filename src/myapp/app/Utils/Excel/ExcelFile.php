<?php
namespace App\Utils\Excel;

class ExcelFile
{
    protected $excel;

    public function __construct()
    {
        $this->excel = (new \AnourValar\Office\SheetsService());
    }

    public function generate(array $data, string $fileName)
    {
        $this->excel->generate(app_dir() . 'Utils/Excel/template1.xlsx', $data)
            ->saveAs($fileName, \AnourValar\Office\Format::Xlsx);
    }
}