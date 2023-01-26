<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CancelBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:cancel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command cancel all bookings in Reservada and En espera state that no one took';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('America/Bogota');

        $bookings = Booking::where('state', 'Reservada')
            ->orWhere('state', 'En espera')
            ->orderBy('date', 'desc')
            ->orderBy('hour', 'desc')
            ->get();

        foreach ($bookings as $booking) {
            $dateTimeNow = Carbon::now();
            $dateTime = Carbon::parse($booking->date.' '. $booking->hour)->addMinute($booking->service->strip)->format('Y-m-d H:i');
            if ($dateTimeNow->gt($dateTime)) {
                $booking->state = 'Perdida';
                $booking->save();
            }
        }
    }
}
