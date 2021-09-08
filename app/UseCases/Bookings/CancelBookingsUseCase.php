<?php


namespace App\UseCases\Bookings;


use App\Models\Booking;
use App\UseCases\Contracts\Bookings\CancelBookingsUseCaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CancelBookingsUseCase implements CancelBookingsUseCaseInterface
{
    public function handle(Request $request): array
    {
        $booking = Booking::find($request->input('booking_id'));
        $dateTimeString = $booking->date.' '.$booking->hour;
        $dateTime = Carbon::createFromFormat('Y-m-d H:i:s', $dateTimeString, 'America/Bogota');
        $dateTimeNow = Carbon::now();
        $hours = $dateTimeNow->diffInHours($dateTime);
        $alert = Array();
        $alert[0] = 'cancelFail';
        $alert[1] = 'No se pudo cancelar la reservación, recuerde que puede cancelar
                     como maximo 6 horas antes de la fecha fijada';
        $alert[2] = $booking;

        if ($hours > 6) {
            $alert[0] = 'cancelSuccess';
            $alert[1] = 'Reservación cancelada';
            $booking->state = 'Cancelada';
            $booking->save();
            return $alert;
        }
        return $alert;
    }
}
