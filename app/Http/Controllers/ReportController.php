<?php

namespace App\Http\Controllers;


class ReportController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
        $this->middleware('permission:report', ['only' => ['index']]);
    }

    public function index() {
        return view('reports.index');
    }

    // GIN report
    private function getGinData(Request $request){
        return [
            'data' => $this->ginService->getGinReport(
                $request->get('projectId'),
                $request->get('startDate'),
                $request->get('endDate'),
                $request->get('ginType')
            ),
            'startDate' => Helpers::dateFormat('2019-01-01'),
            'endDate' => Helpers::dateFormat('2019-01-31'),
            'projectName' => 'Test'
        ];
    }

    public function getGinReportView(Request $request){
        return view('reports.template.gin', $this->getGinData($request));
    }

    public function exportGinReport(Request $request){
        $data = $this->getGinData($request);
        $reportExport = new GinReportExport($data);
        return $reportExport->download( 'gin_report_' .$data['startDate'] . '- ' . $data['endDate'].'.xlsx');
    }


}
