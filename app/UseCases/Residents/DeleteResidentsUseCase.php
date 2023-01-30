<?php


namespace App\UseCases\Residents;


use App\Models\Booking;
use App\Models\User;
use App\UseCases\Contracts\Residents\DeleteResidentsUseCaseInterface;
use Illuminate\Http\Request;


class DeleteResidentsUseCase implements DeleteResidentsUseCaseInterface
{
    public function handle(Request $request):void
    {
        $user = User::find($request->input('id'));
        $user->is_deleted = 1;
        $bookings = Booking::where('user_id', $user->id)->get();
        foreach ($bookings as $booking) {
            $booking->state = 'Perdida';
            $booking->save();
        }
        $user->save();
    }
}
