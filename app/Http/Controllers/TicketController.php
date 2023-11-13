<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Travel;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        // Generar el numero de reserva
        $code = generateReservationNumber();
        // Modificar request
        $request->request->add(['code' => $code]);

        // Validar
        $makeMessages = makeMessages();
        $this->validate($request, [
            'seat' => ['required'],
            'total' => ['required'],
            'date' => ['date', 'required'],
        ], $makeMessages);

        //  Verificamos si la fecha ingresada es mayor a la fecha actual.
        $invalidDate = validDate($request->date);
        if ($invalidDate) {
            return back()->with('message', 'La fecha debe ser igual o mayor a '.date('d-m-Y'));
        }

        // Obtener viaje
        $travel = Travel::where('origin', $request->origin)->where('destination', $request->destination)->first();

        // Crear la reserva
        $ticket = Ticket::create([
        'code' => $request->code,
        'seat' => $request->seat,
        'date' => $request->date,
        'total' => $request->total,
        'travel_id' => $travel->id,
        ]);

        return redirect()->route('generate.pdf', [
            'id' => $ticket->id,
        ]);
    }

    public function searchCheck(Request $request)
    {

        $this->validate($request, [
            'search_code' => 'required|exists:tickets,code',
        ], [
            'search_code.required' => 'El campo de código de reserva es requerido.',
            'search_code.exists' => 'El código de reserva no se encuentra en nuestra base de datos.',
        ]);


        $code = $request->input('search_code');
        $ticket = Ticket::where('code', $code)->first();

        if ($ticket) {
            $date = date('d-m-Y', strtotime($ticket->date));
            return view('comprobante', compact('ticket', 'date'));
        } else {
            return redirect()->back()->withErrors(['El código de reserva no se encontró. Por favor, verifica el código e inténtalo nuevamente.']);
        }

    }
}



