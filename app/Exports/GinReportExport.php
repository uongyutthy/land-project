<?php


namespace App\Exports;


use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;

class GinReportExport extends ASimpleReportExport
{
    protected $title;
    protected $startDate;
    protected $endDate;
    protected $projectName;
    protected $data;
    protected $no = 0;

    public function __construct($data)
    {
        $this->data = $data;
        $this->title = __('report.gin-report');
        $this->startDate = $data['startDate'];
        $this->endDate = $data['endDate'];
        $this->projectName = $data['projectName'];
    }

    public function collection()
    {
        return collect($this->data['data']);
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        $this->no++;
        return [
            $this->no,
            $row->code,
            $row->date,
            $row->project,
            $row->house_number,
            $row->received_by,
            $row->issued_by,
            $row->gin_type,
            $row->item,
            $row->uom,
            $row->qty,
            $row->description
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            __('report.no.'),
            __('report.code'),
            __('report.date'),
            __('report.project'),
            __('report.house-number'),
            __('gin.received_by'),
            __('gin.issued_by'),
            __('gin.issue_purpose'),
            __('gin.gin_type'),
            __('report.item'),
            __('report.uom'),
            __('report.qty'),
            __('gin.description')
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DMYMINUS,
            'L' => NumberFormat::FORMAT_NUMBER
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getFilterHeaders(): array
    {
        return [
            'Project: '.$this->projectName,
            'Period: '.$this->startDate.' - '.$this->endDate
        ];
    }


}



