<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penghasilan;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ChartController extends Controller
{
    public function chart_area($id)
    {
        $data_id = Penghasilan::find($id);
        $pelaku_usaha = Penghasilan::all();

        $data = [];
        foreach ($pelaku_usaha as $pu) {
            $data = $pu->jumlah;
        }
        return view('dashboard', [data => $data]);
    }
}
