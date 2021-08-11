<?php


namespace App\UseCases\Bookings;


use App\Models\Booking;
use App\Models\Service;
use App\UseCases\Contracts\Bookings\StoreBookingsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class StoreBookingsUseCase implements StoreBookingsUseCaseInterface
{
    public function handle(Request $request):bool
    {
        $service = Service::find($request->input('service_id'));
        $dateTimeNow = Carbon::now();
        $dateTime = Carbon::createFromFormat('Y-m-d H:i', $request->date.' '. $request->hour);
        $date = Carbon::createFromFormat('Y-m-d', $request->date);
        $day = strtolower(date('l', strtotime($request->date)));
        $quantity = 0;

        if ($service->$day == 1) {
            if ($dateTime->gt($dateTimeNow)) {
                $bookings = Booking::where('date', '=', $request->input('date'))
                    ->where('hour', '=', $request->input('hour').':00')->get();

                foreach ($bookings as $booking) {
                    $quantity += $booking->quantity;
                }

                $newQuantity = $quantity + $request->input('quantity');

                if  ($service->capacity >= $newQuantity) {
                    $booking = new Booking();
                    $booking->quantity = $request->input('quantity');
                    $booking->date =  $request->input('date');
                    $booking->day = $day;
                    $booking->hour = $request->input('hour');
                    $booking->user_id = Auth::user()->id;
                    $booking->service_id = $service->id;
                    $booking->save();
                    return true;
                }
            }
        }
        return false;
    }
}
