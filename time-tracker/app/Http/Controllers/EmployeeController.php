<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timer;
use App\Models\AbsenceReason;

class EmployeeController extends Controller
{
    public function absenceReason(Request $request){
        $fields = $request->validate([
            'reason' => 'required|string',
            'start_date' => 'date_format:Y-m-d H:i:s|before:stop_date',
            'stop_date' => 'date_format:Y-m-d H:i:s'
        ]);
        $user = AbsenceReason::create([
            'reason' => $fields['reason'],
            'user_id' => auth()->id(),
            'start_date' => $fields['start_date'],
            'stop_date' => $fields['stop_date'],
        ]);
        return response($user, 201);
    }
    public function showWorkTime(){
        $timeEntry = Timer::select('started_at', 'stopped_at', 'user_id')->where('user_id', '=', auth()->id())->get();

        return response()->json(compact('timeEntry'));
    }
    function updateCurrent(){

        if (date('H') > 22 || date('H') < 7){
            return response()->json([
                'status' => "You are not allowed to work now"
            ]);
        }

        $timeEntry = Timer::whereNull('stopped_at')
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            })
            ->first();

        if ( $timeEntry ){
            $timeEntry->update([
                'worked_hours' => $timeEntry->getWorkedHours(now()),
                'stopped_at' => now(),
            ]);
            return response()->json([
                'status' => 'Work time has stopped at [' . date("H:i:s") . '] hours'
            ]);
        }else {
            auth()->user()->timeEntries()->create([
                'started_at' => now()
            ]);

            return response()->json([
                'status' => 'Work time has started'
            ]);
        }
    }
    public function totalWorkedHours(){
        $worked_hours = Timer::select('user_id', 'worked_hours')->where('user_id', '=', auth()->id())->sum('worked_hours');
        return response()->json([
            'status' => 'In total you have worked ' . $worked_hours , 
        ]);
    }
}
