<?php


namespace App\UseCases\Bookings;


use App\Mail\GeneralMail;
use App\Models\Booking;
use App\Models\Service;
use App\UseCases\Contracts\Bookings\StoreBookingsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class StoreBookingsUseCase implements StoreBookingsUseCaseInterface
{
    public function handle(Request $request):array
    {
        $service = Service::find($request->input('service_id'));
        $dateTimeNow = Carbon::now();
        //$dateTime = Carbon::createFromFormat('Y-m-d H:i', $request->date.' '. $request->hour);
        $dateTime = Carbon::parse($request->date.' '. $request->hour);
        $date = Carbon::createFromFormat('Y-m-d', $request->date);
        $day = strtolower(date('l', strtotime($request->date)));
        $alert = Array();
        $persons = 6;
        $quantity = 0;

        $alert[0] = 'dayFail';
        $alert[1] = 'No hay servicio de '.$service->title.' para el día que seleccionó';

        if ($service->$day == 1) {
            $alert[0] = 'dateFail';
            $alert[1] = 'Fecha o hora errónea';
            $numBookings = 0;

            if ($dateTime->gt($dateTimeNow)) {
                $alert[0] = 'limitPerDayFail';
                $alert[1] = 'Ya tiene una reservación de '.$service->title.' para ese día';
                $numBookings = Booking::where('date', '=', $request->input('date'))
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('service_id', '=', $service->id)->count();

                if ($numBookings == 0) {
                    $bookings = Booking::where('date', '=', $request->input('date'))
                        ->where('hour', '=', $request->input('hour') . ':00')
                        ->where('service_id', '=', $service->id)->get();

                    foreach ($bookings as $booking) {
                        $quantity += $booking->quantity;
                    }

                    $newQuantity = $quantity + $request->input('quantity');
                    $alert[0] = 'quantityFail';
                    $alert[1] =  'Se supera la capacidad del servicio para esa franja de tiempo (quedan ' . $service->capacity - $quantity . ' cupos)';

                    if ($service->capacity >= $newQuantity) {
                        $alert[0] = 'personsFail';
                        $alert[1] = 'Puede apartar como máximo ' . $persons . ' cupos';

                        if ($request->input('quantity') <= $persons) {
                            $booking = new Booking();
                            $booking->quantity = $request->input('quantity');
                            $booking->date = $request->input('date');
                            $booking->day = $day;
                            $booking->hour = $request->input('hour');
                            $booking->state = $request->input('state');
                            $booking->user_id = Auth::user()->id;
                            $booking->service_id = $service->id;
                            $booking->save();
                            $alert[0] = 'bookingSuccess';
                            $alert[1] = 'Reservación hecha';
                            $subject = "Reservación de servicio";
                            $text = 'Sr o Sra '.Auth::user()->name.' se ha reservado el servicio de '.$service->title.' para el dia '.$request->date.
                                    ' a las '.$request->hour. ', tenga en cuenta que la maxima cantidad de personas que puede llevar es '.$request->input('quantity').
                                    ', porfavor llegar a tiempo o si no perdera el servicio.';
                            Mail::to(Auth::user()->email)->send(new GeneralMail($subject, $text));
                            return $alert;
                        }
                    }
                }
            }
        }
        return $alert;
    }
}
