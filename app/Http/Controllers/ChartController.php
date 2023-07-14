<?php

namespace App\Http\Controllers;

use App\Charts\VehiculeChart;



class ChartController extends Controller
{
    public function renderChart()
    {
        $chart = new VehiculeChart;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'pie', [1, 2, 3, 4])->backgroundColor(collect(['#7158e2', '#3ae374', '#ff3838', '#ff9f1a']));
        return view('chart', compact('chart'));
    }
}
