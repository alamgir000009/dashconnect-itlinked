<?php

namespace Modules\Rotas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rotas\Entities\Rota;
use Modules\Rotas\Entities\TargetSale;

class RotaSaleTargetController extends Controller
{

    public function update(Request $request)
    {

        $request->validate([
            'date' => 'required|date',
            'target' => 'required|numeric',
        ]);

        // Retrieve the input data
        $date = $request->input('date');
        $target = $request->input('target');

        // Find or create a TargetSale based on the given date
        TargetSale::updateOrCreate(
            ['date' => $date],
            ['target' => $target]
        );

        $date_formate = Rota::CompanyDateFormat('d M Y');
        $week = 0;
        $start_day = (!empty(company_setting('company_week_start'))) ? company_setting('company_week_start') : 'monday';
        $week_date = Rota::getWeekArray($date_formate, $week, $start_day);

        $week_date['week_start'] = date('Y-m-d', strtotime($week_date[0]));
        $week_date['week_end'] = date('Y-m-d', strtotime($week_date[6]));

        $totalTargetSale = TargetSale::whereDate("date", ">=", $week_date['week_start'])
        ->whereDate("date", "<=", $week_date['week_end'])->sum('target');

        return response()->json([
            'status' => true,
            'totalTargetSale' => currency_format_with_sym($totalTargetSale),
            'message' => 'Target sale updated successfully']);

        // if (Auth::user()->can('rota edit')) {

        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
    }

}
