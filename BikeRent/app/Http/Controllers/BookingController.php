<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()->with('bike')->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create(Bike $bike)
    {
        return view('bookings.create', compact('bike'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bike_id' => 'required|exists:bikes,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
        ]);

        $bike = Bike::findOrFail($request->bike_id);

        if ($bike->status !== 'available') {
            return back()->withErrors(['bike_id' => 'Esta bicicleta no está disponible.']);
        }

        $conflict = Booking::where('bike_id', $bike->id)
            ->whereIn('status', ['pending', 'active'])
            ->where('start_time', '<', $request->end_time)
            ->where('end_time', '>', $request->start_time)
            ->exists();

        if ($conflict) {
            return back()->withErrors(['start_time' => 'La bicicleta ya está reservada en ese horario.']);
        }

        $hours = (strtotime($request->end_time) - strtotime($request->start_time)) / 3600;
        $total = $hours * $bike->price_per_hour;

        Booking::create([
            'user_id' => auth()->id(),
            'bike_id' => $bike->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending',
            'total_cost' => $total,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Reserva creada correctamente.');
    }

    public function show(Booking $booking)
    {
        abort_if($booking->user_id !== auth()->id(), 403);

        return view('bookings.show', compact('booking'));
    }

    public function cancel(Booking $booking)
    {
        abort_if($booking->user_id !== auth()->id(), 403);

        if ($booking->status !== 'pending') {
            return back()->withErrors(['booking' => 'Solo se pueden cancelar reservas pendientes.']);
        }

        $booking->update(['status' => 'cancelled']);

        return back()->with('success', 'Reserva cancelada correctamente.');
    }
}