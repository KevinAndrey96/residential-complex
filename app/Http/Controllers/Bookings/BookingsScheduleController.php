<?php

namespace App\Http\Controllers\Bookings;

use App\Http\Controllers\Controller;
use App\Models\Service;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;
use DateTime;

class BookingsScheduleController extends Controller
{
    public function schedule(Request $request)
    {
        $hours = Array();
        $service = Service::find($request->input('service_id'));
        $service_id = $service->id;
        $start = new DateTime($service->start);
        $final = new DateTime($service->final);
        $final = $final->modify( '+15 minutes' );
        $hoursRange = new DatePeriod($start, new DateInterval('PT'.$service->strip.'M'), $final);

        foreach ($hoursRange as $hour) {
            array_push($hours, strftime($hour->format('H:i')));
        }

        array_pop($hours);
        return view('bookings.schedule', compact('hours','service_id', 'service'));
    }
}
