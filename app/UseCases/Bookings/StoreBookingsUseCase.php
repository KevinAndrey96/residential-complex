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

        $nameFail = 'dayFail';
        $descFail = 'No hay servicio de '.$service->title.' para el día que seleccionó';
        $alert[0] = $nameFail;
        $alert[1] = $descFail;
        if ($service->$day == 1) {
            $nameFail = 'dateFail';
            $descFail = 'Fecha o hora errónea';
            $alert[0] = $nameFail;
            $alert[1] = $descFail;
            $numBookings = 0;

            if ($dateTime->gt($dateTimeNow)) {
                $nameFail = 'limitPerDayFail';
                $descFail = 'Ya tiene una reservación de '.$service->title.' para ese día';
                $alert[0] = $nameFail;
                $alert[1] = $descFail;
                $mybookings = Booking::where('date', '=', $request->input('date'))
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('service_id', '=', $service->id)->get();

                foreach ($mybookings as $mybooking){
                    $numBookings++;
                }

                if ($numBookings == 0) {
                    $bookings = Booking::where('date', '=', $request->input('date'))
                        ->where('hour', '=', $request->input('hour') . ':00')
                        ->where('service_id', '=', $service->id)->get();

                    foreach ($bookings as $booking) {
                        $quantity += $booking->quantity;
                    }

                    $newQuantity = $quantity + $request->input('quantity');
                    $nameFail = 'quantityFail';
                    $descFail = 'Se supera la capacidad del servicio para esa franja de tiempo (quedan ' . $service->capacity - $quantity . ' cupos)';
                    $alert[0] = $nameFail;
                    $alert[1] = $descFail;
                    if ($service->capacity >= $newQuantity) {

                        $nameFail = 'personsFail';
                        $descFail = 'Puede apartar como máximo ' . $persons . ' cupos';
                        $alert[0] = $nameFail;
                        $alert[1] = $descFail;
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
                            $nameFail = 'bookingSuccess';
                            $descFail = 'Reservación hecha';
                            $alert[0] = $nameFail;
                            $alert[1] = $descFail;
                            $subject = "Reservación de servicio";
                            $text = 'Sr o Sra '.Auth::user()->name.' se ha reservado el servicio de '.$service->name.' para el dia '.$request->date.
                                    ' a las '.$request->hour. ', tenga en cuenta que la maxima cantidad de personas que puede llevar es '.$request->input('quantity').
                                    ', porfavor llegar tiempo o si no perdera el servicio.';
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
