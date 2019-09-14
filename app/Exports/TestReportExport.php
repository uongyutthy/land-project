<?php


namespace App\Exports;


use App\Contracts\Repositories\IUserRepository;
use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;

class TestReportExport extends ASimpleReportExport
{
    private $userRepository;
    protected $title = 'Title';
    protected $subTitle = 'Sub title';

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function collection()
    {
        return $this->userRepository->all();
    }

    function getFilterHeaders()
    {
        // TODO: Implement getFilterHeaders() method.
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        // TODO: Implement columnFormats() method.
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // TODO: Implement headings() method.
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        // TODO: Implement map() method.
    }

    public function getTitle(): string
    {
        // TODO: Implement getTitle() method.
    }

    /**
     * @return BaseDrawing|BaseDrawing[]
     */
    public function drawings()
    {
        // TODO: Implement drawings() method.
    }
}
