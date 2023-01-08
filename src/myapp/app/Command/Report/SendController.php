<?php

namespace App\Command\Report;

use App\Repositories\MakeRepository;
use App\Utils\Excel\ExcelFile;
use App\Utils\Mail\Mailer;
use Minicli\Command\CommandController;

class SendController extends CommandController
{

    public function handle(): void
    {
        $email = $this->getParam('email');
        $report = (new MakeRepository)->getReport();
        $reportData = [
            'makes' => []
        ];

        foreach ($report as $re) {
            $excelRowData = [
                'make' => $re->make,
                'model_year' => $re->model_year,
                'model' => $re->model,
                'vehicle_type' => $re->vehicle_type,
            ];
            $reportData['makes'][] = $excelRowData;
        }

        (new ExcelFile)->generate($reportData, 'make_report.xlsx');
        (new Mailer)->setHeaders($email)->setContent()->addAttachment(base_dir() . 'make_report.xlsx')->send();
    }
}