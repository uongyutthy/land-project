<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

abstract class ASimpleReportExport implements FromCollection, WithEvents, WithCustomStartCell,
    WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize, WithStrictNullComparison, WithDrawings
{
    use Exportable;

    const COMPANY_NAME = 'Total Home Enterprise';
    const FONT_FAMILY = [
        'en' => 'Calibri',
        'kh' => 'Khmer OS Battambang'
    ];

    protected $currentRow = 3;

    public abstract function getFilterHeaders() : array;

    public abstract function getTitle() : string;

    public function startCell(): string
    {
        return 'A'.$this->getStartRow();
    }

    protected function getStartRow() : int {
        return count($this->getFilterHeaders()) + 4;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // company name
                $this->setHeader($event, 'A', 1, self::COMPANY_NAME, 16);
                // report title
                $this->setHeader($event, 'A', 2, $this->getTitle(), 14);
                // filter information
                $filterHeaders = $this->getFilterHeaders();
                foreach($filterHeaders as $filterHeader){
                    $this->setHeader($event, 'A', $this->currentRow, $filterHeader, 12);
                    $this->currentRow++;
                }

                $event->sheet
                    ->getDelegate()
                    ->getStyle($this->startCell().':'.$this->getMaxColumn().($this->getStartRow() + count($this->collection())), 'thin')
                    ->getBorders()->getAllBorders()->setBorderStyle('thin');

                $this->afterSheet($event);
            }
        ];
    }

    private function setHeader(AfterSheet $event, $col, $row, $content, $fontSize){
        $sheet = $event->sheet;
        $sheet->mergeCells($col.$row.':'.$this->getMaxColumn().$row);
        $sheet->setCellValue($col.$row, $content);
        $sheet->getDelegate()->getStyle($col.$row.':'.$col.$row)->getFont()->setSize($fontSize);
        $sheet->getDelegate()->getStyle($col.$row.':'.$col.$row)->getFont()->setName(self::FONT_FAMILY['en']);
        $sheet->getDelegate()->getStyle($col.$row.':'.$col.$row)->getFont()->setBold(true);
        $sheet->getDelegate()->getStyle($col.$row.':'.$col.$row)->getAlignment()->setHorizontal('center');
    }

    private function getMaxColumn(): string
    {
        $col = 'A';
        for($i=1; $i < count($this->headings()); $i++){
            $col++;
        }
        return $col;
    }

    /**
     * @return \PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing|\PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing[]|Drawing
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath(public_path('/img/avatars/logo_the.png'));
        $drawing->setHeight(50);
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    protected function getLastRow() {
        return $this->getStartRow() + $this->collection()->count();
    }

    /**
     * After sheet callback
     *
     * @param $event
     */
    public function afterSheet($event) {

    }
}
