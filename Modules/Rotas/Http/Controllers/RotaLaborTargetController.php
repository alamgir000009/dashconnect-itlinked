<?php

namespace Modules\Rotas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rotas\Entities\LaborTarget;
use Modules\Rotas\Entities\Rota;

class RotaLaborTargetController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'target' => 'nullable|numeric',
        ]);

        // Retrieve the input data
        $date = $request->input('date');
        $target = $request->input('target');

        // Find or create a LaborTarget based on the given date, created_by and workspace
        // the percentage can not be greater than 100
        $target = $target > 100 ? 100 : $target;

        if (empty($target)) {
            // Delete the existing entry
            LaborTarget::where([
                'date' => $date,
                'create_by' => creatorId(),
                'workspace' => getActiveWorkSpace(),
            ])->delete();
        } else {
            // Update or create a new entry
            LaborTarget::updateOrCreate(
                [
                    'date' => $date,
                    'create_by' => creatorId(),
                    'workspace' => getActiveWorkSpace(),
                ],
                [
                    'user_id' => auth()->user()->id,
                    'target' => $target,
                    'workspace' => getActiveWorkSpace(),
                    'create_by' => creatorId(),
                ]
            );
        }

        $date_formate = Rota::CompanyDateFormat('d M Y');
        $week = 0;
        $start_day = (!empty(company_setting('company_week_start'))) ? company_setting('company_week_start') : 'monday';
        $week_date = Rota::getWeekArray($date_formate, $week, $start_day);

        $week_date['week_start'] = date('Y-m-d', strtotime($week_date[0]));
        $week_date['week_end'] = date('Y-m-d', strtotime($week_date[6]));

        $totalLaborPercentage = intval(LaborTarget::whereDate("date", ">=", $week_date['week_start'])
                ->whereDate("date", "<=", $week_date['week_end'])->avg('target')) . '%';

        return response()->json([
            'status' => true,
            'totalLaborPercentage' => $totalLaborPercentage,
            'message' => 'Labor Target updated successfully.']);
    }
}
