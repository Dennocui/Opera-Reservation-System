<?php

namespace App\Http\Controllers;

use App\ticket;
use App\Event;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ticket::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new event();
        $event->customer_id = $request->input('customer_id');
        $event->Event_id = $request->input('Event_id');
        $event->Seat_numbers = $request->input('Seat_numbers');

        $event->save();
        return redirect('/ticket')->with('success', 'Ticket Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket =ticket::find($id);
        return $ticket;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket =ticket::find($id);
        $event =event::find($ticket->Event_id);
        $TimeNow = new Carbon();

        if($event->event_Date->add(CarbonInterval::days(3)) < $TimeNow ){
            $ticket->delete();
            return redirect('/ticket.index')->with('success', 'Ticket Removed Successfully');
        }
        return abort(404);
    }

}
