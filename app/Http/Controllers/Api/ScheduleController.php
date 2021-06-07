<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkDay;

class ScheduleController extends Controller
{
    public function hours(Request $request) 
    {
        $rules = [
            'date' => 'required|date_format:"Y-m-d"',
            'doctor_id' => 'required|exists:user,id'
        ];
        $this->validate($request, $rules);
    
        $date = $request->input('date');
        $dateCarbon = new Carbon($date);

        // dayOfWeek
        // Carbon: 0 (sunday) - 6 (saturday)
        // WorkDay: 0 (monday) - (sunday)
        $i = $dateCarbon->dayOfWeek;
        $day = ($i==0 ? 6 : $i-1);

        $doctorId = $request->input('doctor_id');

        $workDays = WorkDay::where('active', true)
            ->where('day', $day)
            ->where('user_id', $doctorId)->get();
    }
}
