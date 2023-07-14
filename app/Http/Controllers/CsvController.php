<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CsvController extends Controller
{
    public function exportToCsv(Request $request)
    {
        // Get the data from your source (e.g., database)
        $data = Vehicule::all(); // Replace YourModel with your actual model

        // Build the CSV content
        $csvData = $this->generateCsvData($data);

        $filename = $request->input('filename', 'data.csv');

        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    // public function initImportCsv(){

    // }
    public function importCsv(Request $request)
    {
        $file = $request->file('csv_file');
        $type = new Type();
        $type->hydrateFromCsv($file);
        abort(405);
    }

    private function generateCsvData($data)
    {
        $output = fopen('php://temp', 'w');

        // Write the CSV header
        fputcsv($output, ['Column 1', 'Column 2', 'Column 3']);

        // Write the CSV data
        foreach ($data as $item) {
            fputcsv($output, [$item->column1, $item->column2, $item->column3]);
        }

        rewind($output);
        $csvData = stream_get_contents($output);
        fclose($output);

        return $csvData;
    }
}
