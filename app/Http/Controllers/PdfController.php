<?php

namespace App\Http\Controllers;

use App\Charts\VehiculeChart;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Models\Vehicule;

class PdfController extends Controller
{
    public function generatePDF(Request $request)
    {
        $vehicule = Vehicule::find($request->vehicule_id);
        $viewName = 'pdf.detailTrajet'; // Replace with your view name
        $chart = new VehiculeChart;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'pie', [1, 2, 3, 4])->backgroundColor(collect(['#7158e2', '#3ae374', '#ff3838', '#ff9f1a']));
        $data = [
            'vehicule' => $vehicule,
            'chart' => $chart
        ];
        $html = View::make($viewName, $data)->render();

        $filename = "detailTrajet.pdf"; // Replace with filename desired
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $output = $dompdf->output();

        return Response::make($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
            // return view('pdf.detailTrajet', compact('vehicule', 'chart'));
    }
}
